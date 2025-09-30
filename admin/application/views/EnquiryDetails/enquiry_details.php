
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

        <table id="example1" class="display table ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Follow Up</th>
                    <th>Date</th>
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
                            <label>Status</label>
                            <select name="status" id="edit_status">
                                <option>True</option>
                                <option>False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Follow Up</label>
                            <textarea name="follow_up" id="edit_follow_up"></textarea>
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



        // Load data into DataTable
        $(document).ready(function () {
            loadDatatableAjax();
        });

        function loadDatatableAjax() {
            $('#example1').DataTable({
                "bDestroy": true,
                "ajax": "<?php echo base_url('EnquiryDetails/fetchDatafromDatabase'); ?>",
                "responsive": true, // Enable responsive mode
                "scrollX": true,  // Enable horizontal scrolling
                
            });
        }

        // Handle editing of a record
        function editFun(id) {
            $.ajax({
                url: "<?php echo base_url('EnquiryDetails/getEditData'); ?>",
                method: "post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    
                    $('#editID').val(response.id);
                    $('#edit_status').val(response.status);
                    $('#edit_follow_up').val(response.follow_up);
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
                url: "<?php echo base_url('EnquiryDetails/update'); ?>",
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
                    url: "<?php echo base_url('EnquiryDetails/deleteSingleData'); ?>",
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