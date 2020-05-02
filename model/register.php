<?php

require('model/connectdb.php');


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
        // Le compte n'exite pas déjà, on le créé

        $stmt = $con->prepare('SELECT idcompany FROM companies WHERE company_code = ?');
            $stmt->bind_param('s', $_POST['company_code']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
            
                $stmt->bind_result($idcompany);
                $stmt->fetch();
                $stmt->close();


            if ($stmt = $con->prepare('INSERT INTO accounts (password, email, activation_code, firstn, lastn, token) VALUES (?, ?, ?, ?, ?, ?)')) {
                // On hash et verifiy le mot de passe pour pas le stocket en clair dans la DB
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $uniqid = uniqid();
                $token = uniqid();
                
                $firstn=ucfirst(strtolower($_POST['firstn']));
                $lastn=ucfirst(strtolower($_POST['lastn']));

                $stmt->bind_param('ssssss', $password, $_POST['email'], $uniqid, $firstn, $lastn, $token);
                $stmt->execute();


                $stmt2 = $con->prepare('SELECT idaccount FROM accounts WHERE email = ?');
                $stmt2->bind_param('s', $_POST['email']);
                $stmt2->execute();
                $stmt2->bind_result($id);
                $stmt2->fetch();
                $stmt2->close();

                $stmt3 = $con->prepare('INSERT INTO users (iduser, birthday, gender, height, weight) VALUES (?, ?, ?, ?, ?)');
                $stmt3->bind_param('issss', $id, $_POST['birthday'], $_POST['gender'], $_POST['height'], $_POST['weight']);
                $stmt3->execute();
                $stmt3->close();

                $from    = 'quirkylimited@gmail.com';
                $subject = 'Activation du compte';
                $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $activate_link = 'http://localhost/index.php?action=activate&email=' . $_POST['email'] . '&code=' . $uniqid;
                $message = '<p>Veuillez cliquer sur ce lien pour activer votre compte: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
                mail($_POST['email'], $subject, $message, $headers);
                $messagedisp = 'Consultez votre boite mail pour activer votre compte.';
                


            } else {
                // Problème avec le SQl, il faut verifier si la table existe
                $messagedisp = 'Erreur';
            }
        } else {
            // pas le bon company_code
            $messagedisp = 'Ce code entreprise est invalide, veuillez contacter un administrateur';
        }
    }
    $stmt->close();
} else {
    // Problème avec le SQl, il faut verifier si la table existe
    $messagedisp = 'Erreur';
}
$con->close();