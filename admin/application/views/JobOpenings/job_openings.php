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
            Add Job Openings
        </button><br><br>

        <form id="createForm" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Job Openings</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="form-control" placeholder="Title here" name="job_title">
                            </div>
                            <div class="form-group">
                                <label>Job Description</label>
                                <input type="text" class="form-control" placeholder="Description Here"
                                    name="job_description">
                            </div>
                            <div class="form-group">
                                <label>Job Type</label>
                                <select name="job_type" id="">
                                    <option value="full-time">Full-Time</option>
                                    <option value="part-time">Part-Time</option>
                                    <option value="contract-basis">Contract Basis</option>
                                    <option value="intern">Intern</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Experience Level</label>
                                <input type="text" class="form-control" placeholder="Experience Here"
                                    name="experience_level">
                            </div>
                            <div class="form-group">
                                <label>Job Location</label>
                                <input type="text" class="form-control" placeholder="Location Here" name="job_location">
                            </div>
                            <div class="form-group">
                                <label>Job Date</label>
                                <input type="date" class="form-control" placeholder="Date Here" name="job_date">
                            </div>
                            <div class="form-group">
                                <label>Job Status</label>
                                <select name="job_status" id="">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
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

        <table id="example1" class="display table ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Job Title</th>
                    <th>Job Description</th>
                    <th>Job Type</th>
                    <th>Experience Level</th>
                    <th>Job Location</th>
                    <th>Job Status</th>
                    <th>Job Date</th>
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
                            <label>Job Title</label>
                            <input type="text" class="form-control" placeholder="Title here" name="job_title"
                                id="editJobTitle">
                        </div>
                        <div class="form-group">
                            <label>Job Description</label>
                            <input type="text" class="form-control" placeholder="Description Here"
                                name="job_description" id="editJobDescription">
                        </div>
                        <div class="form-group">
                            <label>Job Type</label>
                            <select name="job_type" id="editJobType">
                                <option value="full-time">Full-Time</option>
                                <option value="part-time">Part-Time</option>
                                <option value="contract-basis">Contract Basis</option>
                                <option value="intern">Intern</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Experience Level</label>
                            <input type="text" class="form-control" placeholder="Experience Here"
                                name="experience_level" id="editExperienceLevel">
                        </div>
                        <div class="form-group">
                            <label>Job Location</label>
                            <input type="text" class="form-control" placeholder="Location Here" name="job_location" id="editJobLocation">
                        </div>
                        <div class="form-group">
                            <label>Job Date</label>
                            <input type="date" class="form-control" placeholder="Date Here" name="job_date" id="editJobDate">
                        </div>
                        <div class="form-group">
                            <label>Job Status</label>
                            <select name="job_status" id="editJobStatus">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
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

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <script type="text/javascript">

        // Handle form submission for adding a record
        $("#createForm").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url('JobOpenings/create'); ?>",
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
                    console.log("create method called")
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
                "ajax": "<?php echo base_url('JobOpenings/fetchDatafromDatabase'); ?>",
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
                url: "<?php echo base_url('JobOpenings/getEditData'); ?>",
                method: "post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#editID').val(response.id);
                    $('#editJobTitle').val(response.job_title);
                    $('#editJobDescription').val(response.job_description);
                    $('#editJobType').val(response.job_type);
                    $('#editExperienceLevel').val(response.experience_level);
                    $('#editJobLocation').val(response.job_location);
                    $('#editJobDate').val(response.job_date);
                    $('#editJobStatus').val(response.job_status);
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
                url: "<?php echo base_url('JobOpenings/update'); ?>",
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
                    url: "<?php echo base_url('JobOpenings/deleteSingleData'); ?>",
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