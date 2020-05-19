<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="public/style/forum.css">
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
        <div><h1 class="titlefaq">Foire aux questions</h1></div>
    </div>

    <div class="push"></div>
    <div class="wrapper">
        <?php for ($i = 0; $i < count($questions); $i++) { ?>
            <div class="accor" id="question<?=$i?>">
                <a href="#question<?=$i?>"> <?=$questions[$i]?> </a>
                <ul>
                    <li><?=$answers[$i]?>
                    <?php if (isset($_SESSION['status']) && ($_SESSION['status']=='admin')) {?>
                        <a style="color: white; background-color: red; width: 130px; height: 32px; padding: 2px; margin: 4px;" class="whitelink" href="index.php?action=deletequestion&id=<?=$idqs[$i]?>">Supprimer</a>
                    <?php } ?>
                    </li>
                </ul>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['status']) && ($_SESSION['status']=='admin')) {?>
            <form style="margin-left: 150px; margin-bottom: 30px; margin-top: 150px; margin-bottom: 100px" action="index.php?action=newquestion" method="post" autocomplete="off">
                <div>
                    <label class="goodsize" for="content">Nouvelle question : </label>
                </div>
                <div style="margin-top: 7px;">
                    <label style="font-size: 18px;" for="title">Question : </label>
                    <input class="titleinput" name="question" id="question" maxlength="45" required>
                </div>
                <div>
                <textarea placeholder="Réponse" class="textareatopic" rows="6" cols="154" wrap="hard" name="answer" id="answer" maxlength="900" required></textarea> 
                </div>
                <input type="submit" value="Poster"> <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></span>
            </form>
        <?php } ?>

    </div>
</body>
</html>