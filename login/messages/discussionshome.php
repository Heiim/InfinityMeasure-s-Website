<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../../quirky.css">
        <link rel="stylesheet" href="messages.css">
        <link rel="icon" type="image/png" href="../../images/infinitelogo.png" />
    </head>
<header>
<div>
    <div class="logo">
        <a href="../../home.html"><img src="../../images/infinitelogo.png" width=100%x height=100%>
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

<body>
    <div class="discussioncontainer">
        <h1 class="pageinfoh1">Mes conversations</h1>
        <div class="discussionwraper">
            <?php 
            $ids=array_keys($idsolver);
            for ($i = 0; $i < count($idsolver); $i++) {
                // if the id is different for the user's one and he has a discussion with the user
                if ($ids[$i] != $_SESSION['id'] && (in_array($ids[$i], $idreceivers) || in_array($ids[$i], $idsenders))) {
                    echo nl2br('<div class="discussion"><a class="discussionlink" href="getmessages.php?id='.$ids[$i].'">' .$idsolver[$ids[$i]].'</a></div>');
                }
            }
            ?>
        </div>
        <div>
            <form action="sendmessage.php" method="post" autocomplete="off">
                <div>
                    <label class="goodsize" for="content">Nouveau message à: </label>
                    <select id="id" name="id">
                        <?php 
                            for ($i = 0; $i < count($idsolver); $i++) {
                                if ($ids[$i] != $_SESSION['id']) {
                                    echo nl2br('<option value="'.$ids[$i].'">'.$idsolver[$ids[$i]].'</option>');
                                }
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <input class="textareadisc" type="textarea" name="content" id="content" required>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</body>

</html>