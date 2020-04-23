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
                <a href="index.php"><img src="public/images/infinitelogo.png" width=100%x height=100%>
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
        <div class="topicscontainer">
            <?php for ($i = 0; $i < count($dates); $i++) {?>
                <a href="index.php?action=viewtopic&id=<?= $idtopics[$i] ?>">
                    <div class="topic">
                        <span class="name"><?= $titles[$i]?></span>
                        <span class="date">Dernier message : <?= $dates[$i]?></span>
                    </div>
                </a>
            <?php } ?>
        </div>
    </body>
    
</html>