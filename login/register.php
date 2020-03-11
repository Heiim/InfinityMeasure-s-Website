<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$validation=true;

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// On vérifie que tout est bien récupéré par le serveur
if (!isset($_POST['password'], $_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['birthday'],$_POST['confirmpassword'],$_POST['gender'],$_POST['height'],$_POST['weight'])) {
    $messagedisp ='Erreur: Veuillez remplir tous les champs.';
    $validation=false;
}
// On vérifie que tout est rempli
if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['birthday']) || empty($_POST['gender']) || empty($_POST['height']) || empty($_POST['weight'])) {
    $messagedisp ='Erreur: Veuillez remplir tous les champs.';
    $validation=false;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $messagedisp ='Erreur: Email invalide.';
    $validation=false;
}

if ($_POST['password'] !== $_POST['confirmpassword']) {
    $messagedisp ='Erreur: Les mots de passes ne correspondent pas';
    $validation=false;
 }

if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
    $messagedisp ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
    $validation=false;
}

if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
    $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
    $validation=false;
}

if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
    $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
    $validation=false;
}



//si pas d'erreur
if ($validation){
    // On vérifie si le compte existe pas déjà
    if ($stmt = $con->prepare('SELECT idaccount, password FROM accounts WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
        if ($stmt->num_rows > 0) {
            // Un compte avec ce mail existe déjà
            $messagedisp = 'Un compte avec ce mail existe déjà, veuillez en saisir une autre.';
        } else {
            // Le compte n'exite pas déjà, on le créé
            if ($stmt = $con->prepare('INSERT INTO accounts (password, email, activation_code, firstn, lastn, token) VALUES (?, ?, ?, ?, ?, ?)')) {
                // On hash et verifiy le mot de passe pour pas le stocket en clair dans la DB
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $uniqid = uniqid();
                $token = uniqid();
                
                $stmt->bind_param('ssssss', $password, $_POST['email'], $uniqid, $_POST['firstn'],$_POST['lastn'], $token);
                $stmt->execute();


                $stmt2 = $con->prepare('SELECT idaccount FROM accounts WHERE email = ?');
                $stmt2->bind_param('s', $_POST['email']);
                $stmt2->execute();
                $stmt2->bind_result($id);
                $stmt2->fetch();
                $stmt2->close();

                $stmt3 = $con->prepare('INSERT INTO users (iduser, birthday, gender, height, weight) VALUES (?, ?, ?, ?, ?)');
                $stmt3->bind_param('issss', $id, $_POST['birthday'], $_POST['gender'], $_POST['height'], $_POST['weight']);
                $stmt3->execute();
                $stmt3->close();

                $from    = 'quirkylimited@gmail.com';
                $subject = 'Activation du compte';
                $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $activate_link = 'http://localhost/login/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
                $message = '<p>Veuillez cliquer sur ce lien pour activer votre compte: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
                mail($_POST['email'], $subject, $message, $headers);
                $messagedisp = 'Consultez votre boite mail pour activer votre compte.';
                
                /*
                if(isset($_POST['status']) && $_POST['status']=='gestionnairepending'){
                    $from    = 'quirkylimited@gmail.com';
                    $subject = 'Statut gestionnaire du site Infinte Measures ';
                    $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                    $message = '<p>Bonjour, <br/>
                    Vous êtes un professionel de la santé et vous avez demandez à être gestionnaire de notre site ? 
                    Si cela est le cas, votre compte gestionnaire, sera activé sous les 24h. <br />
                    Cordialement, l"Equipe Infinite Measures <br/>
                    Mail envoyé automatiquement, ne pas répondre, merci<p>';
                    mail($_POST['email'], $subject, $message, $headers);
                }
                */

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
}
require('inforegister.php');
?>
