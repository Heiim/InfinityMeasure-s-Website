<?php

require('model/connectdb.php');

$sql = "DELETE FROM posts WHERE idpost = ?;";
// Prepare statement
$stmt = $con->prepare($sql);

$stmt->bind_param('i',$_GET['id']);

$stmt->execute();
$stmt->close();