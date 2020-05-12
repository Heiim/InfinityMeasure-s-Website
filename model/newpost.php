<?php

require('model/connectdb.php');

$sql = "INSERT INTO posts (idtopic, idaccount, content) VALUES (?, ?, ?)";
// Prepare statement
$stmt = $con->prepare($sql);

$contentToStore = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));

$stmt->bind_param('iis',$_POST['idtopic'],$_SESSION['id'],$contentToStore);

$stmt->execute();
$stmt->close();


$sql = "UPDATE topics SET date = ? WHERE idtopic = ?";
// Prepare statement
$stmt2 = $con->prepare($sql);

$timestamp = date('Y-m-d H:i:s');

$stmt2->bind_param('si',$timestamp,$_POST['idtopic']);

$stmt2->execute();
$stmt2->close();
