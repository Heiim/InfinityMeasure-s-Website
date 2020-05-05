<html>
<!DOCTYPE html>
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
</header>

<body>
        <div style="width: 99%">
            <div class="clearing messagecontainer" style="margin: 0 auto; width: 500px;">
                <p><?php echo $messagedisp ?></p>
            </div>

            <?php if (isset($profilebutton)) { ?>
                <div style="margin: 0 auto; width: 160px;"> <div class="button"><a class="whitelink" href="index.php?action=login">Retour au profil</a></div></div>
            <?php }?>

            <?php include("viewfooterShort.php") ?>

            <?php if (isset($loginbutton)) { ?>
                <div style="margin: 0 auto; width: 131px;"><div class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></div></div>
            <?php }?>

            <?php include("viewfooterShort.php") ?>

         </div>
</body>

</html>