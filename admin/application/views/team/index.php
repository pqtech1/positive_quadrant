<main id="main-container">
    <style>
        #previewImage img{
            width: 100px;
        }
      
    </style>
    <div class="teamContainer">
        <h2 class="text-center">Team Members</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#teamModal" onclick="openModal()">Add New
            Member</button>
        <br><br>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>YOE</th>
                    <th>LinkedIn</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="teamTable">
                <?php foreach ($team_members as $member): ?>
                    <tr id="row_<?= $member->id ?>">
                        <td><?= $member->name ?></td>
                        <td><?= $member->position ?></td>
                        <td><?= $member->yoe ?></td>
                        <td><a href="<?= $member->linkedinurl ?>" target="_blank">Profile</a></td>
                        <td><img src="<?= base_url('uploads/team_member/' . $member->image) ?>" alt="..." width="50"/></td>
                        <td><?= $member->is_active ?></td>
                        <td>
                            <button class="btn btn-info btn-xs" onclick="editMember(<?= $member->id ?>)">Edit</button>
                            <button class="btn btn-danger btn-xs" onclick="deleteMember(<?= $member->id ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="teamModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form id="teamForm" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Team Member</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="memberId">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" id="position" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Years of Experience</label>
                            <input type="number" name="yoe" id="yoe" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkedIn URL</label>
                            <input type="url" name="linkedinurl" id="linkedinurl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="image">
                            <div id="previewImage"></div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active", id="is_active">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JS -->
    <script>
        function openModal() {
            $('#teamForm')[0].reset();
            $('#memberId').val('');
            $('#previewImage').html('');
            $('#teamModal .modal-title').text('Add Team Member');
        }

        function editMember(id) {
            $.get("<?= base_url('team/get/') ?>" + id, function (data) {
                var member = JSON.parse(data);
                $('#memberId').val(member.id);
                $('#name').val(member.name);
                $('#position').val(member.position);
                $('#yoe').val(member.yoe);
                $('#linkedinurl').val(member.linkedinurl);
                $('#previewImage').html('<img src="<?= base_url() ?>' + member.image + '" class="preview">');
                $('#is_active').val(member.is_active);

                $('#teamModal .modal-title').text('Edit Team Member');
                $('#teamModal').modal('show');
            });
        }

        function deleteMember(id) {
            if (confirm("Are you sure to delete this member?")) {
                $.post("<?= base_url('team/delete/') ?>" + id, function (res) {
                    var result = JSON.parse(res);
                    if (result.status === 'success') {
                        $('#row_' + id).remove();
                    }
                });
            }
        }

        $('#teamForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#memberId').val();
            var url = id ? "<?= base_url('team/update/') ?>" + id : "<?= base_url('team/store') ?>";

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    var result = JSON.parse(res);
                    if (result.status === 'success') {
                        location.reload();
                    } else {
                        alert(result.message || "Something went wrong");
                    }
                }
            });
        });
    </script>
</main>