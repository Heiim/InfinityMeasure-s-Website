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
        <div>
            <div class="barre">
            <h2>Recherche Administrateur</h2>
                <form method="GET">
                    
                    <input type="search" name="prenom" placeholder="Prénom" />
                    <input type="search" name="nom" placeholder="Nom" />
                    <input type="submit" value="Chercher" />
                    <input type="reset" value="Supprimer" />
                </form>

                <div>

                    <?php include 'searchadmin.php';?>
                </div>
                <div class="push"></div>

                
            </div>
        </div>
    </div>
</body>
