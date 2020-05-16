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
            <li class="button"><a class="whitelink" href="index.php?action=chat"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Inbox <?php } else {?> Messagerie <?php } ?></a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Log out <?php } else {?> Déconnexion <?php } ?> </a></li>
        </ul>
    </div>
</header>

	<body>
        <div class="wrapper">
            <div>
                <div class="clearing adminprofilecontainer">
                    <h1 class="textfloatleft"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> My profile <?php } else {?> Mon profil <?php } ?> </h1>
                        <div class="dropcontainer">
                            <div class="dropdown">
                                <button class="dropbtn"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Edit test <?php } else {?> Modifier un test <?php } ?></button>
                                    <div class="dropdown-content">
                                        <?php 
                                        for ($i = 0; $i < count($idstest); $i++) {
                                            echo '<a href="index.php?action=edittest&idtest='.$idstest[$i].'">'.$descriptions[$i].'</a>';
                                        }
                                        ?>
                                        <a href="index.php?action=newtest"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> New test <?php } else {?> Nouveau test <?php } ?> </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropcontainer">
                            <div class="dropdown">
                                <button class="dropbtn"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Search <?php } else {?> Rechercher <?php } ?> </button>
                                    <div class="dropdown-content">
                                        <a href="index.php?action=showsearchuser"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> User Search <?php } else {?> Recherche Utilisateur <?php } ?> </a>
                                        <a href="index.php?action=showsearchmanager"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Manager Search <?php } else {?> Recherche Gestionnaire  <?php } ?> </a>
                                        <a href="index.php?action=showsearchadmin"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Administrator Search <?php } else {?> Recherche Administrateur <?php } ?> </a>
                                </div>
                            </div>
                        </div>
                    <div class="clearing profileinfo">
                        <table>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Last Name: <?php } else {?> Nom :<?php } ?></td>
                                <td><?=$lastn?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> First Name: <?php } else {?> Prénom :<?php } ?></td>
                                <td><?=$firstn?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"> Email:</td>
                                <td><?=$email?></td>
                            </tr>
                        </table>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=editadminprofile"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Edit profile <?php } else {?> Editer mon profil <?php } ?> </a></li>
                            </ul>
                    </div>
                    <div style="float: right;">
                        <ul>
                            <li style="clear: both; margin-right: 130px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=admininvite"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> New administrator profile<?php } else {?> Créer un nouveau profil administrateur <?php } ?> </a></li>
                            <li style="clear: both; margin-left: 6px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=managerinvite"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> New manager profile <?php } else {?> Créer un nouveau profil gestionnaire <?php } ?> </a></li>
                            <li style="clear: both; margin-left: 35px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=managecompanycodes"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Manage company codes <?php } else {?> Gérer les codes entreprises <?php } ?> </a></li>
                        </ul>
                    </div>
                    <div class="imagecontainer">
                        <img class="profileimage" src="../<?=$picture?>" height=200px width=200px>
                        <form action="index.php?action=updateimage" method="post" enctype="multipart/form-data">
                            <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Update picture <?php } else {?> Changer la photo <?php } ?>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?></span>
                    </div>
                </div>
                <div class="push"></div>
                <?php include(__DIR__."/../viewfooterLong.php") ?>
            </div>
        </div>
    </body>
    
</html>