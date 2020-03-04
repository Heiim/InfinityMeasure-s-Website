<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.html');
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

$stmt = $con->prepare('SELECT idtest,result,date FROM results WHERE id = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($idtest,$result,$date);

$results=array();
$dates=array();
while ($stmt->fetch()) {
	array_push($results,$result);
	array_push($dates,$date);
}

require 'index.php';