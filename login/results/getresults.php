<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.php');
	exit();
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$idtest = intval($_GET['idtest']);
$stmt = $con->prepare('SELECT result,date FROM results WHERE iduser = ? AND idtest = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('ii', $_SESSION['id'], $idtest);
$stmt->execute();
$stmt->bind_result($result,$date);

$results=array();
$dates=array();
while ($stmt->fetch()) {
	array_push($results,$result);
	array_push($dates,$date);
}

$stmt->close();

$stmt = $con->prepare('SELECT min, max, description, unit FROM tests WHERE idtest = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $idtest);
$stmt->execute();
$stmt->bind_result($min,$max,$description,$unit);
$stmt->fetch();

require 'index.php';