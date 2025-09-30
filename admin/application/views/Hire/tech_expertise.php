<main id="main-container">
    <!-- Include toastr CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Include Font Awesome CDN in the head of your HTML file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style type="text/css">
        #example1_wrapper {
            padding-right: 10vw
        }

        #example1_wrapper img {
            width: auto;
            height: 8vh
        }

        .modal-body {
            max-height: 480px;
            /* Set max height according to your needs */
            overflow-y: auto;
            scroll-behavior: smooth;
            /* Enables smooth scrolling */
        }

        /* Styling the scrollbar */
        .modal-body::-webkit-scrollbar {
            width: 6px;
            /* Reduced width of the scrollbar */
        }

        /* Styling the track (background) of the scrollbar */
        .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Light background color for the scrollbar track */
        }

        /* Styling the handle (thumb) of the scrollbar */
        .modal-body::-webkit-scrollbar-thumb {
            background: #888;
            /* Darker thumb color */
            border-radius: 10px;
            /* Optional: Rounded corners for the thumb */
        }

        /* On hover, make the thumb a bit darker */
        .modal-body::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .textAreaWithBtn {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between;
        }

        .textAreaWithBtn textarea {
            width: 90% !important;
            margin-bottom: 3%;
        }

        #textareaGroup i {
            font-size: 1.2vw;

        }

        .plusIcon {
            /* margin-left: 10px; */
            color: cadetblue;
            border: solid 1px cadetblue;
            border-radius: 2px;
            padding: 2px
        }

        .removeIcon {
            /* margin-left: 10px; */
            color: red;
            border: solid 1px red;
            border-radius: 2px;
            padding: 2px
        }

        .modal-footer {
            text-align: unset;
        }
    </style>
    <!-- Add Bootstrap Icons CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <br><br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Add Tech Expertise Details
        </button><br><br>

        <form id="createForm" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Tech Expertise Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- Hidden Input to store the ID -->
                                <input class="form-control" type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($id); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Tech Category</label>
                                <select class="form-control" name="tech_id" id="techCategorySelect"
                                    onchange="updateLabel()">
                                    <option value="">Select Tech Category</option>
                                    <?php foreach ($tech_names as $tech): ?>
                                        <option value="<?php echo htmlspecialchars($tech['tech_id']); ?>">
                                            <?php echo htmlspecialchars($tech['tech_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Dynamic textareas will go here -->
                            <div class="form-group" id="textareaGroup">
                                <!-- Initial textarea with only Add More icon -->
                                <div class="align-items-center mt-2 textAreaWithBtn">
                                    <textarea class="form-control custom-textarea" name="tech_expertise[]"
                                        placeholder="Enter Description"></textarea>
                                    <span class="icon-button ml-2" onclick="addTextarea(this)">
                                        <i class="fas fa-plus plusIcon"></i> <!-- Add More Icon -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <table id="example1" class="display table">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Tech Name</th>
                    <th>Tech Expertise Name</th>
                    <th>Tech Expertise Values</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated dynamically using DataTables -->
            </tbody>
        </table>
    </div>



    <script>
        // Function to dynamically add new textareas
        function addTextarea(icon) {
            // Create a new div to hold the new textarea and buttons
            const newTextareaGroup = document.createElement('div');
            newTextareaGroup.className = 'align-items-center mt-2 textAreaWithBtn';

            // Create the new textarea
            const newTextarea = document.createElement('textarea');
            newTextarea.className = 'form-control custom-textarea';
            newTextarea.name = 'tech_expertise[]';
            newTextarea.placeholder = 'Enter Description';

            // Append the textarea to the group
            newTextareaGroup.appendChild(newTextarea);

            // Create a remove button
            const removeButton = document.createElement('span');
            removeButton.className = 'icon-button ml-2';
            removeButton.onclick = function () { removeTextarea(newTextareaGroup); };
            removeButton.innerHTML = '<i class="fas fa-trash removeIcon"></i>'; // Remove Icon

            // Append the remove button to the group
            newTextareaGroup.appendChild(removeButton);

            // Create Add More button for newly added textareas
            const addMoreButton = document.createElement('span');
            addMoreButton.className = 'icon-button ml-2';
            addMoreButton.onclick = function () { addTextarea(addMoreButton); }; // Pass the current button
            addMoreButton.innerHTML = '<i class="fas fa-plus plusIcon"></i>'; // Add More Icon

            // Append the Add More button to the group
            newTextareaGroup.appendChild(addMoreButton);

            // Insert the new group right after the clicked icon's parent
            icon.parentElement.after(newTextareaGroup);
        }

        // Function to remove a dynamically added textarea
        function removeTextarea(group) {
            const textareaGroup = document.getElementById('textareaGroup');

            // Allow removal only if there is more than one textarea
            if (textareaGroup.children.length > 1) {
                group.remove();
            }
        }

        // Update label when dropdown changes
        function updateLabel() {
            const selectElement = document.getElementById('techCategorySelect');
            const dynamicLabel = document.getElementById('dynamicLabel');

            // Update the label based on the selected category
            if (selectElement.value !== "") {
                dynamicLabel.innerText = 'Description for ' + selectElement.options[selectElement.selectedIndex].text;
            } else {
                dynamicLabel.innerText = 'Description';
            }
        }

        // Reset form when modal is closed
        $('#createModal').on('hidden.bs.modal', function () {
            const textareaGroup = document.getElementById('textareaGroup');

            // Clear all textareas except the first one
            textareaGroup.innerHTML = `
        <div class="align-items-center mt-2 textAreaWithBtn">
            <textarea class="form-control custom-textarea" name="tech_expertise[]" placeholder="Enter Description"></textarea>
            <span class="icon-button ml-2" onclick="addTextarea(this)">
                <i class="fas fa-plus plusIcon"></i> <!-- Add More Icon -->
            </span>
        </div>`;
        });
    </script>




    <script type="text/javascript">

        // Handle form submission for adding a record
        $('#createForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                url: "<?php echo base_url('Tech_Expertise/create/'); ?>", // Replace with your controller's path
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    // Show specific toast message based on response
                    if (response.status === 'success') {
                        toastr.success(response.message, '', { timeOut: 5000 });
                    } else if (response.status === 'error') {
                        toastr.error(response.message, '', { timeOut: 5000 });
                    };
                    $('#createModal').modal('hide');
                    $('#createForm')[0].reset();
                    loadDatatableAjax();
                },
                error: function (xhr) {
                    // Parse specific error message from server response
                    const response = xhr.responseJSON;
                    if (response && response.message) {
                        toastr.error(response.message, '', { timeOut: 5000 });
                    } else {
                        toastr.error('An unexpected error occurred. Please try again.', '', { timeOut: 5000 });
                    }
                }
            });
        });
        // Load data into DataTable when the document is ready
        $(document).ready(function () {
            loadDatatableAjax();  // Initial call to load data
        });

        // Function to load DataTable with AJAX data
        function loadDatatableAjax() {
            $('#example1').DataTable({
                "bDestroy": true,  // Destroy the existing DataTable instance
                "ajax": {
                    "url": "<?php echo base_url('Tech_Expertise/fetchDatafromDatabase/' . $id); ?>",  // Pass ID here
                    "type": "GET",
                    "dataSrc": function (json) {
                        // console.log("Data from server:", json);  // Log the data to verify the order
                        return json.data;  // Return the data array to populate the table
                    }
                },
                "responsive": true,
                "scrollX": true,
                "columnDefs": [
                    { "width": "5%", "targets": 0 }, // S.No
                    { "width": "15%", "targets": 1 }, // Title
                    { "width": "30vw", "targets": 2 }, // Description (Viewport width)
                    { "width": "10%", "targets": 3 }, // Image
                    { "width": "15%", "targets": 4 }  // Action
                ],
                "dom": '<"top"f>rt<"bottom"lp><"clear">', // Define the layout
                "initComplete": function () {
                    // Implementing custom filters
                    var notApplyFilterOnColumn = [4];
                    var inputFilterOnColumn = [0];
                    var showFilterBox = 'afterHeading'; // 'beforeHeading', 'afterHeading'
                    $('.gtp-dt-filter-row').remove();
                    var theadSecondRow = '<tr class="gtp-dt-filter-row">';
                    $(this).find('thead tr th').each(function (index) {
                        theadSecondRow += '<td class="gtp-dt-select-filter-' + index + '"></td>';
                    });
                    theadSecondRow += '</tr>';

                    if (showFilterBox === 'beforeHeading') {
                        $(this).find('thead').prepend(theadSecondRow);
                    } else if (showFilterBox === 'afterHeading') {
                        $(theadSecondRow).insertAfter($(this).find('thead tr'));
                    }

                    this.api().columns().every(function (index) {
                        var column = this;

                        if (inputFilterOnColumn.indexOf(index) >= 0 && notApplyFilterOnColumn.indexOf(index) < 0) {
                            $('td.gtp-dt-select-filter-' + index).html('<input type="text" class="gtp-dt-input-filter">');
                            $('td input.gtp-dt-input-filter').on('keyup change clear', function () {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                        } else if (notApplyFilterOnColumn.indexOf(index) < 0) {
                            var select = $('<select><option value="">Select</option></select>')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
                            $('td.gtp-dt-select-filter-' + index).html(select);
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                        }
                    });
                }
            });
        }




        loadDatatableAjax();

        // Event listener for the Edit button
        $(document).on('click', '.editButton', function () {
            var row = $(this).closest('tr');  // Get the row that the Edit button was clicked on
            var tech_id = row.find('td').eq(0).text();  // Assuming the first column contains the ID
            var tech_values = row.find('td').eq(3).text();  // Assuming the 4th column contains tech_values

            // Populate the modal fields with the data from the row
            $('#tech_id').val(tech_id);
            $('#tech_values').val(tech_values);

            // Show the modal
            $('#editModal').modal('show');
        });

        // Event listener for the Update button
        $('#updateButton').click(function () {
            // Get the values from the modal form
            var tech_id = $('#tech_id').val();
            var tech_values = $('#tech_values').val();

            // Send the updated values to the backend via AJAX
            $.ajax({
                url: "<?php echo base_url('Tech_Expertise/updateTechExpertise'); ?>",
                type: "POST",
                data: {
                    tech_id: tech_id,
                    tech_values: tech_values
                },
                success: function (response) {
                    if (response.success) {
                        alert('Tech expertise updated successfully!');
                        $('#editModal').modal('hide');
                        // Reload the table data to reflect the changes
                        $('#example1').DataTable().ajax.reload();
                    } else {
                        alert('Failed to update tech expertise!');
                    }
                },
                error: function () {
                    alert('Error while updating data!');
                }
            });
        });


        // Handle deletion of a record
        function deleteFun(exp_id) {
            console.log(exp_id);
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "<?php echo base_url('Tech_Expertise/deleteSingleData'); ?>",
                    method: "post",
                    data: { exp_id: exp_id },
                    dataType: "json",
                    success: function (response) {
                        if (response == 1) {
                            alert('Record deleted successfully');
                            loadDatatableAjax();
                        } else {
                            alert('Failed to delete record');
                        }
                    }
                });
            }
        }
    </script>

</main>