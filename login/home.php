<?php
// On lance la sessions
session_start();
// Si l'utilisateur est pas connecter on redirige vers la page de login
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
?>