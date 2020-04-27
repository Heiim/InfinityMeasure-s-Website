<?php

require('model/connectdb.php');

$loginbutton="yes";

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
        // Le compte n'exite pas déjà, on vérifie le jeton

        $stmt = $con->prepare('SELECT id FROM managertokens WHERE email = ? AND token = ?');
        $stmt->bind_param('ss', $_POST['email'], $_POST['token']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            //la combinaison token email existe
            $stmt->close();

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

                    $activated='activated';
                    
                    $firstn=ucfirst(strtolower($_POST['firstn']));
                    $lastn=ucfirst(strtolower($_POST['lastn']));

                    $stmt->bind_param('ssssss', $password, $_POST['email'], $activated, $firstn, $lastn, $uniqid);
                    $stmt->execute();


                    $stmt2 = $con->prepare('SELECT idaccount FROM accounts WHERE email = ?');
                    $stmt2->bind_param('s', $_POST['email']);
                    $stmt2->execute();
                    $stmt2->bind_result($id);
                    $stmt2->fetch();
                    $stmt2->close();

                    $stmt3 = $con->prepare('INSERT INTO managers (idmanager, idcompany) VALUES (?, ?)');
                    $stmt3->bind_param('ii', $id, $idcompany);
                    $stmt3->execute();
                    $stmt3->close();

                    //on delete le jeton
                    $stmtd = $con->prepare('DELETE FROM managertokens WHERE email=?');
                    $stmtd->bind_param('s', $_POST['email']);
                    $stmtd->execute();

                    $messagedisp = 'Inscription réussite, vous pouvez vous connecter';

                } else {
                    // Problème avec le SQl, il faut verifier si la table existe
                    $messagedisp = 'Erreur';
                }

            } else {
                // pas le bon company_code
                $messagedisp = 'Ce code entreprise est invalide, veuillez contacter un administrateur';
            }
        } else {
            // pas le bon token
            $messagedisp = 'La combinaison email/token est invalide, veuillez contacter un administrateur';
        }
    }   
    $stmt->close();
} else {
    // Problème avec le SQl, il faut verifier si la table existe
    $messagedisp = 'Erreur';
}
$con->close();