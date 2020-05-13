<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style/style.css">
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
            <li class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=register">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
<div class="wrapper">
        <div>
            <h1 class="titletext">Nous contacter</h1>
            <h2 class="titletext">Support client et Assistance technique</h2>
            <p>
            Appel local :+33 00 00 00 00 00
            </p>
            <h2 class="titletext">Carrieres</h2>
            <p>
            Pour toutes demandes concernant les offres de recrutements, veuillez joindre une lettre de motivation et votre CV à l'adresse suivante :
            infinitesmeasures.recrutement@gmail.com
            </p>
        </div>
        
        <div>
            <h1 class="titletext">Poser un question ou envoyer un commentaire</h1>
        </div>
</div>
    <div class="wrapper">
        <form action="index.php?action=postcontact" method="POST">
            <div class="contactform1">
                        <div><label for="lastn">Nom</label></div>
                        <div><input type="text" style="width:500px"name="lastn" id="lastn" required></div>
                        <div><label for="firstn">Prénom </label></div>
                        <div><input type="text" style="width:500px"name="firstn" id="firstn" required> </div>
                        <div><label for="email">Adresse email </label></div>
                        <div><input type="email" style="width:500px"name="email" id="email" required></div>
            </div>
            <div class="contactform1">
                    <div><label for="subject">Sujet</label></div>
                    <div><input type="text"style="width:500px"name="subject" id="subject" required></div>
                    <div><textarea style="front-size=25px" rows="8" cols="100"name="contain" id="contain" required></textarea></div>
                    <div><input type="submit"class="btn btn-primary" value="Envoyer"></div>
            </div>
        </form>
           
        
    </div>

<div class="push"></div>

<?php include("viewfooterLong.php") ?>
</div>
</body>

</html>