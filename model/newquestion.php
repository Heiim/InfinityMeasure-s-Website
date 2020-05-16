<?php

require('model/connectdb.php');

$sql = "INSERT INTO questions (question, answer) VALUES (?, ?)";
// Prepare statement
$stmt = $con->prepare($sql);

$contentToStore = nl2br(htmlentities($_POST['answer'], ENT_QUOTES, 'UTF-8'));

$stmt->bind_param('ss',$_POST['question'],$contentToStore);

$stmt->execute();
$stmt->close();