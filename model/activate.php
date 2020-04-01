<?php

require('model/connectdb.php');

// On regarde si la combinaison mail/code existe dans la DB
if (isset($_GET['email'], $_GET['code'])) {
	if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?')) {
		$stmt->bind_param('ss', $_GET['email'], $_GET['code']);
		$stmt->execute();
		
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Existe
			if ($stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
				// On change le code 'activation en "activated" ce quie signifie que le compte est activé.
				$newcode = 'activated';
				$stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
				$stmt->execute();
				$message = 'Votre compte est activé, vous pouvez maintenant vous connecter';
			}
		} else {
			$message = 'Le compte est déjà activé ou il n\'existe pas!';
		}
	}
}