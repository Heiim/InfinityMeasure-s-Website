<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
    </head>

    <header>
    <div>
        <div class="logo">
            <a href="index.php"><img src="public/images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="index.php?action=adminprofile">Retour au profil</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
        <h1 style="padding-top:10px; padding-left:150px;"> Codes entreprises</h1>
        <form action="index.php?action=newcompanycode" method="post">
            <div class="newcompany">
                <label style="font-size: 20px;" for="name">Nouvelle entreprise :</label>
                <input type="text" name="name" id="name" placeholder="Nom de l'entreprise" required>
<input style="margin-top: 0px; margin-bottom: 0px;" type="submit" value="Ajouter"> <?php if (isset($messagewrong)) {?> <span style="color: red; font-size: 20px;"><?=$messagewrong?></span> <?php } else if (isset($messageright)) {?> <span style="color: green; font-size: 20px;"><?=$messageright?></span> <?php }?> 
            </div>
        </form>
        <div class="tablecontainer" >
            <table class="companytable" >
                <thead>
                    <tr>
                        <th class="largerfont" style="border-left: 0px;">Nom</th>
                        <th class="largerfont">Code</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($idscompany); $i++) { ?>
                    <tr>
                        <td class="tabletd" style="border-left: 0px"><?= $names[$i]?></td>
                        <td class="tabletd"><?= $company_codes[$i]?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

            <div class="push"></div>

            <?php include(__DIR__."/../viewfooterShort.php") ?>
        </div>
    </div>
</body>


</html>