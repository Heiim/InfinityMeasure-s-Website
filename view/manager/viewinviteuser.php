<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
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
            <li class="button"><a class="whitelink" href="index.php?action=managerprofile">Retour au profil</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
        <?php include(__DIR__."/../viewloggednotice.php") ?>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
            <h1 style="margin-left: 200px; margin-top: 50px; margin-bottom: 60px;" class="pageinfoh1">Nouveau profil utilisateur</h1>
                <div class="registerform">
                    <form action="index.php?action=senduserinvite" method="post" autocomplete="off">
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <input type="hidden" name="company_code" id="company_code" value=<?=$company_code?> required>
                        <div>
                            <input type="submit" value="Envoyer l'invitation">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <?php include(__DIR__."/../viewfooterShort.php") ?>
            </div>
        </div>
    </div>
</body>


</html>