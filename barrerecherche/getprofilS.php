<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$stmt = $con->prepare('SELECT password, email, firstn, lastn, birthday, gender, size, weight, status, picture FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $firstn, $lastn, $birthday, $gender, $size, $weight, $status, $picture);
$stmt->fetch();
$stmt->close();

//rajouter les tests
/*$stmt = $con->prepare('SELECT idtest, description FROM tests WHERE idtest IS NOT NULL');
$stmt->execute();
$stmt->bind_result($idtest, $description);

$idstest=array();
$descriptions=array();
while ($stmt->fetch()) {
	array_push($idstest,$idtest);
	array_push($descriptions,$description);
}*/

$stmt->close();

include 'infoprofileS.php';
