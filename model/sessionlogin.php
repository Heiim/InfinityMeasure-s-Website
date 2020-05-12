<?php 
session_start();

require('model/connectdb.php');

// on prépare le SQL pour éviter les injections SQL
if ($stmt = $con->prepare('SELECT idaccount,firstn,lastn, password FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // On vérifie si le compte est dans la DB
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$firstn,$lastn,$password);
        $stmt->fetch();
        // Le compte existe on vérifie le mot de passe
        if (password_verify($_POST['password'], $password)) {
            // Tout est okay on créé la sessions
            session_regenerate_id();

            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $firstn . " " . $lastn;
            $_SESSION['id'] = $id;
            
            $stmt->close();
            
            $stmt2 = $con->prepare('SELECT * FROM admins WHERE idadmin = ?');
            $stmt2->bind_param('i', $_SESSION['id']);
            $stmt2->execute();
            $stmt2->store_result();

            if ($stmt2->num_rows > 0) {
                //si dans la table admin c'est un admin
                $_SESSION['status'] = "admin";
            } else {
                $stmt2->close();

                $stmt3 = $con->prepare('SELECT * FROM managers WHERE idmanager = ?');
                $stmt3->bind_param('i', $_SESSION['id']);
                $stmt3->execute();
                $stmt3->store_result();

                if ($stmt3->num_rows > 0) {
                    //si dans la table manager c'est un manager
                    $_SESSION['status'] = "manager";
                } else {
                //sinon user
                $_SESSION['status'] = "user";
                }
            }

            return;
        } else {
            $error='Mot%20de%20passe%20incorrect.';
            return;
        }
    } else {
        $error='Ce%20compte%20n\'existe%20pas.';
        return;
    }
}