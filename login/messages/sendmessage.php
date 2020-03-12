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

$validation=true;

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if(isset($_GET['id'])) { 
	$id=$_GET['id'];
} else {
	$id=$_POST['id'];
}

$stmt = $con->prepare('INSERT INTO messages (idsender,idreceiver,content) VALUES (?, ?, ?)');
$stmt->bind_param('iis',$_SESSION['id'],$id,$_POST['content']);
$stmt->execute();


$url = 'Location: getmessages.php?id='.$id;
header($url);
exit();
?>