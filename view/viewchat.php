<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="public/style/messages.css">
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
        <li class="button"><a class="whitelink" href='<?php
            if($_SESSION['status']=="user"){
                echo 'index.php?action=userprofile';
            }else if ($_SESSION['status']=="admin"){
                echo 'index.php?action=adminprofile';
            }
        ?>'>Mon compte</a></li>
        <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
    </ul>
</div>
</header>

<body>
    <div class="discussioncontainer">
        <h1 class="pageinfoh1">Mes conversations</h1>
        <div class="discussionwraper">
            <?php 
            $ids=array_keys($idsolver);
            for ($i = 0; $i < count($idsolver); $i++) {
                // if the id is different from the user's one and he has a discussion with the user
                if ($ids[$i] != $_SESSION['id'] && (in_array($ids[$i], $idreceivers) || in_array($ids[$i], $idsenders))) {
                    echo nl2br('<div class="discussion"><a class="discussionlink" href="index.php?action=getmessages&id='.$ids[$i].'">' .$idsolver[$ids[$i]].'</a></div>');
                }
            }
            ?>
        </div>
        <div>
            <form action="index.php?action=sendmessage" method="post" autocomplete="off">
                <div>
                    <label class="goodsize" for="content">Nouveau message à: </label>
                    <select id="id" name="id">
                        <?php 
                            for ($i = 0; $i < count($idsolver); $i++) {
                                if ($ids[$i] != $_SESSION['id']) {
                                    echo nl2br('<option value="'.$ids[$i].'">'.$idsolver[$ids[$i]].'</option>');
                                }
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <input class="textareadisc" type="textarea" name="content" id="content" required>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</body>

</html>