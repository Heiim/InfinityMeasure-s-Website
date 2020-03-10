<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../quirky.css">
    <link rel="icon" type="image/png" href="../../images/infinitelogo.png" />
</head>

<header>
    <div>
        <div class="logo">
            <a href="../../home.html"><img src="../../images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="../index.php">Connexion</a></li>
            <li class="button"><a class="whitelink" href="../register.html">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="clearing loginformcontainer">
        <div class="loginform">
            <script src="../../scripts/formscript.js"></script>
            <script src="../../scripts/passlength.js"></script>
            <form action="resetpassword.php" method="post">
                <div>
                    <label for="password">Nouveau mot de passe </label>
                    <input type="password" name="password" id="password" onkeyup='checkpassword(); checklength()' required>
                </div>
                <div>
                    <label for="confirmpassword">Confirmation </label>
                    <input type="password" name="confirmpassword" id="confirmpassword" onkeyup='checkpassword();' required><span class="passworderror" id='passworderror'></span><span class="passworderror" id='passwordlength'></span>
                </div>
                    <input type="hidden" name="token" id="token" value="<?php if(isset($_GET['token'])) echo $_GET['token']; ?>">
                    <input type="hidden" name="email" id="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>">
                <div>
                    <input type="submit" value="Réinitialiser">
                </div>
            </form>
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