<?php

//info de connexion
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id13557950_db_admin_qr4896';
$DATABASE_PASS = 'uMD7g4*FiVPnJs^oVFGw1';
$DATABASE_NAME = 'id13557950_quirky';

//connexion a la DB
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // si erreur
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}