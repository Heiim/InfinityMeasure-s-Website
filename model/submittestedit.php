<?php

require('model/connectdb.php');

// On vérifie si un test avec le même nom existe pas déjà
if ($stmt = $con->prepare('SELECT idtest FROM tests WHERE (name = ? or description=?) and idtest != ?')) {
    $stmt->bind_param('ssi', $_POST['name'], $_POST['description'], $_POST['idtest']);
    $stmt->execute();
    $stmt->store_result();
    // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
    if ($stmt->num_rows > 0) {
        $messagedisp = 'Un test avec ce nom ou cette description existe déjà, veuillez en saisir d\'autres.';
        $stmt->close();
    } else {
        $stmt->close();
        $sql = "UPDATE tests SET idsensor=?, name=?, description=?, min=?, max=?, unit=? WHERE idtest=?";

        // Prepare statement
        $stmt2 = $con->prepare($sql);
        $stmt2->bind_param('issiisi',$_POST['idsensor'], $_POST['name'],$_POST['description'],$_POST['min'],$_POST['max'],$_POST['unit'],$_POST['idtest']);
        $stmt2->execute();
        $stmt2->close();

        $url='Location: index.php?action=edittest&idtest='.$_POST['idtest'];
        
        header($url);
        exit;
    }
}