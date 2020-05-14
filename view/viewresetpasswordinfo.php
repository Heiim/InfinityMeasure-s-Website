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

<body class="center">
    <div class="wrapper">
        <div>
            <div class="clearing messagecontainer">
                <p class="message"><?php echo $message ?></p>
            </div>
            <div class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></div>
            <div class="push"></div>
            <?php include("viewfooterShort.php") ?>
        </div>  
    </div>     
</body>



</html>