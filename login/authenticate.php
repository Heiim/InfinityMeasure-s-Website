<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';
// Connexion à la DB
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// Si erreur
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// On vérifie si toutes les infos nécessaire à la connexion sont saisis
if ( !isset($_POST['email'], $_POST['password']) ) {
	die ('Veuillez remplir tous les chmaps');
}

// on prépare le SQL pour éviter les injections SQL
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// On vérifie si le compte est dans la DB
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Le compte existe on vérifie le mot de passe
        if (password_verify($_POST['password'], $password)) {
            // Tout est okay on créé la sessions
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST["email"];;
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            echo 'Mot de passe incorrect';
        }
    } else {
        echo 'Ce compte n\'existe pas';
    }

	$stmt->close();
}
?>