<?php

require('model/connectdb.php');

if (isset($_POST['email'], $_POST['token'], $_POST['password'])) {
    if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND token = ?')) {
        $stmt->bind_param('ss', $_POST['email'], $_POST['token']);
        $stmt->execute();
        
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Existe
            if ($stmt = $con->prepare('UPDATE accounts SET token = ?, password= ? WHERE email = ?')) {
                // On change le code 'activation en "activated" ce quie signifie que le compte est activé.
                $token = uniqid();
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $token, $password, $_POST['email']);
                $stmt->execute();
                $message = 'Mot de passe changé';
            }
        } else {
            $message = 'Echec jeton ou email invalide';
        }
    }
}else{
    $validation=false;
}