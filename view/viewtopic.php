<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="public/style/forum.css">
        <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
    </head>

    <header>
        <div>
            <div class="logo">
                <a href="index.php"><img src="public/images/infinitelogo.png" width=100% height=100%>
            </div>
            <p class="name">Infinite Measures</p>
            </a>
        </div>
        <div class="connection">
            <ul>
                <li class="button"><a class="whitelink" href="index.php?action=userprofile">Mon compte</a></li>
                <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
            </ul>
        </div>
    </header>

	<body>
        <ul>
            <li class="button"><a class="whitelink" href="index.php?action=forum">Retour au forum</a></li>
        </ul>
        <h1 style="margin-left: 75px;"><?= $title ?></h5>
        <div class="postscontainer">
            <?php for ($i = 0; $i < count($idposts); $i++) {
                $thedate = explode(" ", $dates[$i]);?>
                <div class="postcontainer">
                    <div class="userinfo">
                        <img src="<?=$imagesolver[$idaccounts[$i]]?>" width=136px height=136px>
                        <span class="username"><?= $idsolver[$idaccounts[$i]]?></span>
                    </div>
                    <div class="post">
                        <span class="postdate">Le <?= $thedate[0]?> à <?= $thedate[1]?> :</span>
                        <span class="content" ><?= $contents[$i]?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
    
</html>