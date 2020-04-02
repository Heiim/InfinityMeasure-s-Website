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

if(isset($_GET['status']) AND !empty($_GET['status'])) {
    $status = htmlspecialchars($_GET['status']);
    $status_user = $status;
}else{
    $status_user = "%";
}

if(isset($_GET['gender']) AND !empty($_GET['gender'])) {
    $gender = htmlspecialchars($_GET['gender']);
    $gender_user = $gender;
}else{
    $gender_user = "%";
}


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(isset($_GET['gender']) AND !empty($_GET['gender'])) {
    $stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ? AND gender LIKE ?");
    $stmt->bind_param('sss',$prenom_user, $nom_user, $gender_user);
    $stmt->execute();
    $stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

}

if(isset($_GET['status']) AND !empty($_GET['status'])) {
    if($gender_user == "idadmin"){
        $stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ? AND idadmin != 0");
        $stmt->bind_param('ss',$prenom_user, $nom_user);
        $stmt->execute();
        $stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);
    
    }
    if($gender_user == "idmanager"){
        $stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE idmanager != 0");
        //$stmt->bind_param('ss',$prenom_user, $nom_user);
        $stmt->execute();
        $stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);
    }
    if($gender_user == "iduser"){
        $stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ? AND iduser != 0");
        $stmt->bind_param('ss',$prenom_user, $nom_user);
        $stmt->execute();
        $stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);
    }

}


 
//$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ?");
//$stmt->bind_param('ss',$prenom_user, $nom_user);
//$stmt->execute();
//$stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

?>

<?php while($stmt->fetch()) {?>
    <?php
    if ($idadmin>0){
        $statusresult="Administrateur";
    }elseif($idmanager>0){
        $statusresult="Gestionnaire";
    }else{
        $statusresult="Utilisateur";
    }
    ?>
    
    <div class="barre"><a href="getprofilS.php?id=<?=$idaccount?>">
        <ul class="usercard">
            <li class="usercard_title"><?=$firstn?> <?=$lastn?></li>
            <li class="usercard_data">Email : <?=$email?></li>
            <li class="usercard_data">Status : <?=$statusresult?></li>
        </ul>
    </a></div>
<?php } ?>



