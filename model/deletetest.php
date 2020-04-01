<?php

require('model/connectdb.php');


$stmt = $con->prepare('DELETE FROM tests WHERE idtest = ?');
$stmt->bind_param('i', intval($_GET['id']));
$stmt->execute();
$stmt->close();