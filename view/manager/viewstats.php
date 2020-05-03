<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="public/style/tests.css">
        <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
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
            <li class="button"><a class="whitelink" href="index.php?action=managerprofile">Retour au profil</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <h1 style="padding-left: 50px;" class="pageinfoh1">Statistiques de l'entreprise <?=$company_name?></h1>
            <h2 style="padding-left: 50px; padding-bottom: 50px;">Nombre d'utilisateurs enregistrés : <?=count($idsuser)?></h2>
            <?php for ($i = 0; $i < count($idstest); $i++) { ?>
                <div class="statbox" >
                    <h2><?=$descriptions[$i]?></h2>
                    <p style="font-size: 20px;"><?=$meanstodisp[$i]?></p>
                </div>
            <?php } ?>

            <div class="push"></div>

            <?php include(__DIR__."/../viewfooterLong.php") ?>
        </div>
    </div>
</body>


</html>