<!-- <!DOCTYPE html>
<html>
<head>
    <title>Data Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body> -->
<main id="main-container">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Include Font Awesome CDN in the head of your HTML file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style type="text/css">
        #example1_wrapper {
            /* background-color:grey; */
            padding-right: 10vw
        }

        #example1_wrapper img {
            width: auto;
            height: 8vh
        }
    </style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <div class="container">
        <br><br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Add Hiring Details
        </button><br><br>

        <form id="createForm" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Hiring Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tech Category</label>
                                <select class="form-control" name="tech_category" id="tech_category">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['hire_cat_id']; ?>">
                                            <?php echo $category['cat_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Tech Name</label>
                                <input type="text" class="form-control" placeholder="Enter Tech Name" name="tech_name">
                            </div>

                            <div class="form-group">
                                <label>Main Description</label>
                                <textarea class="form-control" placeholder="Enter Main Description"
                                    name="tech_main_desc"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Technology Banner Image</label>
                                <input type="file" class="form-control-file" name="tech_banner_img">

                            </div>

                            <div class="form-group">
                                <label>Sub Description</label>
                                <textarea class="form-control" placeholder="Enter Sub Description"
                                    name="tech_sub_desc"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Technology Main Image</label>
                                <input type="file" class="form-control-file" name="tech_main_img">

                            </div>


                            <div class="form-group">
                                <label>Slug URL</label>
                                <input class="form-control" placeholder="Enter slug url" name="slug_url"></input>
                            </div>

                            <div class="form-group">
                                <label for="is_active">Is Active</label>
                                <select class="form-control" id="is_active" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <table id="example1" class="display table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tech Name</th>
                    <th>Main Description</th>
                    <!-- <th>Banner Image</th>
                    <th>Sub Description</th>
                    <th>Main Image</th>
                    <th>Slug URL</th> -->
                    <th>Is Active</th>
                    <th>Actions</th>
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
                        <div class="form-group">
                            <input type="hidden" name="id" id="editID">
                            <label for="tech_category">Tech Category</label>
                            <select class="form-control" name="tech_category" id="tech_category">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['hire_cat_id']; ?>">
                                        <?php echo $category['cat_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tech_name">Tech Name</label>
                            <input id="tech_name" type="text" class="form-control" placeholder="Enter Tech Name"
                                name="tech_name">
                        </div>

                        <div class="form-group">
                            <label for="tech_main_desc">Main Description</label>
                            <textarea id="tech_main_desc" class="form-control" placeholder="Enter Main Description"
                                name="tech_main_desc"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tech_banner_img">Technology Banner Image</label>
                            <div class="d-flex align-items-center">
                                <input id="tech_banner_img" type="file" class="form-control-file me-2"
                                    name="tech_banner_img">
                                <div id="bannerImageContainer">
                                    <!-- Banner image will be displayed here -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tech_sub_desc">Sub Description</label>
                            <textarea id="tech_sub_desc" class="form-control" placeholder="Enter Sub Description"
                                name="tech_sub_desc"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tech_main_img">Technology Main Image</label>
                            <div class="d-flex align-items-center">
                                <input id="tech_main_img" type="file" class="form-control-file me-2"
                                    name="tech_main_img">
                                <div id="mainImageContainer">
                                    <!-- Main image will be displayed here -->
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="slug_url">Slug URL</label>
                            <input id="slug_url" class="form-control" placeholder="Enter Slug URL"
                                name="slug_url"></input>
                        </div>

                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select class="form-control" id="is_active" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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


    <script type="text/javascript">

        // Handle form submission for adding a record
        $("#createForm").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url('hire/create'); ?>",
                data: formData,
                type: "post",
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        $('#createModal').modal('hide');
                        $('#createForm')[0].reset();
                        alert(response.message);
                        loadDatatableAjax();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error: ", textStatus, errorThrown, jqXHR.responseText);
                    alert("An unexpected error occurred. Check console for details.");
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
                "ajax": "<?php echo base_url('hire/fetchDatafromDatabase'); ?>",
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
            $.ajax({
                url: "<?php echo base_url('hire/getEditData'); ?>",
                method: "post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    $('#editID').val(response.id);
                    $('#tech_category').val(response.tech_category); // Set the selected option in the dropdown
                    $('#tech_name').val(response.tech_name);
                    $('#tech_main_desc').val(response.tech_main_desc);
                    // Display the banner image
                    $('#bannerImageContainer').html('<img src="<?php echo base_url('./uploads/tech_banner_img/'); ?>' + response.banner_img + '" alt="Banner Image" style="width: 100px; margin-left: 10px;">');

                    $('#tech_sub_desc').val(response.tech_sub_desc);
                    // Display the main image
                    $('#mainImageContainer').html('<img src="<?php echo base_url('./uploads/tech_main_img/'); ?>' + response.tech_main_img + '" alt="Main Image" style="width: 100px; margin-left: 10px;">');


                    $('#slug_url').val(response.slug_url);
                    $('#is_Active').val(response.isActive);

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
                url: "<?php echo base_url('hire/update'); ?>",
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

                    loadDatatableAjax();
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
                    url: "<?php echo base_url('hire/deleteSingleData'); ?>",
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