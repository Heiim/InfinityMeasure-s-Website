<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../quirky.css">
    </head>

    <header>
    <div>
        <div class="logo">
            <a href="../home.html"><img src="../images/LogoNoName.png" width=100%x height=100%>
        </div>
        <p class="name">quirky()</p>
    </div>
    <div class="connection">
        <ul>
            <li class="connectbutton"><a class="whitelink" href="prpfile.php">Mon compte</a></li>
            <li class="connectbutton"><a class="whitelink" href="logout.php">Déconnexion</a></li>
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
        </div>
    </body>
    
<footer>
    <ul>
        <li class="button"><a href="cgu.html">CGU</a></li>
        <li class="button"><a href="contact.html">Nous contacter</a></li>
        <li class="button"><a href="faq.html">FAQ</a></li>
        <li class="button"><a href="forum.html">Forum</a></li>
    </ul>
</footer>

</html>