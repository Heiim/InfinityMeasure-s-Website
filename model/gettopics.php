<?php

require('model/connectdb.php');
 
$stmt = $con->prepare('SELECT idtopic, title, date, status FROM topics ORDER BY date DESC');

$stmt->execute();
$stmt->bind_result($idtopic, $title, $date, $statu);

$idtopics=array();
$titles=array();
$dates=array();
$status=array();

while ($stmt->fetch()) {
    array_push($idtopics,$idtopic);
    array_push($titles,$title);
    array_push($dates,$date);
    array_push($status,$statu);
}

$stmt->close();