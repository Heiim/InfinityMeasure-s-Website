<?php

require('model/connectdb.php');

$thesearchwasdone = true;

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

if(isset($_GET['entreprise']) AND !empty($_GET['entreprise'])) {
    $compagnie = htmlspecialchars($_GET['entreprise']);
    $compagnie_user = $compagnie;

    $stmt2 = $con->prepare('SELECT company_code FROM companies WHERE name LIKE ?');
    $stmt2->bind_param('s', $compagnie_user);
    $stmt2->execute();
    $stmt2->bind_result($user_company_code);
    $stmt3->close();

}else {
    $user_company_code = "%";
}

$stmt3 = $con->prepare('SELECT company_code, name FROM companies');
$stmt3->execute();
$stmt3->bind_result($slcompany_code, $slcompany_name);
while ($stmt3->fetch()) {
	$companysolver[$slcompany_code]=$slcompany_name;
}
$stmt3->close();


$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, company_code FROM managers LEFT JOIN accounts ON managers.idmanager = accounts.idaccount LEFT JOIN companies ON companies.idcompany = managers.idcompany WHERE firstn LIKE ? AND lastn LIKE ? AND company_code LIKE ?");
$stmt->bind_param('sss',$prenom_user, $nom_user, $user_company_code);
$stmt->execute();
$stmt->bind_result($idaccount, $firstn, $lastn, $email, $company_code);




//$stmt = $con->prepare("SELECT idaccount, firstn, lastn, email, idadmin, idmanager FROM accounts LEFT JOIN users ON accounts.idaccount = users.iduser LEFT JOIN managers ON accounts.idaccount = managers.idmanager LEFT JOIN admins ON accounts.idaccount = admins.idadmin WHERE firstn LIKE ? AND lastn LIKE ?");
//$stmt->bind_param('ss',$prenom_user, $nom_user);
//$stmt->execute();
//$stmt->bind_result($idaccount, $firstn, $lastn, $email, $idadmin, $idmanager);

?>



