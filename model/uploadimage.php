<?php

require('model/connectdb.php');

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    
    
    //si l'image est bien uploadé on change la valeur dans la DB
    $sql = "UPDATE accounts SET picture=? WHERE idaccount=?";

    // Prepare statement
    $stmt = $con->prepare($sql);
    $stmt->bind_param('si', $target_file, $_SESSION['id']);

    // execute the query
    $stmt->execute();

} else {
    $uploadError = "&error=Une%20erreur%20est%20survenue.";
}