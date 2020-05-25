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
            <li class="button"><a class="whitelink" href="index.php?action=userprofile">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
        <?php include("viewloggednotice.php") ?>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                <h1 class="pageinfoh1">Edition du profil</h1>
                    <form action="index.php?action=doeditprofile" method="post" autocomplete="off">
                        <div>
                            <label for="lastn">Nom</label>
                            <input type="text" name="lastn" id="lastn" placeholder=<?=htmlspecialchars($lastn)?> value=<?=htmlspecialchars($lastn)?> required>
                        </div>
                        <div>
                            <label for="firstn">Prénom </label>
                            <input type="text" name="firstn" id="firstn" placeholder=<?=htmlspecialchars($firstn)?> value=<?=htmlspecialchars($firstn)?> required>
                        </div>
                        <div>
                            <label for="birthday">Date de naissance </label>
                            <input type="date" name="birthday" id="birthday" placeholder=<?=htmlspecialchars($birthday)?> value=<?=htmlspecialchars($birthday)?> required>
                        </div>
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" placeholder=<?=htmlspecialchars($email)?> value=<?=htmlspecialchars($email)?> required>
                        </div>
                        <div>
                            <label for="size">Taille </label>
                            <input type="number" name="height" id="height" placeholder="cm" value=<?=htmlspecialchars($height)?> required>
                            <label for="size">Poids </label>
                            <input type="number" name="weight" id="weight" placeholder="kg" value=<?=htmlspecialchars($weight)?> required>
                        </div>
                        <input type="hidden" name="id" id="id" value=<?=$_SESSION['id']?>>
                        <div>
                            <input type="submit" value="Confirmer">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <?php include("viewfooterLong.php") ?>
            </div>
        </div>
    </div>
</body>


</html>