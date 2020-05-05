<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style/style.css">
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
            <li class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=register">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing resetformcontainer">
                <div class="resetform">
                    <h2 class="pageinfoh1">Réinitialiser le mot de passe</h2>
                    <script src="public/scripts/formscript.js"></script>
                    <script src="public/scripts/passlength.js"></script>
                    <form action="index.php?action=resetpasswordrequest" method="post">
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" required>
                        </div>
                            <input type="submit" value="Confirmer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="push"></div>
            <?php include("viewfooterShort.php") ?>
        </div>
    </div>
</body>



</html>