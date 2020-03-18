<?php


session_start();
// Si l'utilisateur est pas loggué on le redirige vers la page de login
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Les infos sont pas stokées dans la session, on les récupère ici
$stmt = $con->prepare('SELECT password, email, firstn, lastn, picture FROM accounts WHERE idaccount = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $firstn, $lastn, $picture);
$stmt->fetch();
$stmt->close();


// On récupère les ID et noms de tous les tests pour le menu déroulant

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

include 'infoprofile.php';

?>
