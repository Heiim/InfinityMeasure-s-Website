<?php

require('model/connectdb.php');


$stmt = $con->prepare('DELETE FROM questions WHERE idquestion = ?');
$stmt->bind_param('i', intval($_GET['id']));
$stmt->execute();
$stmt->close();