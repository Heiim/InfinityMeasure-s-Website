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

$stmt = $con->prepare('SELECT idsender, idreceiver, content, time FROM messages WHERE (idsender = ? AND idreceiver = ?) OR (idsender = ? AND idreceiver = ?)');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('iiii', $_GET['id'], $_SESSION['id'],$_SESSION['id'],$_GET['id']);
$stmt->execute();
$stmt->bind_result($idsender,$idreceiver,$content,$time);

$idreceivers=array();
$idsenders=array();
$times=array();
$contents=array();

while ($stmt->fetch()) {
	array_push($contents,$content);
	array_push($idsenders,$idsender);
	array_push($idreceivers,$idreceiver);
	array_push($times,$time);
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

$sendto=$_GET['id'];

require 'index.php';
?>