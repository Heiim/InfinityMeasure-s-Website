<?php

require('model/connectdb.php');


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


$url = 'Location: index.php?action=getmessages&id='.$id;
header($url);
exit();