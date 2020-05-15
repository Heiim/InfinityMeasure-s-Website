<?php

require('model/connectdb.php');

$stmt = $con->prepare('DELETE FROM messages WHERE idsender = ? OR idreceiver = ?');
$stmt->bind_param('ii', $_GET['id'],$_GET['id']);
$stmt->execute();
$stmt->close();


$stmt = $con->prepare('DELETE FROM posts WHERE idaccount = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->close();

$stmt = $con->prepare('DELETE FROM results WHERE iduser = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->close();

$stmt = $con->prepare('DELETE FROM users WHERE iduser = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->close();

$stmt = $con->prepare('DELETE FROM accounts WHERE idaccount = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->close();

$messagedisp = "L'utilisateur a été banni";
$profilebutton = true;