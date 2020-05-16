<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
    <div hidden>
    <?=
    logincheck();
    ?>
</div>
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
            <li class="button"><a class="whitelink" href="index.php?action=login"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Sign in <?php } else {?> Connexion <?php } ?></a></li>
            <li class="button"><a class="whitelink" href="index.php?action=register"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Sign up <?php } else {?> Créer un compte <?php } ?></a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing loginformcontainer">
                <div class="loginform">
                <h1 class="pageinfoh1"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Sign in <?php } else {?> Connexion <?php } ?></h1>

                    <form action="index.php?action=authenticate" method="post">
                        <div>
                            <label for="email"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Email <?php } else {?> Adresse email <?php } ?></label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div>
                            <label for="password"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Password <?php } else {?> Mot de passe <?php } ?></label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=resetpassword"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Reset password <?php } else {?> Mot de passe oublié <?php } ?></a></li>
                            </ul>
                            <input type="submit" value=" <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Sign in <?php } else {?> Connexion <?php } ?> ">
                        </div>
                    </form>
                </div>
                <div class="passworderrorlogin">
                <?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?>
                </div>

                <div class="push"></div>

                <?php include("viewfooterShort.php") ?>
            </div>
        </div> 
    </div>
</body>


</html>