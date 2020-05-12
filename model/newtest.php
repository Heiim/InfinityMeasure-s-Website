<?php

require('model/connectdb.php');

// On vérifie si un test avec le même nom existe pas déjà
    if ($stmt = $con->prepare('SELECT idtest FROM tests WHERE name = ? or description=?')) {
        $stmt->bind_param('ss', $_POST['name'], $_POST['description']);
        $stmt->execute();
        $stmt->store_result();
        // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
        if ($stmt->num_rows > 0) {
            // Un compte avec ce mail existe déjà
            $messagedisp = 'Un test avec ce nom ou cette descriptions existe déjà, veuillez en saisir d\'autres.';
            $stmt->close();
        } else {
            $stmt->close();
            $sql = "INSERT INTO tests (idsensor, name, description, min, max, unit) VALUES (?, ?, ?, ?, ?, ?)";
            // Prepare statement
            $stmt2 = $con->prepare($sql);
            $stmt2->bind_param('issiis',$_POST['idsensor'], $_POST['name'],$_POST['description'],$_POST['min'],$_POST['max'],$_POST['unit']);
            $stmt2->execute();
            $stmt2->close();

            $url='Location: index.php?action=adminprofile';
            
            header($url);
            exit;
        }
    }