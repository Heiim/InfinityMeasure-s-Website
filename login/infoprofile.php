<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../quirky.css">
    </head>

    <header>
    <div>
        <div class="logo">
            <a href="../home.html"><img src="../images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="index.php">Connexion</a></li>
            <li class="button"><a class="whitelink" href="register.html">Créer un compte</a></li>
        </ul>
    </div>
</header>

	<body>
        <div class="clearing profilecontainer">
            <div class="profileinfo">
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
						<td class="champsinfo">Mot de passe:</td>
						<td>•••••••••••••</td>
                    </tr>
                    <tr>
						<td class="champsinfo">Date de naissance:</td>
						<td><?=$birthday?></td>
					</tr>
				</table>
            </div>
            <div class="imagecontainer">
                <img class="profileimage" src=<?=$picture?> height=200px>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Changer la photo
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo 'Erreur: '.$_GET['error']; ?></span>
            </div>
        </div>
    </body>
    
<footer>
    <ul>
        <li class="button"><a class="whitelink" href="cgu.html">CGU</a></li>
        <li class="button"><a class="whitelink" href="contact.html">Nous contacter</a></li>
        <li class="button"><a class="whitelink" href="faq.html">FAQ</a></li>
        <li class="button"><a class="whitelink" href="forum.html">Forum</a></li>
    </ul>
</footer>

</html>