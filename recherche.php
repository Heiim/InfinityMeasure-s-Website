<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$validation=true;

if(isset($_POST['nom'])) {
	$nom_user .= "lastn=".$_POST['nom'];
}else {
	$nom_user .= "lastn "."IS NOT NULL";
}


if(isset($_POST['prenom'])) {
	$prenom_user .= "firstn=".$_POST['prenom'];
}else {
	$prenom_user .= "firstn "."IS NOT NULL";
}



if($_POST['status'] >0) {
	$status_user .= "status=".$_POST['status'];
}else {
	$status_user .= "status "."IS NOT NULL";
}



$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$bdd = mysql_select_db("accounts");
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$user = $bdd->prepare('SELECT id, firstn, lastn, status FROM accounts WHERE ? AND ? AND ? ORDER BY id DESC');
$user->bind_param('sss', $nom_user, $prenom_user, $status_user);
$user->execute();
if($user->rowCount() != 0) {
	$user = $bddprepare('SELECT id, firstn, lastn, status FROM accounts WHERE ? OR ? OR ? ORDER BY id DESC');
	$user->bind_param('sss', $nom_user, $prenom_user, $status_user);
	$user->execute();
}
$con->close();
?>

<form method="GET">
	<input type="search" name="nom" placeholder="Nom" />
	<input type="search" name="prenom" placeholder="Prénom" />
	<select name="status" placeholder="Status">
		<option value="0"></option>
		<option value="User">Utilisateur</option>
		<option value="Gestionnaire">Gestionnaire</option>
		<option value="Admin">Administrateur</option>
	</select>
	<input type="submit" value="Chercher" />
<?php if($user->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $user->fetch()) { ?>
      <li><?= $a ?></li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $_POST['nom']." ".$_POST['prenom']." ".$_POST['status'] ?>...
<?php } ?>
</form>

