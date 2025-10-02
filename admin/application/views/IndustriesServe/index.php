<main id="main-container">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <div style="padding:2rem;">
        <br><br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Add Industries Serve
        </button><br><br>

        <form id="createForm" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Industries Serve</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control-file" name="industry_image">
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
                    <th>Name</th>
                    <th>Status</th>
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
                        <input type="hidden" name="industry_old_image" id="editOldImage">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                id="edit_industry_name">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="edit_status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div id="imageContainer">
                                <!-- Image will be displayed here -->
                            </div>
                            <input type="file" class="form-control-file" name="industry_image">
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
        $(document).ready(function () {

            console.log("loaded the script")
            // Handle form submission for adding a record
            $("#createForm").submit(function (event) {
                console.log("testing")
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url('IndustriesServe/create'); ?>",
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

            loadDatatableAjax();

            function loadDatatableAjax() {
                $('#example1').DataTable({
                    "bDestroy": true,
                    "ajax": "<?php echo base_url('IndustriesServe/fetchDatafromDatabase'); ?>",
                    "responsive": true,
                    "scrollX": false,   // ❌ hatao scrollX, jab tak bahut bada data na ho
                    "autoWidth": false, // ✅ DataTable apne aap width na set kare
                    "columnDefs": [
                        { "width": "5%", "targets": 0, "className": "text-center" },  // S.No
                        { "width": "35%", "targets": 1 }, // Name
                        { "width": "10%", "targets": 2, "className": "text-center" },  // Status
                        { "width": "25%", "targets": 3, "className": "text-center" },  // Image
                        { "width": "25%", "targets": 4, "className": "text-center" }   // Action
                    ],
                    "dom": '<"top"f>rt<"bottom"lp><"clear">'
                });
            }

            // Handle editing of a record
            $(document).on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.post("<?php echo base_url('IndustriesServe/getEditData'); ?>", { id: id }, function (response) {
                    $('#editID').val(response.id);
                    $('#edit_industry_name').val(response.name);
                    $('#edit_status').val(response.status);
                    $('#editOldImage').val(response.industry_image);
                    $('#imageContainer').html('<img src="<?php echo base_url("uploads/industry-serve/"); ?>' + response.industry_image + '" style="width:100px;">');
                    $('#editModal').modal({ backdrop: "static", keyboard: false });
                }, 'json').fail(function () { alert('Error fetching data'); });
            });

            // Handle form submission for updating a record
            $("#editForm").submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "<?php echo base_url('IndustriesServe/update'); ?>",
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
            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                if (!confirm("Are you sure you want to delete this record?")) return;
                $.post("<?php echo base_url('IndustriesServe/deleteSingleData'); ?>", { id: id }, function (response) {
                    if (response == 1) {
                        alert('Record deleted successfully');
                        loadDatatableAjax();
                    } else {
                        alert('Failed to delete record');
                    }
                }, 'json').fail(function () { alert('Delete request failed'); });
            });


        })
    </script>

</main>