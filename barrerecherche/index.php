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
    $status_user = "status "."IS NOT NULL";
}else{
    $status_user = "idaccount "."IS NOT NULL";
}

if(isset($_GET['gender']) AND !empty($_GET['gender'])) {
    $gender = htmlspecialchars($_GET['gender']);
    $gender_user = "gender = "."'$gender'";
}else{
    $gender_user = "gender "."IS NOT NULL";
}


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$user = $con->query("SELECT idaccount, firstn, lastn, email, idadmin, idmanager, idcompany FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE $prenom_user AND $nom_user");

?>

<?php while($a = $user->fetch_assoc()) {?>
    
    <?php 
    $nom_company = $a['idcompany'];
    $company = $con-query("SELECT company_code FROM companies WHERE idcompany = $nom_company");
    $company->fetch_assoc();
    ?>
    <div class="barre"><a href="getprofilS.php?id=<?=$a['id']?>">
        <ul class="usercard">
            <li class="usercard_title"><?=$a['firstn']?> <?=$a['lastn']?></li>
            <li class="usercard_data">Email : <?=$a['email']?></li> 
            <li class="usercard_data">status : <?=$a['idadmin']?></li> 
            <li class="usercard_data">compagnie : <?=$company?></li>
        </ul>
    </a></div>
<?php } ?>



