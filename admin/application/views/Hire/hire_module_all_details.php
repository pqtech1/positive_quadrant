<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Hire Details'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section ul li {
            margin: 5px 0;
        }
        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <!-- <h1><?= $title ?? 'Hire Details'; ?></h1> -->

    <!-- Hire Details Section -->
    <div class="section">
        <h2>Hire Details</h2>
        <?php if (!empty($hire_details)): ?>
            <p><strong>Technology Name:</strong> <?= $hire_details['tech_name'] ?? 'N/A'; ?></p>
            <p><strong>Main Description:</strong> <?= $hire_details['tech_main_desc'] ?? 'N/A'; ?></p>
            <p><strong>Sub Description:</strong> <?= $hire_details['tech_sub_desc'] ?? 'N/A'; ?></p>
            <p><strong>Slug URL:</strong> <?= $hire_details['slug_url'] ?? 'N/A'; ?></p>

            <!-- Banner Image -->
            <?php if (!empty($hire_details['banner_img'])): ?>
                <p><strong>Banner Image:</strong></p>
                <img src="<?= base_url('./uploads/tech_banner_img/' . $hire_details['banner_img']); ?>" alt="Banner Image" style="width: 100px; margin-left: 10px;">
            <?php else: ?>
                <p><strong>Banner Image:</strong> No image available</p>
            <?php endif; ?>

            <!-- Tech Main Image -->
            <?php if (!empty($hire_details['tech_main_img'])): ?>
                <p><strong>Main Image:</strong></p>
                <img src="<?= base_url('./uploads/tech_main_img/' . $hire_details['tech_main_img']); ?>" alt="Main Image" style="width: 100px; margin-left: 10px;">
            <?php else: ?>
                <p><strong>Main Image:</strong> No image available</p>
            <?php endif; ?>
        <?php else: ?>
            <p>No hire details available.</p>
        <?php endif; ?>
    </div>

    <!-- Category Section -->
    <div class="section">
        <h2>Category</h2>
        <p><strong>Category Name:</strong> <?= $category_name ?? 'N/A'; ?></p>
    </div>

    <!-- Tech Details Section -->
    <div class="section">
        <h2>Technology Details</h2>
        <?php if (!empty($tech_details)): ?>
            <ul>
                <?php foreach ($tech_details as $tech): ?>
                    <li>
                        <strong>Technology Name:</strong> <?= $tech['tech_name'] ?? 'N/A'; ?><br>
                        <strong>Technology Value:</strong> <?= $tech['tech_id'] ?? 'N/A'; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No technology details available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
