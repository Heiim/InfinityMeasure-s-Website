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
            <li class="button"><a class="whitelink" href="index.php?action=login">Connexion</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=register">Créer un compte</a></li>
        </ul>
    </div>
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <div class="registerform">
                    <h1 class="pageinfoh1">Créer un compte</h1>
                    <script src="public/scripts/formscript.js"></script>
                    <script src="public/scripts/passlength.js"></script>
                    <form action="index.php?action=doregister" method="post" autocomplete="off">
                        <div>
                            <label for="lastn">Nom</label>
                            <input type="text" name="lastn" id="lastn" required>
                        </div>
                        <div>
                            <label for="firstn">Prénom </label>
                            <input type="text" name="firstn" id="firstn" required>
                        </div>
                        <div>
                            <label for="birthday">Date de naissance </label>
                            <input type="date" name="birthday" id="birthday" required>
                        </div>
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div>
                            <label for="password">Mot de passe </label>
                            <input type="password" name="password" id="password" onkeyup='checkpassword(); checklength()' required>
                        </div>
                        <div>
                            <label for="confirmpassword">Confirmation</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" onkeyup='checkpassword();' required><span class="passworderror" id='passworderror'></span><span class="passworderror" id='passwordlength'></span>
                        </div>
                        <div>
                            <label for="size">Taille </label>
                            <input type="number" name="height" id="height" placeholder="cm" required>

                            <label for="size">Poids </label>
                            <input type="number" name="weight" id="weight" placeholder="kg" required>
                        </div>
                        <div>
                            <label>Genre</label>
                            <input type="radio" name="gender" value="Homme" required />
                            <label for="homme">Homme</label>
                            <input type="radio" name="gender" value="Femme" />
                            <label for="femme">Femme</label>
                            <input type="radio" name="gender" value="Autre" />
                            <label for="autre">Autre</label>
                        </div>
                        <div>
                            <label for="status">Statut professionel médical </label>
                            <input type="checkbox" name="status" value="gestionnairepending">
                        </div>
                        <div>
                            <input type="submit" value="S'inscrire">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <div class="gooter">
                    <ul>
                        <li class="button"><a class="whitelink" href="cgu.html">CGU</a></li>
                        <li class="button"><a class="whitelink" href="contact.html">Nous contacter</a></li>
                        <li class="button"><a class="whitelink" href="faq.html">FAQ</a></li>
                        <li class="button"><a class="whitelink" href="forum.html">Forum</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>