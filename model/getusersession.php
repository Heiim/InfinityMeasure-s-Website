<?php

require('model/connectdb.php');

$stmt2 = $con->prepare('SELECT birthday, gender, height, weight FROM users WHERE iduser = ?');
// On utilise l'id pour récuperer les infos
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($birthday, $gender, $height, $weight);
$stmt2->fetch();
$stmt2->close();