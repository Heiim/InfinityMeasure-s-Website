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
</header>

<body>
    <div class="wrapper">
        <div>
            <div class="clearing registerformcontainer">
                <h1 style="margin-left:335px;" class="pageinfoh1">Créer un compte gestionnaire</h1>
                <div class="registerform">
                    <script src="public/scripts/formscript.js"></script>
                    <script src="public/scripts/passlength.js"></script>
                    <form action="index.php?action=domanagerregister" method="post" autocomplete="off">
                        <div>
                            <label for="lastn">Nom</label>
                            <input type="text" name="lastn" id="lastn" required>
                        </div>
                        <div>
                            <label for="firstn">Prénom </label>
                            <input type="text" name="firstn" id="firstn" required>
                        </div>
                        <div>
                            <label for="email">Adresse email </label>
                            <input type="email" name="email" id="email" value="<?=$_GET['email']?>" required>
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
                            <label for="company_code">Code entreprise</label>
                            <input type="text" name="company_code" id="company_code" value="<?=$_GET['company_code']?>" required>
                        </div>
                        <div>
                            <label for="cgu">J'ai lu et j'accepte les <a style="color: blue;" href="index.php?action=cgu">CGU</a> </label>
                            <input type="checkbox" name="cgu" value="cgu" required>
                        </div>
                        <div>
                            <input type="hidden" name="token" id="token" value="<?=$_GET['token']?>" required>
                        </div>
                        <div>
                            <input type="submit" value="S'inscrire">
                        </div>
                    </form>
                </div>

                <div class="push"></div>

                <?php include(__DIR__."/../viewfooterLong.php") ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>