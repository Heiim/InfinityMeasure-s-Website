<?php

if ($emailchanged) {
    //si l'adresse email a été changée on close la session
    session_start();
    session_destroy();
}
?>

<html>
<!DOCTYPE html>
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
</header>

<body class="center">
    <div class="clearing messagecontainer">
        <p class="message"><?php echo $messagedisp ?></p>
    </div>
    <div class="button"><a class="whitelink" href="../profile.php">Retour au profil</a></div>
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