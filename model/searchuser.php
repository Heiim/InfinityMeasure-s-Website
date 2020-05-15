<?php

require('model/connectdb.php');

$thesearchwasdone = true;

if(isset($_POST['prenom']) AND !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $prenom_user = $prenom;
}else{
    $prenom_user = "%";
}

if(isset($_POST['nom']) AND !empty($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $nom_user = $nom;
}else{
    $nom_user = "%";
}

if(isset($_POST['taille']) AND !empty($_POST['taille'])) {
    $taille = htmlspecialchars($_POST['taille']);
    $taille_user = $taille ;
}else{
    $taille_user = "%";
}

if(isset($_POST['poids']) AND !empty($_POST['poids'])) {
    $poids = htmlspecialchars($_POST['poids']);
    $poids_user = $poids ;
}else{
    $poids_user = "%";
}

if(isset($_POST['gender']) AND !empty($_POST['gender'])) {
    $gender = htmlspecialchars($_POST['gender']);
    $gender_user = $gender;
}else{
    $gender_user = "%";
}

if ($_SESSION['status']=='manager'){
    $thecompanycode=$_SESSION['company_code'];
} else{
    $thecompanycode = "%";
}

$stmt3 = $con->prepare('SELECT company_code, name FROM companies');
$stmt3->bind_param('i', $idcompany);
$stmt3->execute();
$stmt3->bind_result($slcompany_code, $slcompany_name);
while ($stmt3->fetch()) {
	$companysolver[$slcompany_code]=$slcompany_name;
}
$stmt3->close();



$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, company_code FROM users LEFT JOIN accounts ON users.iduser = accounts.idaccount LEFT JOIN companies ON companies.idcompany = users.idcompany WHERE firstn LIKE ? AND lastn LIKE ? AND gender LIKE ? AND weight LIKE ? AND height LIKE ? AND company_code LIKE ?");
$stmt->bind_param('ssssss',$prenom_user, $nom_user, $gender_user, $poids_user, $taille_user, $thecompanycode);
$stmt->execute();
$stmt->bind_result($idaccount, $firstn, $lastn, $email, $company_code);



 
//$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ?");
//$stmt->bind_param('ss',$prenom_user, $nom_user);
//$stmt->execute();
//$stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

?>



