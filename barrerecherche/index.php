<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';


if(isset($_GET['prenom']) AND !empty($_GET['prenom'])) {
    $prenom = htmlspecialchars($_GET['prenom']);
    $prenom_user = "firstn = "."'$prenom'";
}else{
    $prenom_user = "firstn "."IS NOT NULL";

}

if(isset($_GET['nom']) AND !empty($_GET['nom'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $nom_user = "lastn = "."'$nom'";
}else{
    $nom_user = "lastn "."IS NOT NULL";
}

if(isset($_GET['status']) AND !empty($_GET['status'])) {
    $status = htmlspecialchars($_GET['status']);
    $status_user = "status = "."'$status'";
}else{
    $status_user = "status "."IS NOT NULL";
}


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$user = $con->query("SELECT * FROM accounts WHERE $prenom_user AND $nom_user AND $status_user");

?>
<form method="GET">
    <input type="search" name="prenom" placeholder="Prénom" />
    <input type="search" name="nom" placeholder="Nom" />
    <select name="status" placeholder="Status">
		<option value="0"></option>
		<option value="User">Utilisateur</option>
		<option value="Gestionnaire">Gestionnaire</option>
		<option value="Admin">Administrateur</option>
    </select>
    <input type="submit" value="Chercher" />
</form>
<?php if($user->num_rows > 0) { ?>
    <?php while($a = $user->fetch_assoc()) { ?>
        <ul>
            <li><?php print_r($a)?></li>
        </ul>
    <?php } ?>
<?php } else { ?>
    Aucun résultat ...
<?php } ?>
<?php $con->close();
?>