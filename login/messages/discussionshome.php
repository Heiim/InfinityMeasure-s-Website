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
        <li class="button"><a class="whitelink" href="../profile.php">Mon compte</a></li>
        <li class="button"><a class="whitelink" href="../logout.php">Déconnexion</a></li>
    </ul>
</div>
</header>

<body>
    <?php 
    $ids=array_keys($idsolver);
    for ($i = 0; $i < count($idsolver); $i++) {
        if ($ids[$i] != $_SESSION['id']) {
            echo nl2br('<a class="whitelink" href="getmessages.php?id='.$ids[$i].'">Discussion avec : ' .$idsolver[$ids[$i]].'</a>'."\n");
        }
    }
    ?>
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