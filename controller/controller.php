<?php

function logincheck()
{
	if (isset($_SESSION['loggedin'])) {
        if($_SESSION['status'] == "admin"){
            header('Location: index.php?action=adminprofile');
            exit();
        } else if ($_SESSION['status'] == "user") {
            header('Location: index.php?action=userprofile');
            exit();
        } else if ($_SESSION['status'] == "manager") {
            header('Location: index.php?action=managerprofile');
            exit();
        }
    }
}


function homePage()
{
    session_start();
    require('view/viewhome.php');
}

function login()
{
    session_start();
    require('view/viewlogin.php');
}

function loginError()
{
    session_start();
    require('view/viewlogin.php');
}

function authenticate()
{
    checkEmailField();
    require('model/sessionlogin.php');

    if (isset($error)){
        header('Location: index.php?action=loginerror&error='.$error);
    } else{
        if($_SESSION['status']=='admin'){
            header('Location: index.php?action=adminprofile');
        }
        else if ($_SESSION['status']=='user'){
            header('Location: index.php?action=userprofile');
        }
        else if ($_SESSION['status']=='manager'){
            header('Location: index.php?action=managerprofile');
        }
    }

}

function checkEmailField() {
    // On vérifie si toutes les infos nécessaire à la connexion sont saisis
    if ( !isset($_POST['email'], $_POST['password']) ) {
        die ('Veuillez remplir tous les chmaps');
    }
}

function adminProfile()
{
    require('model/sessionlogin.php');
    require('model/getaccountinfo.php');
    require('model/gettests.php');
    require('view/admin/viewadminprofile.php');
    exit;
}

function userProfile()
{
    require('model/sessionlogin.php');
    require('model/getaccountinfo.php');
    require('model/getusersession.php');
    require('model/gettests.php');
    require('view/viewuserprofile.php');
    exit;
}

function managerProfile()
{
    require('model/sessionlogin.php');
    require('model/getaccountinfo.php');
    require('model/getmanagersession.php');
    require('view/manager/viewmanagerprofile.php');
    exit;
}

function logout()
{
    session_start();
    session_destroy();
    // on redirige la vers la page de connexion
    header('Location: index.php?action=login');
}

function showRegister()
{
    session_start();
    require('view/viewregister.php');
}

function register()
{

    $validation=true;
    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['password'], $_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['birthday'],$_POST['confirmpassword'],$_POST['gender'],$_POST['height'],$_POST['weight'],$_POST['company_code'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['birthday']) || empty($_POST['gender']) || empty($_POST['height']) || empty($_POST['weight']) || empty($_POST['company_code'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }

    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $messagedisp ='Erreur: Les mots de passes ne correspondent pas';
        $validation=false;
    }

    if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
        $messagedisp ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if ($validation){
        require('model/register.php');
    }
    require('view/viewregisterinfo.php');
}

function activate(){
    require('model/activate.php');
    session_start();
    require('view/viewactivateinfo.php');
}

function updateProfilePic()
{
    session_start();

    $uploadError='';

    //pour rendre le nom de l'image pas evident a trouver: pas juste user.jpg ou id.jpg on va hasher le prenom + nom + id de l'utilisateur
    $imageid = hash('sha256', $_SESSION['name'].$_SESSION['id'].time());

    $target_dir = "public/images/userspics/";
    $target_name = $imageid . '.' . pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
    $target_file = $target_dir . $target_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
    // On vérifie que c'est bien une image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $uploadError = "&error=Le%20fichier%20n'est%20pas%20une%20image.";
            $uploadOk = 0;
        }
    }

    // On vérifie la taille de l'image
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        $uploadError = "&error=Fichier%20trop%20volumineux.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadError = "&error=Seules%20les%20JPG,%20JPEG,%20PNG%20et%20GIF%20sont%20authorisées.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Le fichier n'a pas été importé";
    // if everything is ok, try to upload file
    } else {
        require('model/uploadimage.php');
    }
    

    if($_SESSION['status'] == "admin"){
        header('Location: index.php?action=adminprofile'.$uploadError);
        exit();
    } else if ($_SESSION['status'] == "user") {
        header('Location: index.php?action=userprofile'.$uploadError);
        exit();
    } else if ($_SESSION['status'] == "manager") {
        header('Location: index.php?action=managerprofile'.$uploadError);
        exit();
    }
    exit();
}

function getResults() {
    session_start();
    require('model/getResults.php');
    require('view/viewtestresults.php');
}

function editProfile()
{
    session_start();
    require('model/getaccountinfo.php');
    require('model/getusersession.php');
    require('view/viewprofileedit.php');
}

function doEditProfile()
{
    $validation=true;

    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['id'],$_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['birthday'],$_POST['height'],$_POST['weight'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if ( empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['birthday']) || empty($_POST['height']) || empty($_POST['weight'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }


    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    //si pas d'erreur
    if ($validation){
        require('model/editprofile.php');
    } else {
        require('view/viewinfoedit.php');
    }
    
}

function editAdminProfile()
{
    session_start();
    require('model/getaccountinfo.php');
    require('view/admin/viewprofileedit.php');
}

function doEditAdminProfile()
{
    $validation=true;

    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['id'],$_POST['email'],$_POST['firstn'],$_POST['lastn'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if ( empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }


    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if ($validation){
        require('model/editadminprofile.php');
    } else {
        require('view/viewinfoedit.php');
    }
}

function editManagerProfile()
{
    session_start();
    require('model/getaccountinfo.php');
    require('view/manager/viewprofileedit.php');
}

function doEditManagerProfile()
{
    $validation=true;

    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['id'],$_POST['email'],$_POST['firstn'],$_POST['lastn'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if ( empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }


    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if ($validation){
        require('model/editmanagerprofile.php');
    } else {
        require('view/viewinfoedit.php');
    }
}

function resetpassword()
{
    session_start();
    require('view/viewresetpasswordrequest.php');
}

function resetpasswordrequest()
{
    require('model/resetpasswordrequest.php');
    session_start();
    require('view/viewregisterinfo.php');
}

function doresetpasswordrequest()
{
    session_start();
    require('view/viewresetpasswordform.php');
}

function doresetpassword()
{
    $validation=true;
    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $message ='Erreur: Les mots de passes ne correspondent pas';
        $validation=false;
     }
    
    if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
        $message ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
        $validation=false;
    }
    if ($validation){
        require('model/resetpassword.php');
    }
    require('view/viewresetpasswordinfo.php');
}

function editTest()
{
    session_start();
    require('model/gettestfromid.php');
    require('view/admin/viewedittest.php');
}

function doEditTest()
{
    $validation=true;
    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['name'],$_POST['min'],$_POST['max'],$_POST['unit'],$_POST['description'],$_POST['idsensor'],$_POST['idtest'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if ( empty($_POST['name']) || empty($_POST['max']) || empty($_POST['unit']) || empty($_POST['description']) || empty($_POST['idsensor']) || empty($_POST['idtest'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (strlen($_POST['name']) > 30 || strlen($_POST['name']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['description']) > 150 || strlen($_POST['description']) < 1) {
        $messagedisp ='Erreur: La description doit faire entre 1 et 250 caractères.';
        $validation=false;
    }

    //si pas d'erreur
    if ($validation){
        require('model/submittestedit.php');
    }
    require('view/viewinfoedit.php');
}

function newTest()
{
    require('model/getsensors.php');
    session_start();
    require('view/admin/viewnewtest.php');
}

function doNewTest()
{
    $validation=true;
    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['name'],$_POST['min'],$_POST['max'],$_POST['unit'],$_POST['description'],$_POST['idsensor'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if ( empty($_POST['name']) || empty($_POST['max']) || empty($_POST['unit']) || empty($_POST['description']) || empty($_POST['idsensor'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (strlen($_POST['name']) > 30 || strlen($_POST['name']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['description']) > 150 || strlen($_POST['description']) < 1) {
        $messagedisp ='Erreur: La description doit faire entre 1 et 250 caractères.';
        $validation=false;
    }

    if (floatval($_POST['min']) > floatval($_POST['max'])) {
        $messagedisp ='Erreur: Le maximum doit être supérieur au minimum';
        $validation=false;
    }

    //si pas d'erreur
    if ($validation){
        require('model/newtest.php');
    }
    require('view/viewinfoedit.php');
}

function deleteTest(){

    session_start();

    if ($_SESSION['status'] != "admin") {
        header('Location: index.php?action=userprofile');
        exit();
    } else {
        require('model/deletetest.php');
        header('Location: index.php?action=adminprofile');
    }
   
}

function chat()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }
    require('model/getdiscussions.php');
    require('view/viewchat.php');
}

function getMessages()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }
    require('model/getmessages.php');
    require('view/viewmessages.php');
}

function sendMessage()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }

    require('model/sendmessage.php');
}

function showsearchuser()
{ 
    session_start();
    
    if ($_SESSION['status']=='user'){
        header('Location: index.php');
    }
    else {
        require('view/viewsearchuser.php');
    }
}

function showsearchmanager()
{ 
    session_start();

    if ($_SESSION['status']=='user'){
        header('Location: index.php');
    }
    else {
        require('view/viewsearchmanager.php');
    }
}

function showsearchadmin()
{
    session_start();

    if ($_SESSION['status']=='admin'){
        require('view/viewsearchadmin.php');
    }
    else {
        header('Location: index.php');
    }

    
}

function searchuser()
{
    session_start();

    if ($_SESSION['status']=='user'){
        header('Location: index.php');
    }
    else {
        require('model/searchuser.php');
        require('view/viewsearchuser.php');
    }
    
}

function searchmanager()
{
    session_start();

    if ($_SESSION['status']=='user'){
        header('Location: index.php');
    }
    else {
        require('model/searchmanager.php');
        require('view/viewsearchmanager.php');
    }

}

function searchadmin()
{   
    session_start();

    if ($_SESSION['status']=='admin'){
        require('model/searchadmin.php');
        require('view/viewsearchadmin.php');
    }
    else {
        header('Location: index.php');
    }
    
}

function cgu()
{
    session_start();
    require('view/viewcgu.php');
}

function contactus()
{
    session_start();
    require('view/viewcontactus.php');
}
function postcontact()
{
    require('model/postcontact.php');
}

function contactussend()
{
    session_start();
    require('view/viewcontactussend.php');
}

function faq()
{   
    session_start();

    require('model/getquestions.php');
    require('view/viewfaq.php');
}
function forum()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }

    require('model/gettopics.php');
    require('view/viewforum.php');
}

function viewTopic()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }

    require('model/gettopic.php');
    require('view/viewtopic.php');
}

function newTopic()
{

    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $validation=true;

    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['title'],$_POST['content'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if ( empty($_POST['title']) || empty($_POST['content'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }


    if (strlen($_POST['title']) > 45 || strlen($_POST['title']) < 1) {
        $messagedisp ='Erreur: Le titre doit faire entre 1 et 45 caractères.';
        $validation=false;
    }

    if (strlen($_POST['content']) > 900 || strlen($_POST['content']) < 1) {
        $messagedisp ='Erreur: Le post doit faire entre 1 et 900 caractères.';
        $validation=false;
    }

    //si pas d'erreur
    if ($validation){
        require('model/newtopic.php');
        header('Location: index.php?action=viewtopic&id='.$idtopic);
        exit();
    } else {
        header('Location: index.php?action=forum&error='.$messagedisp);
        exit();
    }
}

function newPost()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $validation=true;

    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['content'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if ( empty($_POST['content'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (strlen($_POST['content']) > 900|| strlen($_POST['content']) < 1) {
        $messagedisp ='Erreur: Le post doit faire entre 1 et 900 caractères.';
        $validation=false;
    }

    //si pas d'erreur
    if ($validation){
        require('model/newpost.php');
        header('Location: index.php?action=viewtopic&id='.$_POST['idtopic']);
        exit();
    } else {
        header('Location: index.php?action=viewtopic&id='.$_POST['idtopic'].'&error='.$messagedisp);
        exit();
    }
}

function closeTopic()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/closetopic.php');
        header('Location: index.php?action=forum');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}


function deleteTopic()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/deletetopic.php');
        header('Location: index.php?action=forum');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function deletePost()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/deletepost.php');
        header('Location: index.php?action=viewtopic&id='.$_GET['idtopic']);
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function adminInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('view/admin/viewinviteadmin.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function sendAdminInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/sendadmininvite.php');
        require('view/viewregisterinfo.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function adminRegister()
{
    session_start();
    require('view/admin/viewadminregister.php');
}

function doAdminRegister()
{
    $validation=true;
    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['password'], $_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['confirmpassword'],$_POST['token'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['token'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }

    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $messagedisp ='Erreur: Les mots de passes ne correspondent pas';
        $validation=false;
    }

    if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
        $messagedisp ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if ($validation){
        require('model/registeradmin.php');
    }
    require('view/viewregisterinfo.php');
}

function manageCompanyCodes()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/getcompanycodes.php');
        require('view/admin/viewcompanycodes.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function newCompanyCode()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        $validation=true;
        // On vérifie que tout est bien récupéré par le serveur
        if (!isset($_POST['name'])) {
            $messagewrong ='Erreur: Veuillez remplir tous les champs.';
            $validation=false;
        }
        // On vérifie que tout est rempli
        if (empty($_POST['name'])) {
            $messagewrong ='Erreur: Veuillez remplir tous les champs.';
            $validation=false;
        }

        if (strlen($_POST['name']) > 35 || strlen($_POST['name']) < 1) {
            $messagewrong ='Erreur: Le nom doit faire entre 1 et 35 caractères.';
            $validation=false;
        }

        if ($validation) {
            require('model/newcompanycode.php');
        }
        
        require('model/getcompanycodes.php');
        require('view/admin/viewcompanycodes.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function managerInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/getcompanycodes.php');
        require('view/admin/viewinvitemanager.php');
        exit();
    } else if ($_SESSION['status']=="manager") {
        require('model/getmanagersession.php');
        require('view/manager/viewinvitemanager.php');
        exit();    
    } else {
        header('Location: index.php');
        exit();
    }
}

function sendManagerInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin" or $_SESSION['status']=="manager") {
        require('model/sendmanagerinvite.php');
        require('view/viewregisterinfo.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function managerRegister()
{
    session_start();
    require('view/manager/viewmanagerregister.php');
}

function doManagerRegister()
{
    $validation=true;
    // On vérifie que tout est bien récupéré par le serveur
    if (!isset($_POST['password'], $_POST['email'],$_POST['firstn'],$_POST['lastn'],$_POST['confirmpassword'],$_POST['token'], $_POST['company_code'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }
    // On vérifie que tout est rempli
    if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstn']) || empty($_POST['lastn']) || empty($_POST['token']) || empty($_POST['company_code'])) {
        $messagedisp ='Erreur: Veuillez remplir tous les champs.';
        $validation=false;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messagedisp ='Erreur: Email invalide.';
        $validation=false;
    }

    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $messagedisp ='Erreur: Les mots de passes ne correspondent pas';
        $validation=false;
    }

    if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 8) {
        $messagedisp ='Erreur: Le mot de passe doit faire entre 8 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['lastn']) > 30 || strlen($_POST['lastn']) < 1) {
        $messagedisp ='Erreur: Le nom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if (strlen($_POST['firstn']) > 30 || strlen($_POST['firstn']) < 1) {
        $messagedisp ='Erreur: Le prénom doit faire entre 1 et 30 caractères.';
        $validation=false;
    }

    if ($validation){
        require('model/registermanager.php');
    }
    require('view/viewregisterinfo.php');
}

function userInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="manager") {
        require('model/getmanagersession.php');
        require('view/manager/viewinviteuser.php');
        exit();    
    } else {
        header('Location: index.php');
        exit();
    }   
}

function sendUserInvite()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="manager") {
        require('model/senduserinvite.php');
        require('view/viewregisterinfo.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function stats()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="manager") {
        require('model/getmanagersession.php');
        require('model/getstats.php');
        require('view/manager/viewstats.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function banUser()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/banuser.php');
        require('view/viewregisterinfo.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }

}

function deleteQuestion()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/deletequestion.php');
        header('Location: index.php?action=faq');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function newQuestion()
{
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php?action=login');
        exit();
    } else if ($_SESSION['status']=="admin") {
        require('model/newquestion.php');
        header('Location: index.php?action=faq');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

function switchLanguage()
{

    session_start();

    if ($_GET['lang']=="en"){
        $_SESSION['lang']="en";
    } else {
        $_SESSION['lang']="fr";
    }

    header('Location: index.php');
    
}