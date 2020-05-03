<?php

require('model/connectdb.php');

$stmt2 = $con->prepare('SELECT iduser FROM users WHERE idcompany = ?');
// On utilise l'id pour récuperer les infos
$stmt2->bind_param('i', $idcompany);
$stmt2->execute();
$stmt2->bind_result($iduser);


$idsuser=array();

while ($stmt2->fetch()) {
    array_push($idsuser,$iduser);
}

$stmt2->close();

$stmt = $con->prepare('SELECT idtest, description, unit FROM tests WHERE idtest IS NOT NULL');

$stmt->execute();
$stmt->bind_result($idtest, $description, $unit);

$idstest=array();
$descriptions=array();
$units=array();

while ($stmt->fetch()) {
    array_push($idstest,$idtest);
    array_push($descriptions,$description);
    array_push($units,$unit);
}

$stmt->close();



$meanstodisp=array();

for ($i = 0; $i < count($idstest); $i++) {

    $results=array();

    for ($j = 0; $j < count($idsuser); $j++) {
        $stmt = $con->prepare('SELECT result FROM results WHERE iduser = ? AND idtest = ?');
        $stmt->bind_param('ii', $idsuser[$j], $idstest[$i]);
        $stmt->execute();
        $stmt->bind_result($result);

        while ($stmt->fetch()) {
            array_push($results,$result);
        }
        $stmt->close();
    }

    if (empty($results)){
        $meantodisp="Aucun résultat";
    } else {
        $resultssum=array_sum($results);
        $mean=$resultssum/count($results);

        $trimedmean = round($mean, 2);

        $meantodisp="Score moyen : ".$trimedmean.' '.$units[$i];
    }

    array_push($meanstodisp,$meantodisp);

}