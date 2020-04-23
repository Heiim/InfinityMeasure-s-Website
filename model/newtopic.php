<?php

require('model/connectdb.php');

if ($stmt = $con->prepare('SELECT idtopic FROM topics WHERE title=?')) {
    $stmt->bind_param('s', $_POST['title']);
    $stmt->execute();
    $stmt->store_result();
    // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
    if ($stmt->num_rows > 0) {
        // Un compte avec ce mail existe déjà
        $messagedisp = 'Un test avec ce nom ou cette descriptions existe déjà, veuillez en saisir d\'autres.';
        $stmt->close();
        header('Location: index.php?action=forum&error='.$messagedisp);
        exit();
    } else {
        $stmt->close();
        $sql = "INSERT INTO topics (title, status) VALUES (?, ?)";
        // Prepare statement
        $stmt2 = $con->prepare($sql);

        $status='open';

        $stmt2->bind_param('ss',$_POST['title'],$status);

        $stmt2->execute();
        $stmt2->close();

        //on recup l'id du topic
        $stmt3 = $con->prepare('SELECT idtopic FROM topics WHERE title=?');
        $stmt3->bind_param('s', $_POST['title']);
        $stmt3->execute();
        $stmt3->bind_result($idtopic);
        $stmt3->fetch();
        $stmt3->close();

        //on créé le premier messsage

        $sql = "INSERT INTO posts (idtopic, idaccount, content) VALUES (?, ?, ?)";
        // Prepare statement
        $stmt4 = $con->prepare($sql);

        $contentToStore = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));

        $stmt4->bind_param('iis',$idtopic,$_SESSION['id'],$contentToStore);

        $stmt4->execute();
        $stmt4->close();


    }
}

