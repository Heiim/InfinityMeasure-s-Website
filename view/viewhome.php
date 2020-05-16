<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style/home.css">
    <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
</head>

<body>
    <div class="banner">
        <section>
           <div class="topleftbutton">
                <a href="index.php">
                <img class ="logo" src="public/images/infinitelogo.png" >
                <h1> Infinite Measures </h1>
                </a>
            </div>
            <div class="toprightbutton">
                    <a href="index.php?action=switchlanguage&lang=fr"><img class ="flaglogoFr" src="public/images/FrFlag.png"></a>
                    <a href="index.php?action=switchlanguage&lang=en"><img class ="flaglogoGb" src="public/images/GBFlag.png"></a>
                    <a class="buttonright" href="index.php?action=login">
                    <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Sign in <?php } else {?> Déja Membre ? <?php } ?>
                    </a>
            </div>
            
            <div class="centerbutton">
                <a class="buttoncenter" href="index.php?action=contactus" > <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Are you a recruiter? <?php } else {?> Vous êtes un recruteur ? <?php } ?></a>
                <a class="buttoncenter1" href="index.php?action=register" > <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Are you a future driver? <?php } else {?> Vous êtes un futur conducteur ? <?php } ?> </a>
            </div>
            <video playsinline autoplay muted loop>
                <source src ="public/videos/wall.mp4" type ="video/mp4">
            </video>
        </section>
        <section>
            <div class="title">
                <h2> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Our devices and tests <?php } else {?> Nos dispositifs et tests <?php } ?> </h2>
                <img class="image1" src="public/images/Systeme.png ">
            </div>
            <div class="titlesmall">
                <h2> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Our devices and tests <?php } else {?> Nos dispositifs et tests <?php } ?> </h2>
                <img class="image2" src="public/images/Systemesmall.png">
            </div>
             <img class="image" src="public/images/téléchargement.jpg">
        </section>
        <section>
            <div class="title1">
                <h3> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Our test centers <?php } else {?> Nos centres de tests <?php } ?> </h3>
                <h5>Paris &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Nantes</h5>
                <h6>Paris
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    Nantes
                </h6>
                <h4><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.555409404855!2d2.284912215957697!3d48.86668770807617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ffa903253a7%3A0xe3965bf2406e517!2s84-108%20Rue%20Lauriston%2C%2075116%20Paris!5e0!3m2!1sfr!2sfr!4v1585558684979!5m2!1sfr!2sfr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    &emsp;&ensp;
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2709.613200257332!2d-1.5551092840815752!3d47.22415022231152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805ee9889ed81f1%3A0xa6cf6e831307cff9!2sSt%20Donatien-Malakoff%2C%2044000%20Nantes!5e0!3m2!1sfr!2sfr!4v1585559082847!5m2!1sfr!2sfr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></h4>
            </div>
            <img class="image" src="public/images/téléchargement.jpg">
            <div class="footer">
                <div class="aboutus">
                <li class="button"><a class="whitelink" href="index.php?action=cgu"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> GCU <?php } else {?> CGU <?php } ?> </a></li>
                <li class="button"><a class="whitelink" href="index.php?action=contactus"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Contact us <?php } else {?> Nous contacter <?php } ?> </a></li>
                <li class="button"><a class="whitelink" href="index.php?action=faq">FAQ</a></li>
                <li class="button"><a class="whitelink" href="index.php?action=forum">Forum</a></li>
                </div>
            </div>
        </section>
    </div>
</body>

</html>