<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333333;
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
        }
        h3 {
            color: #2c3e50;
        }
        p {
            margin: 0 0 10px;
            line-height: 1.6;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .logo img {
            width: 100%;
            max-width: 200px;
            display: block;
            margin: 20px auto 0;
        }
    </style>
</head>
<body>

<table class="email-container" role="presentation">
    <tr>
        <td style="font-size: 16px;">
            <h3>Thank You, <?= htmlspecialchars($name); ?>!</h3>
            <p>We have received your enquiry regarding <strong><?= htmlspecialchars($service); ?></strong>. Our team will get back to you shortly.</p>
            <p>Thank you for reaching out to us! We value your interest and will contact you soon.</p>
            <p>Best regards,</p>
            <p><a href="http://positivequadrant.in" target="_blank">Positive Quadrant Technologies LLP</a></p>
            <div class="logo">
                <a href="<?= base_url(); ?>">
                    <!--<img src="<?= base_url(); ?>assets/img/new_logo.png" alt="Company Logo">-->
                    <img src="https://www.positivequadrant.in/assets/img/new_logo.png" alt="Company Logo">

                </a>
            </div>
        </td>
    </tr>
</table>

</body>
</html>
