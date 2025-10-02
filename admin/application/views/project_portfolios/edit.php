<main id="main-container">

    <div>
        <h2>Edit Project</h2>
        <form method="post" enctype="multipart/form-data"
            action="<?php echo site_url('project_portfolios/update/' . $project->id); ?>">
            <div class="form-group">
                <label>Industry</label>
                <select name="industry_id" class="form-control">
                    <?php foreach ($industries as $i): ?>
                        <option value="<?php echo $i->id; ?>" <?php echo ($project->industry_id == $i->id) ? 'selected' : ''; ?>>
                            <?php echo $i->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group"><label>Name</label><input type="text" name="name"
                    value="<?php echo $project->name; ?>" class="form-control" required></div>
            <div class="form-group"><label>Description</label><textarea name="description"
                    class="form-control"><?php echo $project->description; ?></textarea></div>
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" <?php echo ($project->status == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo ($project->status == 'inactive') ? 'selected' : ''; ?>>Inactive
                    </option>
                </select>
            </div>
            <div class="form-group"><label>Upload More Images</label><input type="file" name="project_images[]"
                    class="form-control" multiple></div>

            <h4>Existing Images</h4>
            <?php foreach ($images as $img): ?>
                <div style="margin:10px;display:inline-block;">
                    <img src="<?php echo base_url('/uploads/projects/' . $img->image_path); ?>" width="100">
                    <br>
                    <a href="<?php echo site_url('project_portfolios/delete_image/' . $img->id . '/' . $project->id); ?>"
                        class="btn btn-danger btn-xs" onclick="return confirm('Delete image?')">Delete</a>
                </div>
            <?php endforeach; ?>

            <br><br>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

</main>