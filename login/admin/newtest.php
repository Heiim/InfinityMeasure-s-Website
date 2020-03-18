<?php

session_start();
// Si l'utilisateur est pas loggué on le redirige vers la page de login
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit();
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../../quirky.css">
        <link rel="stylesheet" href="tests.css">
        <link rel="icon" type="image/png" href="../../../images/infinitelogo.png" />
    </head>

    <header>
    <div>
        <div class="logo">
            <a href="../../../home.html"><img src="../../../images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="profile.php">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Nouveau test</h1>
                    <form action="newtestsubmit.php" method="post" autocomplete="off">
                        <div>
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div>
                            <label for="min">Minimum </label>
                            <input type="number" name="min" id="min" required>
                        </div>
                        <div>
                            <label for="max">Maximum </label>
                            <input type="number" name="max" id="max" required>
                        </div>
                        <div>
                            <label for="unit">Unité </label>
                            <input type="text" name="unit" id="unit" required>
                        </div>
                        <div>
                            <label for="description">Description </label>
                            <input class="textareadisc" type="textarea" name="description" id="description" required>
                        </div>
                        <div>
                            <label for="idsensor">Capteur: </label>
                            <select id="idsensor" name="idsensor">
                                <?php 
                                    for ($i = 0; $i < count($idsolver); $i++) {
                                        echo nl2br('<option value="'.$ids[$i].'">'.$idsolver[$ids[$i]].'</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Confirmer">
                    </form>
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