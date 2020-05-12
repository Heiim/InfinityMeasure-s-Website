<?php

require('model/connectdb.php');

$stmt = $con->prepare('SELECT idcompany, company_code, name FROM companies ORDER BY name ASC');
$stmt->execute();
$stmt->bind_result($idcompany,$company_code,$name);

$idscompany=array();
$company_codes=array();
$names=array();

while ($stmt->fetch()) {
	array_push($idscompany,$idcompany);
    array_push($company_codes,$company_code);
    array_push($names,$name);
}

$stmt->close();