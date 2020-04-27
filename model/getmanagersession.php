<?php

require('model/connectdb.php');

$stmt2 = $con->prepare('SELECT idcompany FROM managers WHERE idmanager = ?');
// On utilise l'id pour récuperer les infos
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($idcompany);
$stmt2->fetch();
$stmt2->close();

$stmt3 = $con->prepare('SELECT company_code, name FROM companies WHERE idcompany = ?');
// On utilise l'id pour récuperer les infos
$stmt3->bind_param('i', $idcompany);
$stmt3->execute();
$stmt3->bind_result($company_code, $company_name);
$stmt3->fetch();
$stmt3->close();