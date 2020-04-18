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
 

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email FROM admins LEFT JOIN accounts ON admins.idadmin = accounts.idaccount WHERE firstn LIKE ? AND lastn LIKE ?");
$stmt->bind_param('ss',$prenom_user, $nom_user);
$stmt->execute();
$stmt->bind_result($idaccount, $firstn, $lastn, $email);




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
        </ul>
    </a></div>
<?php } ?>



