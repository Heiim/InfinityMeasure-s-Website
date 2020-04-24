<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT title, status FROM topics WHERE idtopic=?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($title,$status);
$stmt->fetch();
$stmt->close();

$stmt = $con->prepare('SELECT idpost, idaccount, content, date FROM posts WHERE idtopic=?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($idpost,$idaccount,$content,$date);

$idposts=array();
$idaccounts=array();
$contents=array();
$dates=array();

while ($stmt->fetch()) {
	array_push($idposts,$idpost);
	array_push($idaccounts,$idaccount);
	array_push($contents,$content);
	array_push($dates,$date);
}

$stmt->close();


$idsolver=array();
$imagesolver=array();

$stmt2 = $con->prepare('SELECT idaccount,firstn, lastn, picture FROM accounts');

$stmt2->execute();
$stmt2->bind_result($idaccount,$firstn,$lastn,$picture);
while ($stmt2->fetch()) {
	$name = $firstn .' '. $lastn;
    $idsolver[$idaccount]=$name;
    $imagesolver[$idaccount]=$picture;
}
$stmt2->close();