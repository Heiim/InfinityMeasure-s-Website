<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="../quirky.css">
    <div hidden>
    <?=
    session_start();
    // Si l'utilisateur est loggué on le redirige vers son compte
    if (isset($_SESSION['loggedin'])) {
            header('Location: profile.php');
            exit();
    }
    ?>
</div>
</head>

<header>
    <div>
        <div class="logo">
            <a href="../home.html"><img src="../images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="index.php">Connexion</a></li>
            <li class="button"><a class="whitelink" href="register.html">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="clearing loginformcontainer">
        <div class="loginform">
            <form action="authenticate.php" method="post">
                <div>
                    <label for="email">Adresse email </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Mot de passe </label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <ul>
                        <li class="button resetpasswordbutton"><a class="whitelink" href="resetpassword/resetpasswordrequestform.php">Réinitialiser mon mot de passe</a></li>
                    </ul>
                    <input type="submit" value="Connexion">
                </div>
            </form>
        </div>
        <div class="passworderrorlogin">
        <?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?>
        </div>
    </div>
</body>

<footer>
    <ul>
        <li class="button"><a class="whitelink" href="cgu.html">CGU</a></li>
        <li class="button"><a class="whitelink" href="contact.html">Nous contacter</a></li>
        <li class="button"><a class="whitelink" href="faq.html">FAQ</a></li>
        <li class="button"><a class="whitelink" href="forum.html">Forum</a></li>
    </ul>
</footer>

</html>