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
            <li class="button"><a class="whitelink" href="index.php?action=chat">Messagerie</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
    </div>
</header>

	<body>
        <div class="wrapper">
            <div>
                <div class="clearing profilecontainer">
                    <h1 class="textfloatleft">Administrateur</h1>
                        <div class="dropcontainer">
                            <div class="dropdown">
                                <button class="dropbtn">Modifier un test</button>
                                    <div class="dropdown-content">
                                        <?php 
                                        for ($i = 0; $i < count($idstest); $i++) {
                                            echo '<a href="index.php?action=edittest&idtest='.$idstest[$i].'">'.$descriptions[$i].'</a>';
                                        }
                                        ?>
                                        <a href="index.php?action=newtest"> Nouveau test </a>
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
                        </table>
                            <ul>
                                <li class="button resetpasswordbutton"><a class="whitelink" href="index.php?action=editadminprofile">Editer mon profile</a></li>
                            </ul>
                    </div>
                    <div class="imagecontainer">
                        <img class="profileimage" src="../<?=$picture?>" height=200px>
                        <form action="index.php?action=updateimage" method="post" enctype="multipart/form-data">
                            Changer la photo
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?></span>
                    </div>
                </div>
                <div class="push"></div>
                <?php include("viewfooterShort.php") ?>
            </div>
         </div>
    </body>
    
</html>