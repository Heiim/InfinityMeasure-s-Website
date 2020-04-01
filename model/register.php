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
        if ($stmt = $con->prepare('INSERT INTO accounts (password, email, activation_code, firstn, lastn, token) VALUES (?, ?, ?, ?, ?, ?)')) {
            // On hash et verifiy le mot de passe pour pas le stocket en clair dans la DB
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
            $token = uniqid();
            
            $stmt->bind_param('ssssss', $password, $_POST['email'], $uniqid, $_POST['firstn'],$_POST['lastn'], $token);
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
            
            /*
            if(isset($_POST['status']) && $_POST['status']=='gestionnairepending'){
                $from    = 'quirkylimited@gmail.com';
                $subject = 'Statut gestionnaire du site Infinte Measures ';
                $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $message = '<p>Bonjour, <br/>
                Vous êtes un professionel de la santé et vous avez demandez à être gestionnaire de notre site ? 
                Si cela est le cas, votre compte gestionnaire, sera activé sous les 24h. <br />
                Cordialement, l"Equipe Infinite Measures <br/>
                Mail envoyé automatiquement, ne pas répondre, merci<p>';
                mail($_POST['email'], $subject, $message, $headers);
            }
            */

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