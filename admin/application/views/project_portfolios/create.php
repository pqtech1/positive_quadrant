<main id="main-container">

    <div>
        <h2>Create Project</h2>
        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('project_portfolios/store'); ?>">
            <div class="form-group">
                <label>Industry</label>
                <select name="industry_id" class="form-control" required>
                    <?php foreach ($industries as $i): ?>
                        <option value="<?php echo $i->id; ?>"><?php echo $i->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group"><label>Description</label><textarea name="description"
                    class="form-control"></textarea></div>
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group"><label>Project Images</label><input type="file" name="project_images[]"
                    class="form-control" multiple></div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

</main>