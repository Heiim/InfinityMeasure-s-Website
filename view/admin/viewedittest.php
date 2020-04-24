<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/style/tests.css">
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
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Modification du test</h1>
                    <form action="index.php?action=doedittest" method="post" autocomplete="off">
                        <div>
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" placeholder=<?=$name?> value=<?=$name?> required>
                        </div>
                        <div>
                            <label for="min">Minimum </label>
                            <input type="number" name="min" id="min" placeholder=<?=$min?> value=<?=$min?> required>
                        </div>
                        <div>
                            <label for="max">Maximum </label>
                            <input type="number" name="max" id="max" placeholder=<?=$max?> value=<?=$max?> required>
                        </div>
                        <div>
                            <label for="unit">Unité </label>
                            <input type="text" name="unit" id="unit" placeholder=<?=$unit?> value=<?=$unit?> required>
                        </div>
                        <div>
                            <label for="description">Description </label>
                            <input class="textareadisc" type="textarea" name="description" id="description" value='<?=$description?>' required>
                        </div>
                        <div>
                            <label for="idsensor">Capteur: </label>
                            <select id="idsensor" name="idsensor">
                                <?php 
                                    for ($i = 0; $i < count($idsolver); $i++) {
                                        if ($theidsensor==$ids[$i]){
                                            echo nl2br('<option value="'.$ids[$i].'" selected="selected"'.'>'.$idsolver[$ids[$i]].'</option>');
                                        } else{
                                            echo nl2br('<option value="'.$ids[$i].'">'.$idsolver[$ids[$i]].'</option>');
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="idtest" id="idtest" value=<?=$idtest?>>
                        <div>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="deletebutton" href="index.php?action=deletetest&id=<?=$idtest?>">Supprimer le test</a></li>
                            </ul>
                            <input type="submit" value="Confirmer">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <?php include(__DIR__."/../viewfooterShort.php") ?>
            </div>
        </div>
    </div>
</body>


</html>