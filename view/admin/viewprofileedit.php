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
            <li class="button"><a class="whitelink" href="index.php?action=chat">Messagerie</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Edition du profil</h1>
                    <form action="index.php?action=doeditadminprofile" method="post" autocomplete="off">
                        <div>
                            <label for="lastn">Nom</label>
                            <input type="text" name="lastn" id="lastn" placeholder=<?=$lastn?> value=<?=$lastn?> required>
                        </div>
                        <div>
                            <label for="firstn">Prénom </label>
                            <input type="text" name="firstn" id="firstn" placeholder=<?=$firstn?> value=<?=$firstn?> required>
                        </div>
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" placeholder=<?=$email?> value=<?=$email?> required>
                        </div>
                        <input type="hidden" name="id" id="id" value=<?=$_SESSION['id']?>>
                        <div>
                            <input type="submit" value="Confirmer">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <?php include("viewfooterLong.php") ?>
            </div>
        </div>
    </div>
</body>


</html>