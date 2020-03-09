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
$user = $con->query("SELECT id, firstn, lastn, email, status FROM accounts WHERE $prenom_user  AND $nom_user AND $status_user");
$con->close();
?>
<?php if($user->num_rows > 0) { ?>
    <?php while($a = $user->fetch_assoc()) {?>

        <div class="barre"><a href="getprofilS.php?id=<?=$a['id']?>">
            <ul class="usercard">
                <li class="usercard_title"><?=$a['firstn']?> <?=$a['lastn']?></li>
                <li class="usercard_data">Email : <?=$a['email']?></li> 
                <li class="usercard_data">Status : <?=$a['status']?></li>
                    
            </ul>
        </a></div>
    <?php } ?>
<?php } else { ?>  
    Aucun résultat ...
    
<?php } ?>


