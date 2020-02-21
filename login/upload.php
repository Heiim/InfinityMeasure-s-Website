<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quirky';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//pour rendre le nom de l'image pas evident a trouver: pas juste user.jpg ou id.jpg on va hasher le prenom + nom + id de l'utilisateur
$imageid = hash('sha256', $_SESSION['name'].$_SESSION['id']);

$target_dir = "../images/userspics/";
$target_name = $imageid . '.' . pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
$target_file = $target_dir . $target_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        
        //si l'image est bien uploadé on change la valeur dans la DB
        $sql = "UPDATE accounts SET picture=? WHERE id=?";

        // Prepare statement
        $stmt = $con->prepare($sql);
        $stmt->bind_param('si', $target_file, $_SESSION['id']);

        // execute the query
        $stmt->execute();
        header('Location: profile.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>