<main id="main-container">


    <div>
        <h2 class="text-center">Industries Serve</h2>
        <button class="btn btn-success" onclick="addUser()">+ Add</button>
        <br><br>
        <table class="table table-bordered" id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="userForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add/Edit User</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="old_image" id="old_image">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img id="preview" src="" width="100" style="margin-top:10px; display:none;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            loadUsers();

            $('#userForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('user/save'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#userModal').modal('hide');
                        loadUsers();
                    }
                });
            });
        });

        function loadUsers() {
            $.ajax({
                url: "<?= site_url('user/fetch'); ?>",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var html = '';
                    $.each(data, function (i, row) {
                        html += '<tr>' +
                            '<td>' + row.id + '</td>' +
                            '<td>' + row.name + '</td>' +
                            '<td><img src="<?= base_url('uploads/'); ?>' + row.image + '" width="50"></td>' +
                            '<td>' +
                            '<button class="btn btn-info btn-sm" onclick="editUser(' + row.id + ', \'' + row.name + '\', \'' + row.image + '\')">Edit</button> ' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteUser(' + row.id + ')">Delete</button>' +
                            '</td>' +
                            '</tr>';
                    });
                    $('#userTable tbody').html(html);
                }
            });
        }

        function addUser() {
            $('#userForm')[0].reset();
            $('#id').val('');
            $('#preview').hide();
            $('#userModal').modal('show');
        }

        function editUser(id, name, image) {
            $('#id').val(id);
            $('#name').val(name);
            $('#old_image').val(image);
            if (image) {
                $('#preview').attr('src', "<?= base_url('uploads/'); ?>" + image).show();
            } else {
                $('#preview').hide();
            }
            $('#userModal').modal('show');
        }

        function deleteUser(id) {
            if (confirm("Are you sure to delete?")) {
                $.ajax({
                    url: "<?= site_url('user/delete/'); ?>" + id,
                    type: "POST",
                    success: function () {
                        loadUsers();
                    }
                });
            }
        }
    </script>

</main>