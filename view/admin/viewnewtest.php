<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="public/style/tests.css">
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
            <li class="button"><a class="whitelink" href="index.php?action=adminprofile">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
    <?php include(__DIR__."/../viewloggednotice.php") ?>
</header>

<body>
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Nouveau test</h1>
                    <form action="index.php?action=donewtest" method="post" autocomplete="off">
                        <div>
                            <label for="name">Nom</label>
                            <input style="width:200px;" type="text" name="name" id="name" required>
                        </div>
                        <div>
                            <label for="min">Minimum </label>
                            <input style="width:200px;" type="number" name="min" id="min" required>
                        </div>
                        <div>
                            <label for="max">Maximum </label>
                            <input style="width:200px;" type="number" name="max" id="max" required>
                        </div>
                        <div>
                            <label for="unit">Unité </label>
                            <input style="width:200px;" type="text" name="unit" id="unit" required>
                        </div>
                        <div>
                            <label for="description">Description </label>
                            <input style="width:200px;" class="textareadisc" type="textarea" name="description" id="description" required>
                        </div>
                        <div>
                            <label for="idsensor">Capteur </label>
                            <select style="width:204px;" id="idsensor" name="idsensor">
                                <?php 
                                    for ($i = 0; $i < count($idsolver); $i++) {
                                        echo nl2br('<option value="'.$ids[$i].'">'.$idsolver[$ids[$i]].'</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Confirmer">
                    </form>
                </div>

                <?php include(__DIR__."/../viewfooterShort.php") ?>
            </div>
        </div>
</body>
</html>