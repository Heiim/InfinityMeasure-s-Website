<?php


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$idadmin1 = 'idadmin';
$idmanager1 = 'idmanager';
$iduser1 = 'iduser';

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

if(isset($_GET['compagnie']) AND !empty($_GET['compagnie'])) {
    $compagnie = htmlspecialchars($_GET['compagnie']);
    $compagnie_user = $compagnie;
}else {
    $compagnie_user = "%";
}

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, company_code FROM managers LEFT JOIN accounts ON managers.idmanager = accounts.idaccount LEFT JOIN companies ON companies.idcompany = managers.idcompany WHERE firstn LIKE ? AND lastn LIKE ? AND company_code LIKE ?");
$stmt->bind_param('sss',$prenom_user, $nom_user, $compagnie_user);
$stmt->execute();
$stmt->bind_result($idaccount, $firstn, $lastn, $email, $company_code);




//$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ?");
//$stmt->bind_param('ss',$prenom_user, $nom_user);
//$stmt->execute();
//$stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

?>

<?php while($stmt->fetch()) {?>
    
    
    <div class="barre"><a href="">
        <ul class="usercard">
            <li class="usercard_title"><?=$firstn?> <?=$lastn?></li>
            <li class="usercard_data">Email : <?=$email?></li>
            <li class="usercard_data">Compagnie : <?=$company_code?></li>
        </ul>
    </a></div>
<?php } ?>



