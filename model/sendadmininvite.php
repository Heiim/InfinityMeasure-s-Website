<?php

require('model/connectdb.php');

$profilebutton='yes';



// On vérifie si le compte existe pas déjà
if ($stmt = $con->prepare('SELECT idaccount, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
    if ($stmt->num_rows > 0) {
        // Un compte avec ce mail existe déjà
        $messagedisp = 'Un compte avec ce mail existe déjà, veuillez en saisir une autre.';
    } else {
        // Le compte n'exite pas déjà, on envoi l'invit, on va créer un token dans la table admintokens
        
        //delete previous tokens if there are some
        $stmtd = $con->prepare('DELETE FROM admintokens WHERE email=?');
        $stmtd->bind_param('s', $_POST['email']);
        $stmtd->execute();

        if ($stmt = $con->prepare('INSERT INTO admintokens (email, token) VALUES (?,?)')) {
            // On hash et verifiy le mot de passe pour pas le stocket en clair dans la DB
            $token = uniqid();
            
            $stmt->bind_param('ss', $_POST['email'], $token);
            $stmt->execute();

            $from    = 'quirkylimited@gmail.com';
            $subject = 'Création d\'un compte administrateur';
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $register_link = 'http://localhost/index.php?action=adminregister&email=' . $_POST['email'] . '&token=' . $token;
            $message = '<p>Veuillez cliquer sur ce lien pour créer votre compte: <a href="' . $register_link . '">' . $register_link . '</a></p>';
            mail($_POST['email'], $subject, $message, $headers);
            $messagedisp = 'Invitation envoyée';

        } else {
            // Problème avec le SQl, il faut verifier si la table existe
            $messagedisp = 'Erreur';
        }
    }
    $stmt->close();
} else {
    // Problème avec le SQl, il faut verifier si la table existe
    $messagedisp = 'Erreur';
}
$con->close();