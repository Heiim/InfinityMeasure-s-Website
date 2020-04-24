<?php

require('model/connectdb.php');
	
// Les infos sont pas stokées dans la session, on les récupère ici
$stmt = $con->prepare('SELECT password, email, firstn, lastn, picture FROM accounts WHERE idaccount = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $firstn, $lastn, $picture);
$stmt->fetch();
$stmt->close();