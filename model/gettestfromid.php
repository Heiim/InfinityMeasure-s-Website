<?php

require('model/connectdb.php');

$idtest = intval($_GET['idtest']);
$stmt = $con->prepare('SELECT idsensor,name,description,min,max,unit FROM tests WHERE idtest = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $idtest);
$stmt->execute();
$stmt->bind_result($theidsensor,$name,$description,$min,$max,$unit);

$stmt->fetch();

$stmt->close();

$stmt = $con->prepare('SELECT idsensor, name FROM sensors WHERE idsensor IS NOT NULL');
// On utilise l'id pour récuperer les infos
$stmt->execute();
$stmt->bind_result($idsensor,$sensorname);


$idsolver=array();

while ($stmt->fetch()) {
	$idsolver[$idsensor]=$sensorname;
}
$ids=array_keys($idsolver);