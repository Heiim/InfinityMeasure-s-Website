<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Password = ''; // password ask the quirky administrators for the password

$rint = random_int(0, 2);

switch ($rint) {
    case 0:
        $mail->Username = 'infinite.measures.g7e@gmail.com'; // email
        $mail->setFrom('infinite.measures.g7e@gmail.com', 'Infinite Measures'); // From email and name
        break;
    case 1:
        $mail->Username = 'infinitemeasuresg7@gmail.com'; // email
        $mail->setFrom('infinitemeasuresg7@gmail.com', 'Infinite Measures'); // From email and name
        break;
    case 2:
        $mail->Username = 'g7e.infinite.measures@gmail.com'; // email
        $mail->setFrom('g7e.infinite.measures@gmail.com', 'Infinite Measures'); // From email and name
        break;
}



$mail->CharSet = "UTF-8";

if (isset($contactemail)) {
    $emailto = $contactemail;
} else {
    $emailto = $_POST["email"];
}

$themail = "{$emailto}";

$mail->addAddress($themail); // to email and name

$thesubject = "{$subject}";
$mail->Subject = $thesubject;

$thebody= "{$message}";

$thefile = "{$filename}";

$mail->IsHTML(true);
//$mail->Body = $message;

//$mail->msgHTML($themessage); 

$mail->msgHTML(file_get_contents($thefile), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

$mail->send();