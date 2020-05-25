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
        <?php include("viewloggednotice.php") ?>
    </div>
</header>

	<body>
        <div class="wrapper">
            <div>
                <div class="clearing profilecontainer">
                    <h1 class="textfloatleft"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> My profile <?php } else {?> Mon profil <?php } ?> </h1>
                        <div class="dropcontainer">
                            <div class="dropdown">
                                <button class="dropbtn"> <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Results <?php } else {?> Résultats <?php } ?> </button>
                                    <div class="dropdown-content">
                                        <?php 
                                        for ($i = 0; $i < count($idstest); $i++) {
                                            echo '<a href="index.php?action=getresults&idtest='.$idstest[$i].'">'.$descriptions[$i].'</a>';
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    <div class="clearing profileinfo">
                        <table>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Last Name: <?php } else {?> Nom :<?php } ?></td>
                                <td><?=htmlspecialchars($lastn)?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> First Name: <?php } else {?> Prénom :<?php } ?></td>
                                <td><?=htmlspecialchars($firstn)?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo">Email:</td>
                                <td><?=htmlspecialchars($email)?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Birthdate: <?php } else {?> Date de naissance: <?php } ?></td>
                                <td><?=htmlspecialchars($birthday)?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Gender: <?php } else {?> Genre : <?php } ?></td>
                                <td><?=htmlspecialchars($gender)?></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Height: <?php } else {?> Taille : <?php } ?></td>
                                <td><?=htmlspecialchars($height)?><label> cm</label></td>
                            </tr>
                            <tr>
                                <td class="champsinfo"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Weight: <?php } else {?> Poids : <?php } ?></td>
                                <td><?=htmlspecialchars($weight)?><label> kg</label></td>
                            </tr>
                        </table>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=editprofile"><?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Edit profile <?php } else {?> Editer mon profil <?php } ?></a></li>
                            </ul>
                    </div>
                    <div class="imagecontainer">
                        <img class="profileimage" src=<?=htmlspecialchars($picture)?> height=200px width=200px>
                        <form action="index.php?action=updateimage" method="post" enctype="multipart/form-data">
                        <?php if ( (isset($_SESSION['lang'])) && ($_SESSION['lang']=='en')) { ?> Update picture <?php } else {?> Changer la photo <?php } ?>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?></span>
                    </div>
                </div>
                <div class="push"></div>
            <?php include("viewfooterLong.php") ?>
            </div>
         </div>
    </body>
    
</html>