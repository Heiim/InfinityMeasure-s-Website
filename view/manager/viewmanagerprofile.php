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
            <li class="button"><a class="whitelink" href="index.php?action=chat">Messagerie</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
</header>

	<body>
        <div class="wrapper">
            <div>
                <div class="clearing adminprofilecontainer">
                    <h1 class="textfloatleft">Gestionnaire</h1>
                        <div class="dropcontainer">
                            <div class="dropdown">
                                <button class="dropbtn">Rechercher</button>
                                    <div class="dropdown-content">
                                        <a href="index.php?action=showsearchuser"> Recherche Utilisateur </a>
                                        <a href="index.php?action=showsearchmanager"> Recherche Gestionnaire </a>
                                </div>
                            </div>
                        </div>
                    <div class="clearing profileinfo">
                        <table>
                            <tr>
                                <td class="champsinfo">Nom:</td>
                                <td><?=$lastn?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo">Prénom:</td>
                                <td><?=$firstn?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo">Email:</td>
                                <td><?=$email?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo">Entreprise:</td>
                                <td><?=$company_name?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo">Code entreprise:</td>
                                <td><?=$company_code?></td>
                            </tr>
                        </table>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=editmanagerprofile">Editer mon profil</a></li>
                            </ul>
                    </div>
                    <div style="float: right;">
                        <ul>
                            <li style="clear: both; margin-right: 215px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=userinvite">Créer un profil utilisateur</a></li>
                        </ul>
                        <ul>
                            <li style="clear: both; margin-right: 215px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=managerinvite">Créer un profil gestionnaire</a></li>
                        </ul>
                        <ul>
                            <li style="clear: both; margin-right: 215px;" class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=stats">Statistiques entreprise</a></li>
                        </ul>
                    </div>
                    <div class="imagecontainer">
                        <img class="profileimage" src="../<?=$picture?>" height=200px width=200px>
                        <form action="index.php?action=updateimage" method="post" enctype="multipart/form-data">
                            Changer la photo
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