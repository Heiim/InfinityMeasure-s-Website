<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="public/style/messages.css">
        <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
        <script src="public/scripts/scroll.js"></script>
    </head>
<header>
<div>
    <div class="logo">
        <a href="index.php"><img src="public/images/infinitelogo.png" width=100%x height=100%>
    </div>
    <p class="name">Infinite Measures</p>
    </a>
</div>
<div class="connection">
    <ul>
        <li class="button"><a class="whitelink" href='<?php
            if($_SESSION['status']=="user"){
                echo 'index.php?action=userprofile';
            }else if ($_SESSION['status']=="admin"){
                echo 'index.php?action=adminprofile';
            }
        ?>'>Mon compte</a></li>
        <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
    </ul>
</div>
</header>

<body onload="scrollDown()">
    <div class="chatcontainer">
        <h1 class="pageinfoh1"> 
            <a class="whitelink goodsize" href="index.php?action=chat">Retour</a> 
            Conversation avec 
            <?php 
                if ($idsenders[0]==$_SESSION['id']) {
                    echo $idsolver[$idreceivers[0]];
                } else {
                    echo $idsolver[$idsenders[0]];
                }
                
            ?>
            <button class="refresh" onClick="window.location.reload();"><img class="refreshimage" src="public/images/refresh.png" width=20px height=20px></button>
        </h1>
        <div class="chat" id="chat">
            <?php 
            for ($i = 0; $i < count($times); $i++) {
                if ($idsenders[$i]==$_SESSION['id']) {
                    echo nl2br('<div class="timeright">');
                } else {
                    echo nl2br('<div class="timeleft">');
                }
                echo nl2br($times[$i]."\n");
                echo '</div>';


                if ($idsenders[$i]==$_SESSION['id']) {
                    echo nl2br('<div class="textmessageright">');
                } else {
                    echo nl2br('<div class="textmessageleft">');
                }

                echo nl2br($contents[$i]."\n");
                echo nl2br('</div>'."\n");
            }
            ?>
        </div>
        <form action="<?php echo 'index.php?action=sendmessage&id=' . $sendto?>" method="post" autocomplete="off">
            <div>
                <label class="goodsize" for="content">Message : </label>
            </div>
            <div>
                <input class="messageinput" type="textarea" name="content" id="content" required>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</body>

</html>