<?php 
require('model/connectdb.php');
$stmt = $con->prepare("SELECT email FROM admins LEFT JOIN accounts ON admins.idadmin = accounts.idaccount=1");
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

$contain=nl2br(htmlentities($_POST["contain"]));
$from    = 'quirkylimited@gmail.com';
$subject = 'Formulaire de contact';
$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$message = 'Subject :' . "\r\n" . $_POST["subject"] . '<br/>' . 'Last name :' . "\r\n" . $_POST["lastn"] . '<br/>' . 'First name :' . "\r\n" . $_POST["firstn"] . '<br/>' .'email:' . "\r\n" . $_POST["email"] . '<br/>' . $contain;

mail($email,$subject, $message, $headers);
header('Location: index.php?action=contactussend');

?>