<main id="main-container">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style type="text/css">
        #example1_wrapper {
            padding-right: 10vw
        }

        #example1_wrapper img {
            width: auto;
            height: 8vh
        }
    </style>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <div class="container">
        <br><br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Add Industries
        </button><br><br>

        <form id="createForm" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Industries</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Industry Title</label>
                                <input type="text" class="form-control" placeholder="Title here" name="title">
                            </div>
                            <div class="form-group">
                                <label>Industry Description</label>
                                <input type="text" class="form-control" placeholder="Description Here"
                                    name="description">
                            </div>
                            <div class="form-group">
                                <label>Details (semicolon-separated)</label>
                                <input type="text" class="form-control" placeholder="Detail 1; Detail 2; ..."
                                    name="details">
                                <small class="form-text text-muted">Enter details separated by semicolons.</small>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary pull-left"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <table id="example1" class="display table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Industry Title</th>
                    <th>Industry Description</th>
                    <th>Details</th> <!-- New column for details -->
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editID">
                        <div class="form-group">
                            <label>Industry Title</label>
                            <input type="text" class="form-control" placeholder="Title here" name="title"
                                id="editTitle">
                        </div>
                        <div class="form-group">
                            <label>Industry Description</label>
                            <input type="text" class="form-control" placeholder="Description Here" name="description"
                                id="editDescription">
                        </div>
                        <div class="form-group">
                            <label>Details (semicolon-separated)</label>
                            <input type="text" class="form-control" placeholder="Detail 1; Detail 2; ..." name="details"
                                id="editDetails">
                            <small class="form-text text-muted">Enter details separated by semicolons.</small>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div id="imageContainer">
                                <!-- Image will be displayed here -->
                            </div>
                            <input type="file" class="form-control-file" name="image">
                            <input type="hidden" id="oldImage" name="old_image">
                            <!-- Hidden field to store old image name -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <script type="text/javascript">
        // Handle form submission for adding a record
        $("#createForm").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url('Industries/create'); ?>",
                data: formData,
                type: "post",
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    $('#createModal').modal('hide');
                    $('#createForm')[0].reset();
                    alert('Successfully inserted');
                    loadDatatableAjax();
                },
                error: function () {
                    alert("Error");
                }
            });
        });

        // Load data into DataTable
        $(document).ready(function () {
            loadDatatableAjax();
        });

        function loadDatatableAjax() {
            $('#example1').DataTable({
                "bDestroy": true,
                "ajax": "<?php echo base_url('Industries/fetchDatafromDatabase'); ?>",
                "responsive": true, // Enable responsive mode
                "scrollX": true,  // Enable horizontal scrolling
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

        // Handle editing of a record
        function editFun(id) {
            $('#editModal').modal('show');

            $.ajax({
                url: "<?php echo base_url('Industries/getEditData'); ?>",
                method: "post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    $('#editID').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editDescription').val(response.description);
                    $('#editDetails').val(response.details); // Populate details field
                    $('#imageContainer').html('<img src="<?php echo base_url('./uploads/industries/'); ?>' + response.image + '" alt="Image" style="width: 100px;">');
                    $('#oldImage').val(response.image); // Set old image name

                    $('#editModal').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }

        // Handle form submission for updating a record
        $("#editForm").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "<?php echo base_url('Industries/update'); ?>",
                data: formData,
                type: "post",
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    $('#editModal').modal('hide');
                    $('#editForm')[0].reset();

                    // Check if the response has the 'status' key
                    if (response.status === 'success') {
                        alert(response.message); // Show the success message from the response
                    } else {
                        alert(response.message); // Show the error message from the response
                    }

                    loadDatatableAjax(); // Refresh the DataTable
                },
                error: function () {
                    alert("Error");
                }
            });
        });
        // Handle deletion of a record
        function deleteFun(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "<?php echo base_url('Industries/deleteSingleData'); ?>",
                    method: "post",
                    data: { id: id },
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