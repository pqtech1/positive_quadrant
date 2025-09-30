<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    
<!-- </head>

<body> -->
<main id="main-container">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style type="text/css">
        #example1_wrapper {
            /* background-color:grey; */
            padding-right: 10vw
        }

        #example1_wrapper img {
            width: auto;
            height: 8vh
        }
        .modal-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <div class="container">
        <h1><?php echo $title; ?></h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add New</button>
        <table id="example1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                    <!-- <th>Details</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded via DataTable AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create New Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="technology_id" name="technology_id" class="form-control"
                                value="<?php echo $technology_id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" enctype="multipart/form-data">
                    <input type="hidden" id="editID" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editTitle">Title</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="technology_id" name="technology_id" class="form-control"
                                value="<?php echo $technology_id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editImage">Image</label>
                            <input type="file" class="form-control-file" id="editImage" name="image">
                        </div>
                        <div id="imageContainer"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Record Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailsContent">
                        <!-- Details will be loaded here via AJAX -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->


    <script type="text/javascript">

        $(document).ready(function () {
            loadDatatableAjax();
            var url = new URL(window.location.href);
            var id = url.pathname.split('/').pop();

            if (id && !isNaN(id)) {
                // Use the ID (e.g., to fetch and display data related to this ID)
                console.log("Captured ID from URL:", id);
                // You can use AJAX here to fetch data related to the ID if needed
            }
        });

        $('#createForm').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "<?php echo base_url('subDetails/SoftwareProductSubDetails/create'); ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    console.log('AJAX Response:', response);
                    if (response.status) {
                        $('#createModal').modal('hide');
                        loadDatatableAjax(); // Reload data table
                    } else {
                        let errorMessage = 'Failed to add record: ';
                        if (response.error_string) {
                            errorMessage += response.error_string.join(', ');
                        }
                        alert(errorMessage);
                    }
                },
                error: function () {
                    alert("Error occurred while adding record.");
                }
            });
        });

        $(document).ready(function () {
            var urlParams = new URLSearchParams(window.location.search);
            var technologyId = urlParams.get('technology_id');
            if (technologyId) {
                loadDatatableAjax(technologyId);
            }
        });


        function loadDatatableAjax() {
            var technologyId = $('#technology_id').val();
            $('#example1').DataTable({
                "bDestroy": true,
                "ajax": {
                    "url": "<?php echo base_url('subDetails/SoftwareProductSubDetails/fetchDatafromDatabase'); ?>",
                    "type": "GET", // Use "POST" if you're sending data via POST
                    "data": function (d) {
                        d.technology_id = technologyId; // Pass technology ID to the server
                    }
                },
                "responsive": true,
                "dom": '<"top"f>rt<"bottom"lp><"clear">',
                "initComplete": function () {
                    // Custom filtering code
                    var notApplyFilterOnColumn = [5];
                    var inputFilterOnColumn = [0];
                    var showFilterBox = 'afterHeading';
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

            $('#example1').on('click', '.view-details', function () {
                var data = $('#example1').DataTable().row($(this).parents('tr')).data();
                var id = data[0]; // Assuming ID is in the first column

                $.ajax({
                    url: "<?php echo base_url('subDetails/SoftwareProductSubDetails/getEditData'); ?>",
                    method: "POST",
                    data: { id: id },
                    dataType: "json",
                    success: function (response) {
                        var description = response.description; // Already formatted with <br> in fetchDatafromDatabase
                        var content = `
                    <p><strong>ID:</strong> ${response.id}</p>
                    <p><strong>Title:</strong> ${response.title}</p>
                    <p><strong>Description:</strong> ${description}</p>
                    <p><strong>Image:</strong> <img src="${response.image}" alt="${response.title}" style="max-width: 100px; height: auto;"></p>
                `;
                        $('#detailsContent').html(content);
                        $('#detailsModal').modal('show');
                    },
                    error: function () {
                        alert("Error occurred while fetching record details.");
                    }
                });
            });
        }


        function editFun(id) {
            $.ajax({
                url: "<?php echo base_url('subDetails/SoftwareProductSubDetails/getEditData'); ?>",
                method: "post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    $('#editID').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editDescription').val(response.description);
                    $('#technology_id').val(response.second_key);
                    $('#imageContainer').html('<img src="<?php echo base_url('./uploads/techonologysubdetails/'); ?>' + response.image + '" alt="Image" style="width: 100px;">');
                    $('#editModal').modal({
                        backdrop: "static",
                        keyboard: false
                    });
                }
            });
        }


        // $('#editModal').modal('show');
        $("#editForm").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "<?php echo base_url('subDetails/SoftwareProductSubDetails/update'); ?>",
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


        function deleteFun(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "<?php echo base_url('subDetails/SoftwareProductSubDetails/deleteSingleData'); ?>",
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
                    },
                    error: function () {
                        alert("Error occurred while deleting record.");
                    }
                });
            }
        }
    </script>
</main>