<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="../quirky.css">
    <div hidden>
    <?=
    session_start();
    // Si l'utilisateur est pas loggué on le redirige vers la page de login
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
            <a href="../home.html"><img src="../images/LogoNoName.png" width=100%x height=100%>
        </div>
        <p class="name">quirky()</p>
    </div>
    <div class="connection">
        <ul>
            <li class="connectbutton"><a class="whitelink" href="index.php">Connexion</a></li>
            <li class="connectbutton"><a class="whitelink" href="register.html">Créer un compte</a></li>
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
        <li class="button"><a href="cgu.html">CGU</a></li>
        <li class="button"><a href="contact.html">Nous contacter</a></li>
        <li class="button"><a href="faq.html">FAQ</a></li>
        <li class="button"><a href="forum.html">Forum</a></li>
    </ul>
</footer>

</html>