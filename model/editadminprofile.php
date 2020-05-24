<?php

require('model/connectdb.php');

if ($stmt = $con->prepare('SELECT email FROM accounts WHERE idaccount = ?')) {
        
    $stmt->bind_param('i', $_POST['id']);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    if($email==$_POST['email']) {
        $sql = "UPDATE accounts SET email=?, firstn=?, lastn=? WHERE idaccount=?";

        // Prepare statement
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssi', $_POST['email'],$_POST['firstn'],$_POST['lastn'], $_POST['id']);
        $stmt->execute();
        $stmt->close();

        header('Location: index.php?action=adminprofile');
        exit;
    } else {
        //TODO: check if email is change we must check if an athoer account in the DB has it and if not update it with email confirmation
        $stmt = $con->prepare('SELECT idaccount, password FROM accounts WHERE email = ?');
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        // On enregistre le résultat pour vérifier si le compte existe pas déjà dans la DB
        if ($stmt->num_rows > 0) {
            // Un compte avec ce mail existe déjà
            $messagedisp = 'Un compte avec ce mail existe déjà, veuillez en saisir une autre.';
            $emailchanged=false;
        }else {
            $sql = "UPDATE accounts SET email=?, activation_code=?, firstn=?, lastn=? WHERE idaccount=?";

            // Prepare statement
            $stmt = $con->prepare($sql);
            $uniqid = uniqid();
            $stmt->bind_param('ssssi', $_POST['email'], $uniqid, $_POST['firstn'], $_POST['lastn'], $_POST['id']);
            $stmt->execute();
            $stmt->close();

            $emailchanged=true;

            //$from    = 'Infinite Measures <user13557950@us-imm-node4c.000webhost.io>';
            $subject = 'Changement d\'addresse mail';
            //$headers = 'From: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $activate_link = 'https://infinite-measures-g7e.000webhostapp.com/index.php?action=activate&email=' . $_POST['email'] . '&code=' . $uniqid;
            
            //$message = '<p>Veuillez cliquer sur ce lien pour confirmer le changement d\'email: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            //mail($_POST['email'], $subject, $message, $headers);
            
            
            $long_url = $activate_link;
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
            $themessage = '<html><p>Veuillez cliquer sur ce lien pour confirmer le changement d\'email: <a href="' . $customlink . '">' . $customlink . '</a></p></html>';
            fwrite($myfile, $themessage);
            fclose($myfile);
            
            require('mail/sendthemail.php');
            
            unlink($filename);
            
            $messagedisp = 'Consultez votre boite mail pour confirmer le changement d\'email.';

        }
    }
}

require('view/viewinfoedit.php');
exit;