<?php

require('model/connectdb.php');

// On vérifie si l'entreprise existe pas déjà
if ($stmt = $con->prepare('SELECT idcompany FROM companies WHERE name = ?')) {
    $stmt->bind_param('s', $_POST['name']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $messagewrong = 'Cette entreprise existe déjà dans la base de données';
    } else {
        // on créé
        if ($stmt = $con->prepare('INSERT INTO companies (company_code, name) VALUES (?, ?)')) {
            $uniqid = uniqid();
            
            $stmt->bind_param('ss', $uniqid, $_POST['name']);
            $stmt->execute();
            $stmt->close();

            $messageright = "L'entreprise à été ajoutée avec succès";

        } else {
            // Problème avec le SQl, il faut verifier si la table existe
            $messagewrong = 'Erreur';
        }
    }
} else {
    // Problème avec le SQl, il faut verifier si la table existe
    $messagewrong = 'Erreur';
}
$con->close();