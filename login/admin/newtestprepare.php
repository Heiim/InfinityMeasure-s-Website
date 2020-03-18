<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT idsensor, name FROM sensors WHERE idsensor IS NOT NULL');
// On utilise l'id pour récuperer les infos
$stmt->execute();
$stmt->bind_result($idsensor,$sensorname);
$idsolver=array();

while ($stmt->fetch()) {
	$idsolver[$idsensor]=$sensorname;
}
$ids=array_keys($idsolver);

require 'newtest.php';
?>