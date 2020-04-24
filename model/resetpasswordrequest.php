<?php

require('model/connectdb.php');

if ($stmt = $con->prepare('SELECT token FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', htmlspecialchars($_POST['email']));
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($token);
    $stmt->fetch();
    
    $from    = 'quirkylimited@gmail.com';
    $subject = 'Réinitialisation du mot de passe';
    $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $reset_link = 'http://localhost/index.php?action=doresetpasswordrequest&token=' . $token . '&email=' . $_POST['email'];
    $message = '<p>Veuillez cliquer sur ce lien pour activer votre compte: <a href="' . $reset_link . '">' . $reset_link . '</a></p>';
    mail($_POST['email'], $subject, $message, $headers);
    
    $messagedisp = 'Consultez votre boite mail pour réinitialiser votre mot de passe.';
} else {
    $messagedisp = 'Erreur';
}