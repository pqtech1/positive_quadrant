<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f2f2f2;
        }
        .form-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px #ccc;
        }
        input[type="password"], button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-bottom: 15px;
            color: red;
        }
        .success {
            margin-bottom: 15px;
            color: green;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Change Password</h2>

    <?php if (validation_errors()) : ?>
        <div class="message"><?= validation_errors(); ?></div>
    <?php endif; ?>

    <?php if (!empty($message)) : ?>
        <div class="message"><?= $message; ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('Login/update_password') ?>" method="post">
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password">

        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password">

        <label for="confirm_password">Confirm New Password</label>
        <input type="password" name="confirm_password" id="confirm_password">

        <button type="submit">Change Password</button>
    </form>

    <a href="<?= base_url('Dashboard') ?>">← Back to Dashboard</a>
</div>

</body>
</html>
