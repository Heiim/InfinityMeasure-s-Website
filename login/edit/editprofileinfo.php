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
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Edition du profil</h1>
                    <form action="editsubmit.php" method="post" autocomplete="off">
                        <div>
                            <label for="lastn">Nom</label>
                            <input type="text" name="lastn" id="lastn" placeholder=<?=$lastn?> value=<?=$lastn?> required>
                        </div>
                        <div>
                            <label for="firstn">Prénom </label>
                            <input type="text" name="firstn" id="firstn" placeholder=<?=$firstn?> value=<?=$firstn?> required>
                        </div>
                        <div>
                            <label for="birthday">Date de naissance </label>
                            <input type="date" name="birthday" id="birthday" placeholder=<?=$birthday?> value=<?=$birthday?> required>
                        </div>
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" placeholder=<?=$email?> value=<?=$email?> required>
                        </div>
                        <div>
                            <label for="size">Taille </label>
                            <input type="number" name="height" id="height" placeholder="cm" value=<?=$height?> required>
                            <label for="size">Poids </label>
                            <input type="number" name="weight" id="weight" placeholder="kg" value=<?=$weight?> required>
                        </div>
                        <input type="hidden" name="id" id="id" value=<?=$_SESSION['id']?>>
                        <div>
                            <input type="submit" value="Confirmer">
                        </div>
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