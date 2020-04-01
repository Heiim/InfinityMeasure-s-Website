<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT idsensor, name FROM sensors WHERE idsensor IS NOT NULL');
// On utilise l'id pour récuperer les infos
$stmt->execute();
$stmt->bind_result($idsensor,$sensorname);
$idsolver=array();

while ($stmt->fetch()) {
	$idsolver[$idsensor]=$sensorname;
}
$ids=array_keys($idsolver);