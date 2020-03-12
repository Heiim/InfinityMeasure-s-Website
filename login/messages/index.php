<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../../quirky.css">
        <link rel="stylesheet" href="messages.css">
        <link rel="icon" type="image/png" href="../../images/infinitelogo.png" />
        <script src="scroll.js"></script>
    </head>
<header>
<div>
    <div class="logo">
        <a href="../../home.html"><img src="../../images/infinitelogo.png" width=100% height=100%>
    </div>
    <p class="name">Infinite Measures</p>
    </a>
</div>
<div class="connection">
    <ul>
        <li class="button"><a class="whitelink" href="../profile.php">Mon compte</a></li>
        <li class="button"><a class="whitelink" href="../logout.php">Déconnexion</a></li>
    </ul>
</div>
</header>

<body onload="scrollDown()">
    <div class="chatcontainer">
        <h1 class="pageinfoh1"> 
            <a class="whitelink goodsize" href="getdiscussions.php">Retour</a> 
            Conversation avec 
            <?php 
                if ($idsenders[0]==$_SESSION['id']) {
                    echo $idsolver[$idreceivers[0]];
                } else {
                    echo $idsolver[$idsenders[0]];
                }
                
            ?>
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
        <form action="<?php echo 'sendmessage.php?id=' . $sendto?>" method="post" autocomplete="off">
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