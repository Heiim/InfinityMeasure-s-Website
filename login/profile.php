<?php


session_start();
// Si l'utilisateur est pas loggué on le redirige vers la page de login
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
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
$stmt = $con->prepare('SELECT password, email, firstn, lastn, birthday,status, picture FROM accounts WHERE id = ?');
// On utilise l'id pour récuperer les infos
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $firstn, $lastn, $birthday,$status, $picture);
$stmt->fetch();
$stmt->close();

include 'infoprofile.php';

?>
