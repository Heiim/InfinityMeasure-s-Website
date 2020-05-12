<?php

require('model/connectdb.php');

$sql = "UPDATE topics SET status = ? WHERE idtopic = ?";
// Prepare statement
$stmt = $con->prepare($sql);

$status = "close";

$stmt->bind_param('si',$status,$_GET['id']);

$stmt->execute();
$stmt->close();