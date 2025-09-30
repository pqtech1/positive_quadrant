<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Received</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">

<table role="presentation" width="100%" style="background-color: #ffffff; padding: 20px; border: 1px solid #ddd;">
    <tr>
        <td style="font-size: 16px; color: #333333; padding: 10px;">
            <strong>New Enquiry Details:</strong><br><br>
            Name: <?= $name; ?><br>
            Email: <a><?= $email; ?></a><br>
            Phone: <a><?= $mobile; ?></a><br>
            Internship For: <?= $subject; ?><br>
            Location: <?= $location; ?><br>
            Date: <?= $date; ?><br>
        </td>
    </tr>
</table>

</body>
</html>
