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
            Add Hire Details
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
                                <select class="form-control" name="tech_category">
                                    <option value="Hire Mobile App Developers">Hire Mobile App Developers</option>
                                    <option value="Hire Frontend Developers">Hire Frontend Developers</option>
                                    <option value="Hire Backend Developers">Hire Backend Developers</option>
                                    <option value="Other Services">Other Services</option>
                                    <option value="Hire AI Engineers">Hire AI Engineers</option>
                                    <option value="Hire DevOps Engineer">Hire DevOps Engineer</option>
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
                                <label>Plugins</label>
                                <textarea class="form-control" placeholder="Enter Plugins"
                                    name="tech_pluggins"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Frameworks</label>
                                <textarea class="form-control" placeholder="Enter Frameworks"
                                    name="tech_frameworks"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Tools & Utilities</label>
                                <textarea class="form-control" placeholder="Enter Tools & Utilities"
                                    name="tech_tools_utilities"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Database</label>
                                <textarea class="form-control" placeholder="Enter Database"
                                    name="tech_database"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Design</label>
                                <textarea class="form-control" placeholder="Enter Design" name="tech_design"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Deployment</label>
                                <textarea class="form-control" placeholder="Enter Deployment"
                                    name="tech_deployment"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Management</label>
                                <textarea class="form-control" placeholder="Enter Management"
                                    name="tech_management"></textarea>
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







        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Tech Name</th>
                    <th>Main Description</th>
                    <th>Sub Description</th>
                    <th>Plugins</th>
                    <th>Frameworks</th>
                    <th>Tools & Utilities</th>
                    <th>Database</th>
                    <th>Design</th>
                    <th>Deployment</th>
                    <th>Management</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be injected here by jQuery -->
            </tbody>
        </table>

    </div>

    <!-- Edit modal -->




    <script>
        $(document).ready(function () {

            // CREATE Operation
            $('#createForm').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('hire/create'); ?>",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        let res = JSON.parse(response);
                        if (res.status === 'success') {
                            alert('Record added successfully');
                            loadData(); // Reload the table data
                        } else {
                            alert('Error adding record');
                        }
                    }
                });
            });

            // READ Operation - Load data from database
            function loadData() {
                $.ajax({
                    type: 'GET',
                    // url: '/hire_details/read',
                    url: "<?php echo base_url('/hire/read'); ?>",

                    success: function (response) {
                        let data = JSON.parse(response);
                        let html = '';
                        $.each(data, function (index, item) {
                            html += `
                    <tr>
                        <td>${item.tech_name}</td>
                        <td>${item.tech_main_desc}</td>
                        <!-- Add other fields as needed -->
                        <td>
                            <button class="edit-btn" data-id="${item.id}">Edit</button>
                            <button class="delete-btn" data-id="${item.id}">Delete</button>
                        </td>
                    </tr>
                `;
                        });
                        $('#data-table').html(html);
                    }
                });
            }

            // Call loadData() initially
            loadData();

            // UPDATE Operation
            $(document).on('click', '.edit-btn', function () {
                let id = $(this).data('id');

                // Populate the form with the current data (fetch data by ID if needed)
                $.ajax({
                    type: 'GET',
                    // url: `/hire_details/edit/${id}`,
                    url: "<?php echo base_url(`/hire/edit/${id}`); ?>",


                    success: function (response) {
                        let data = JSON.parse(response);
                        // Populate form fields here using data returned
                        $('#updateForm input[name="tech_name"]').val(data.tech_name);
                        $('#updateForm input[name="tech_main_desc"]').val(data.tech_main_desc);
                        // Set the action to update
                        $('#updateForm').data('id', id);
                        $('#updateModal').modal('show');
                    }
                });
            });

            $('#updateForm').on('submit', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    // url: `/hire_details/update/${id}`,
                    url: "<?php echo base_url(`/hire_details/update/${id}`); ?>",

                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        let res = JSON.parse(response);
                        if (res.status === 'success') {
                            alert('Record updated successfully');
                            loadData();
                        } else {
                            alert('Error updating record');
                        }
                    }
                });
            });

            // DELETE Operation
            $(document).on('click', '.delete-btn', function () {
                let id = $(this).data('id');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        type: 'POST',
                        // url: `/hire_details/delete/${id}`,
                        url: "<?php echo base_url(`/hire_details/delete/${id}`); ?>",

                        success: function (response) {
                            let res = JSON.parse(response);
                            if (res.status === 'success') {
                                alert('Record deleted successfully');
                                loadData();
                            } else {
                                alert('Error deleting record');
                            }
                        }
                    });
                }
            });
        });


    </script>

</main>