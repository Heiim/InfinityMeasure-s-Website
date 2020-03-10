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
    for ($i = 0; $i < count($times); $i++) {
        echo nl2br('De : ' . $idsolver[$idsenders[$i]] ."\n");
        echo nl2br('Pour : ' . $idsolver[$idreceivers[$i]]."\n");
        echo nl2br('A : ' . $times[$i]."\n");
        echo nl2br($contents[$i]."\n");
        echo nl2br("\n");
    }
    ?>

<form action="<?php echo 'sendmessage.php?id=' . $sendto?>" method="post" autocomplete="off">
    <div>
        <label for="content">Message </label>
        <input type="text" name="content" id="content" required>
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>
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