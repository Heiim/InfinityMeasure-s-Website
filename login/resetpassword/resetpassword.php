<?php

//info de connexion
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

//connexion a la DB
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// si erreur
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['email'], $_POST['token'], $_POST['password'])) {
	if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND token = ?')) {
		$stmt->bind_param('ss', $_POST['email'], $_POST['token']);
		$stmt->execute();
		
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Existe
			if ($stmt = $con->prepare('UPDATE accounts SET token = ?, password= ? WHERE email = ?')) {
                // On change le code 'activation en "activated" ce quie signifie que le compte est activé.
                $token = uniqid();
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$stmt->bind_param('sss', $token, $password, $_POST['email']);
				$stmt->execute();
				$message = 'Mot de passe changé';
			}
		} else {
			$message = 'Echec';
		}
	}
}

require('confirmreset.php');

?>