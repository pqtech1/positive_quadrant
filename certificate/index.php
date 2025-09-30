<?php 

include 'dbconnect.php';

$sql = $conn->prepare("SELECT * FROM certificates");
$sql->execute();
require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
  ->setUsername('info@positivequadrant.in')
  ->setPassword('tcneycpnflqcapxv')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {

$name=$result['name'];
$course_name = $result['course_name'];
$id = (string)$result['id'];
$email = $result['email'];
$html = "<!DOCTYPE html>
<html>
<body>
<p>Dear <strong>".$name.",</strong><p>
<p>We trust this message finds you in good health and high spirits.</p>
<p>We are delighted to inform you that you have successfully attended the two-day online webinar on <b>".$course_name."</b> organized by <b>Positive Quadrant Technologies LLP</b>. Your participation and engagement greatly contributed to the success of the event.</p>
<p>Enclosed, please find your Certificate of Attendance, which serves as a testament to your commitment to continuous learning and professional development. We hope that the knowledge gained during this webinar will prove valuable in your academic and professional pursuits.</p>
<p>We would like to express our sincere appreciation for your active participation. Your presence was instrumental in making this event a meaningful and enriching experience for all involved.</p>
<p>Should you have any questions or require further assistance, please feel free to reach out.</p>
<p>Once again, congratulations on your successful completion of the webinar. We look forward to your continued engagement in future events and initiatives.</p>
<p><b>Note:Soon we are starting offline traning for all IT Trending Courses</b></p>
<p><a style='background-color:#1e9e9d66;color:#000;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;border:2px solid #000;border-radius:50px'href='http://positivequadrant.in/certificate/download?token=".urlencode(base64_encode($id))."' target='_blank'>Click here to dowlaod cerificate</a></p>
<a href='http://positivequadrant.in/' target='_blank'><img src='http://positivequadrant.in/assets/img/new_logo.png' alt='PQ Logo' width='200' height='50'></a>
<p><a href='mailto:info@positivequadrant.in'>Email :info@positivequadrant.in</a></p>
<p><a href='tel:8169150592'>Call :8169150592</a></p>
</body>
</html>";

// Create a message
$message = (new Swift_Message(' Certificate of Achievement '.$result['name']))
  ->setFrom(['info@positivequadrant.in' => 'Positive Quadrant Technologies'])
  ->setTo($email)
  ->setBody($html, 'text/html')
  ;
  try {
        $mailer->send($message);
    }
    catch (\Swift_TransportException $e) {
        echo $e->getMessage();
    }

}

?>