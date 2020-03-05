<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../quirky.css">
        <link rel="icon" type="image/png" href="../images/infinitelogo.png" />
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
            <li class="button"><a class="whitelink" href="profile.php">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="logout.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="language">
        <div>
            <img class="flagbutton" src="../images/FrFlag.png" width=40px height=25px>
            <img class="flagbutton" src="../images/GBFlag.jpg" width=40px height=25px>
        </div>
    </div>
</header>

<body>
    <div class="wrapper">
        <div class="barre">
            <form method="GET">
                <input type="search" name="prenom" placeholder="Prénom" />
                <input type="search" name="nom" placeholder="Nom" />
                <select class="selectbarre" name="status" placeholder="Status">
                    <option value="0"></option>
                    <option value="User">Utilisateur</option>
                    <option value="Gestionnaire">Gestionnaire</option>
                    <option value="Admin">Administrateur</option>
                </select>
                <input type="submit" value="Chercher" />
                <input type="reset" value="Supprimer" />
            </form>

            <div>

                <?php include 'index.php';?>
            </div>
            <div class="push"></div>

            <footer class="gooter"><ul>
                <li class="button"><a class="whitelink" href="cgu.html">CGU</a></li>
                <li class="button"><a class="whitelink" href="contact.html">Nous contacter</a></li>
                <li class="button"><a class="whitelink" href="FAQ/faq.html">FAQ</a></li>
                <li class="button"><a class="whitelink" href="forum.html">Forum</a></li>
            </ul></footer>
        </div>



</body>
