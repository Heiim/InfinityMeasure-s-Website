<?php

require('model/connectdb.php');

if ($stmt = $con->prepare('SELECT token FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', htmlspecialchars($_POST['email']));
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($token);
    $stmt->fetch();
    
    //$from    = 'Infinite Measures <user13557950@us-imm-node4c.000webhost.io>';
    $subject = 'Réinitialisation du mot de passe';
    //$headers = 'From: ' . $from . "\r\n" .'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $reset_link = 'https://infinite-measures-quirky.000webhostapp.com/index.php?action=doresetpasswordrequest&token=' . $token . '&email=' . $_POST['email'];
    //$message = '<p>Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: <a href="' . $reset_link . '">' . $reset_link . '</a></p>';
    //mail($_POST['email'], $subject, $message, $headers);
    
    $long_url = $reset_link;
    $apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
    $genericAccessToken = '752c66f1eb381bbf4e2bf596513221424894937a';
    
    $data = array(
        'long_url' => $long_url
    );
    $payload = json_encode($data);
    
    $header = array(
        'Authorization: Bearer ' . $genericAccessToken,
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    );
    
    $ch = curl_init($apiv4);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    $resultToJson = json_decode($result);
    
    if (isset($resultToJson->link)) {
        //echo $resultToJson->link;
        $customlink = $resultToJson->link;
    }
    else {
        $messagedisp = 'error';
    }
    
    $uni=uniqid();
    $filename='public/'.$uni.'temp.html';
    
    $myfile = fopen($filename, "w");
    $themessage = '<html><p>Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: <a href="' . $customlink . '">' . $customlink . '</a></p></html>';
    fwrite($myfile, $themessage);
    fclose($myfile);
    
    require('mail/sendthemail.php');
    
    unlink($filename);
    
    $messagedisp = 'Consultez votre boite mail pour réinitialiser votre mot de passe.';
} else {
    $messagedisp = 'Erreur';
}