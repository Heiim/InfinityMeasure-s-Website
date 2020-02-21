<?php
session_start();
session_destroy();
// on redirige la vers la page de connexion
header('Location: index.php');
?>