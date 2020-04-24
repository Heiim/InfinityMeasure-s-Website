<?php

require('model/connectdb.php');

$sql = "DELETE FROM posts WHERE idtopic = ?;";
// Prepare statement
$stmt = $con->prepare($sql);

$stmt->bind_param('i',$_GET['id']);

$stmt->execute();
$stmt->close();

$sql = "DELETE FROM topics WHERE idtopic = ?;";
// Prepare statement
$stmt2 = $con->prepare($sql);

$stmt2->bind_param('i',$_GET['id']);

$stmt2->execute();
$stmt2->close();