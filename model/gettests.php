<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT idtest, description FROM tests WHERE idtest IS NOT NULL');

$stmt->execute();
$stmt->bind_result($idtest, $description);

$idstest=array();
$descriptions=array();
while ($stmt->fetch()) {
    array_push($idstest,$idtest);
    array_push($descriptions,$description);
}

$stmt->close();