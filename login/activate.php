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
				$message = 'Votre compte est activé, vous pouvez maintenant vous connecter<br><a href="index.html">Login</a>';
			}
		} else {
			$message = 'Le compte est déjà activé ou il n\'existe pas!';
		}
	}
}
?>


<html>

<head>
    <link rel="stylesheet" href="../quirky.css">
</head>

<header>
    <div>
        <div class="logo">
            <a href="../home.html"><img src="../images/LogoNoName.png" width=100%x height=100%>
        </div>
        <p class="name">quirky()</p>
    </div>
</header>

<body>
    <div class="clearing messagecontainer">
        <p class="message"><?php echo $message ?></p>
    </div>
</body>

<footer>
    <ul>
        <li class="button"><a href="cgu.html">CGU</a></li>
        <li class="button"><a href="contact.html">Nous contacter</a></li>
        <li class="button"><a href="faq.html">FAQ</a></li>
        <li class="button"><a href="forum.html">Forum</a></li>
    </ul>
</footer>

</html>