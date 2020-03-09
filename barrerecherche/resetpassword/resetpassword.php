<?php

//info de connexion
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$validation=true;

//connexion a la DB
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// si erreur
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($_POST['password'] !== $_POST['confirmpassword']) {
    $message ='Erreur: Les mots de passes ne correspondent pas';
    $validation=false;
 }

if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
    $message ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
    $validation=false;
}
if ($validation){
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
				$message = 'Echec jeton ou email invalide';
			}
		}
	}else{
		$validation=false;
	}
}

require('confirmreset.php');

?>