<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// On vérifie que tout est bien récupéré par le serveur
if (!isset($_POST['password'], $_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['birthday'])) {
	die ('Veuillez remplir tous les champs.');
}
// On vérifie que tout est rempli
if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['birthday'])) {
	die ('Veuillez remplir tous les champs.');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email invalide.');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 8) {
	die ('Le mot de passe doit fair entre 8 et 20 caractères.');
}

if (strlen($_POST['lastn']) > 20 || strlen($_POST['lastn']) < 1) {
	die ('Le nom doit fair entre 1 et 20 caractères.');
}

if (strlen($_POST['firstn']) > 20 || strlen($_POST['firstn']) < 1) {
	die ('Le prénom doit fair entre 1 et 20 caractères.');
}

// On vérifie si le compte existe pas déjà
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	// On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
	if ($stmt->num_rows > 0) {
		// Un compte avec ce mail existe déjà
		$messagedisp = 'Un compte avec ce mail existe déjà, veuillez en saisir une autre.';
	} else {
        // Le compte n'exite pas déjà, on le créé
        if ($stmt = $con->prepare('INSERT INTO accounts (password, email, activation_code, firstn, lastn, birthday) VALUES (?, ?, ?, ?, ?, ?)')) {
            // On hash et verifiy le mot de passe pour pas le stocket en clair dans la DB
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
            $stmt->bind_param('ssssss', $password, $_POST['email'], $uniqid, $_POST['firstn'],$_POST['lastn'],$_POST['birthday']);
            $stmt->execute();
            
            $from    = 'quiaquelrolecettesemaine@gmail.com';
            $subject = 'Activation du compte';
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $activate_link = 'http://localhost/login/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
            $message = '<p>Veuillez cliquer sur ce lien pour activer votre compte: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            mail($_POST['email'], $subject, $message, $headers);
            $messagedisp = 'Consultez votre boite mail pour activer votre compte.';

        } else {
            // Problème avec le SQl, il faut verifier si la table existe
            $messagedisp = 'Erreur';
        }
	}
	$stmt->close();
} else {
	// Problème avec le SQl, il faut verifier si la table existe
	$messagedisp = 'Erreur';
}
$con->close();
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
        <p class="message"><?php echo $messagedisp ?></p>
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