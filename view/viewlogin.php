<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
    <div hidden>
    <?=
    session_start();
    
    logincheck();
    ?>
</div>
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
            <li class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=register">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing loginformcontainer">
                <div class="loginform">
                <h1 class="pageinfoh1">Connexion</h1>

                    <form action="index.php?action=authenticate" method="post">
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
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=resetpassword">Mot de passe oublié</a></li>
                            </ul>
                            <input type="submit" value="Connexion">
                        </div>
                    </form>
                </div>
                <div class="passworderrorlogin">
                <?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?>
                </div>

                <div class="push"></div>

                <div class="gooter">
                    <ul>
                        <li class="button"><a class="whitelink" href="cgu.html">CGU</a></li>
                        <li class="button"><a class="whitelink" href="contact.html">Nous contacter</a></li>
                        <li class="button"><a class="whitelink" href="faq.html">FAQ</a></li>
                        <li class="button"><a class="whitelink" href="forum.html">Forum</a></li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</body>


</html>