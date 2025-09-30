<?php

use PHPMailer\PHPMailer\PHPMailer;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



function send_email($subject = '', $body = '', $recipient_email = '', $reply_email = '', $cc_email = '', $attachment = array())
{
    require_once FCPATH . 'application/libraries/phpmailer/src/Exception.php';
    require_once FCPATH . 'application/libraries/phpmailer/src/PHPMailer.php';
    require_once FCPATH . 'application/libraries/phpmailer/src/SMTP.php';

    $status = FALSE;
    $CI = &get_instance();

    $mail = new PHPMailer();
    // $mail->SMTPDebug = TRUE;
    $mail->SMTPAuth = TRUE;
    $mail->CharSet = EMAIL_CHARSET;
    $mail->SMTPSecure = EMAIL_SMTPSecure;
    $mail->Host = EMAIL_HOST;
    $mail->Port = 587;
    $mail->Username = EMAIL_USERNAME;                 // SMTP username
    $mail->Password = EMAIL_PASSWORD;    // $mail->isSMTP();
    $mail->Mailer = EMAIL_MAILER;
    $mail->From = "";
    $mail->FromName = "";
    $mail->addAddress($recipient_email);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->isHTML(true);


    if (isset($reply_email) && $reply_email != '') {
        $reply_email_addr = explode(',', $reply_email);
        foreach ($reply_email_addr as $reply_list) {
            $mail->addReplyTo($reply_list);
        }
    }


    if (isset($cc_email) && $cc_email != '') {
        $cc_email_addr = explode(',', $cc_email);
        foreach ($cc_email_addr as $cc_list) {
            $mail->addCC($cc_list);
        }
    }

    if (isset($bcc_email) && $bcc_email != '') {
        $bcc_email_addr = explode(',', $bcc_email);
        foreach ($bcc_email_addr as $bcc_list) {
            $mail->addBCC($bcc_list);
        }
    }

    if (isset($attachment) && is_array($attachment) && count($attachment) > 0) {
        foreach ($attachment as $attachkey => $attachvalue) {
            $file_path = $attachvalue;
            $new_file_name = $attachvalue;
            $mail->addAttachment($file_path, $new_file_name);
        }
    }
    if ($mail->Send()) {
        $status = TRUE;
        return true;
    } else {
        $status = FALSE;
        echo "NOT SEND";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    exit;
}



// if (!function_exists('send_email_smtp')) {
//     function send_email_smtp($to, $subject, $message, $from = 'ei73pg4h9q5h@positivequadrant.in', $from_name = 'Naimish')
//     {
//         // Load CodeIgniter's email library
//         $CI = &get_instance();
//         $CI->load->library('email');

//         // Set up email configuration
//         $config = array(
//             'protocol' => 'smtp',
//             'smtp_host' => 'positivequadrant.in',
//             'smtp_port' => 587,
//             'smtp_user' => 'ei73pg4h9q5h',
//             'smtp_pass' => 'Rajnish@123',
//             'mailtype' => 'html',
//             'charset' => 'iso-8859-1',
//             'wordwrap' => true,
//             'newline' => "\r\n"
//         );

//         $CI->email->initialize($config);

//         // Sender and recipient
//         $CI->email->from($from, $from_name);
//         $CI->email->to($to);

//         // Email subject and message
//         $CI->email->subject($subject);
//         $CI->email->message($message);

//         // Send the email
//         if ($CI->email->send()) {
//             return true;
//         } else {
//             return false;
//         }
//     }
// }
