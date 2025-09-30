<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Enquiry</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #333333; margin: 0; padding: 0; }
        img{
            width:100%;
            aspect-ratio:3/2;
            object-fit:contain;
        }
    </style>
</head>
<body>

<table role="presentation" width="100%" style="padding: 20px;">
    <tr>
        <td style="font-size: 16px; color: #333333; padding: 10px;">
            <h3>Thank You, <?= $name; ?>!</h3>
            <p>We have received your enquiry regarding <strong><?= $subject; ?></strong> internship. Our team will get back to you shortly.</p>
            <p>Here are the details you submitted:</p>
            <p>Phone: <?= $mobile; ?></p>
            <p>Email: <?= $email; ?></p>
            <p>Thank you for reaching out to us! We value your interest and will contact you soon.</p>
            <p>Best regards,</p>
            <p><a href="http://positivequadrant.in" target="_blank">Positive Quadrant Technologies LLP</a></p>
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/img/new_logo.png" alt="company logo">
             </a>
        </td>
    </tr>
</table>

</body>
</html>
