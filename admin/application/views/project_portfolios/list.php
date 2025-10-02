<main id="main-container">

    <div>
        <h2>Project Portfolios</h2>
        <a href="<?php echo site_url('project_portfolios/create'); ?>" class="btn btn-primary">Add Project</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Industry</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i; foreach ($projects as $p): $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $p->name; ?></td>
                        <td><?php echo $p->name; ?></td>
                        <td><?php echo $p->status; ?></td>
                        <td>
                            <a href="<?php echo site_url('project_portfolios/edit/' . $p->id); ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('project_portfolios/delete/' . $p->id); ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>