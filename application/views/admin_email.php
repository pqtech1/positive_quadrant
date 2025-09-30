<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .email-content {
            font-size: 16px;
            color: #333333;
            line-height: 1.6;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<table class="email-container" role="presentation">
    <tr>
        <td>
            <div class="email-header">New Enquiry Details</div>
            <div class="email-content">
                <p><strong>Name:</strong> <?= htmlspecialchars($name); ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($email); ?>"><?= htmlspecialchars($email); ?></a></p>
                <p><strong>Phone:</strong> <a href="tel:<?= htmlspecialchars($phone); ?>"><?= htmlspecialchars($phone); ?></a></p>
                <p><strong>Service:</strong> <?= htmlspecialchars($service); ?></p>
                <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($message)); ?></p>
            </div>
        </td>
    </tr>
</table>

</body>
</html>
