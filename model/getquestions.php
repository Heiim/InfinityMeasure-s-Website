<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT idquestion, question, answer FROM questions');
$stmt->execute();
$stmt->bind_result($idq,$question,$answer);

$questions=array();
$answers=array();
$idqs=array();

while ($stmt->fetch()) {
    array_push($idqs,$idq);
	array_push($questions,$question);
    array_push($answers,$answer);
}
