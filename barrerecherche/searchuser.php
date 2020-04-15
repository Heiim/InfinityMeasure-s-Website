<?php


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';



if(isset($_GET['prenom']) AND !empty($_GET['prenom'])) {
    $prenom = htmlspecialchars($_GET['prenom']);
    $prenom_user = $prenom;
}else{
    $prenom_user = "%";
}

if(isset($_GET['nom']) AND !empty($_GET['nom'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $nom_user = $nom;
}else{
    $nom_user = "%";
}

if(isset($_GET['taille']) AND !empty($_GET['taille'])) {
    $taille = htmlspecialchars($_GET['taille']);
    $taille_user = $taille ;
}else{
    $taille_user = "%";
}

if(isset($_GET['poids']) AND !empty($_GET['poids'])) {
    $poids = htmlspecialchars($_GET['poids']);
    $poids_user = $poids ;
}else{
    $poids_user = "%";
}

if(isset($_GET['gender']) AND !empty($_GET['gender'])) {
    $gender = htmlspecialchars($_GET['gender']);
    $gender_user = $gender;
}else{
    $gender_user = "%";
}


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, company_code FROM users LEFT JOIN accounts ON users.iduser = accounts.idaccount LEFT JOIN companies ON companies.idcompany = users.idcompany WHERE firstn LIKE ? AND lastn LIKE ? AND gender LIKE ? AND weight LIKE ? AND height LIKE ?");
$stmt->bind_param('sssss',$prenom_user, $nom_user, $gender_user, $poids_user, $taille_user);
$stmt->execute();
$stmt->bind_result($idaccount, $firstn, $lastn, $email, $company_code);



 
//$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ?");
//$stmt->bind_param('ss',$prenom_user, $nom_user);
//$stmt->execute();
//$stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

?>

<?php while($stmt->fetch()) {?>
    
    <div class="barre"><a href="getprofilS.php?id=<?=$idaccount?>">
        <ul class="usercard">
            <li class="usercard_title"><?=$firstn?> <?=$lastn?></li>
            <li class="usercard_data">Email : <?=$email?></li>
            <li class="usercard_data">Compagnie : <?=$company_code?></li>
        </ul>
    </a></div>
<?php } ?>



