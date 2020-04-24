<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT idsender, idreceiver FROM messages WHERE idsender = ? OR idreceiver = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('ii', $_SESSION['id'], $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($idsender,$idreceiver);


$idreceivers=array();
$idsenders=array();

while ($stmt->fetch()) {
	array_push($idsenders,$idsender);
	array_push($idreceivers,$idreceiver);
}

$stmt->close();

$idsolver=array();

$stmt2 = $con->prepare('SELECT idaccount,firstn, lastn FROM accounts');

$stmt2->execute();
$stmt2->bind_result($idaccount,$firstn,$lastn);
while ($stmt2->fetch()) {
	$name = $firstn .' '. $lastn;
	$idsolver[$idaccount]=$name;
}
$stmt2->close();