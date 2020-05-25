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
                <a href="index.php"><img src="public/images/infinitelogo.png" width=100% height=100%>
            </div>
            <p class="name">Infinite Measures</p>
            </a>
        </div>
        <div class="connection">
            <ul>
                <li class="button"><a class="whitelink" href="index.php?action=login">Mon compte</a></li>
                <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
            </ul>
            <?php include("viewloggednotice.php") ?>
        </div>
    </header>

	<body>
        <ul>
            <li class="button"><a class="whitelink" href="index.php?action=forum">Retour au forum</a></li>
            <?php if ($_SESSION['status']=="admin")  {?> <div style=" float: left; padding-top:20px; padding-left:10px; padding-right:20px;"><a class="closebutton" href="index.php?action=deletetopic&id=<?=$_GET['id']?>">Supprimer le sujet</a></div><?php } ?> 
        </ul> 
        <h1 style="margin-left: 75px;"><?= $title ?></h5> 
        <div class="postscontainer">
            <?php for ($i = 0; $i < count($idposts); $i++) {
                $thedate = explode(" ", $dates[$i]);?>
                <div class="postcontainer">
                    <div class="userinfo">
                        <img src="<?=$imagesolver[$idaccounts[$i]]?>" width=136px height=136px>
                        <span class="username"><?= $idsolver[$idaccounts[$i]]?></span>
                    </div>
                    <div class="post">
                        <span class="postdate">Le <?= $thedate[0]?> à <?= $thedate[1]?> : <?php if ($_SESSION['status']=="admin")  {?><a style="margin-left: 850px; color: red;" href="index.php?action=deletepost&id=<?=$idposts[$i]?>&idtopic=<?=$_GET['id']?>">Supprimer</a> <?php } ?> </span>
                        <span class="content" ><?= $contents[$i]?></span>
                    </div>
                </div>
            <?php } ?>
            <?php if ($status == "open" ) { ?>
                <div>
                    <form style="margin-top:50px; margin-bottom: 30px; margin-left: 70px" action="index.php?action=newpost" method="post" autocomplete="off">
                        <div>
                            <label class="goodsize" for="content">Nouveau message : </label>
                            <input type="text" name="idtopic" id="idtopic" hidden="hidden" value=<?=$_GET['id']?> required>
                        </div>
                        <div>
                        <textarea class="textareatopic" rows="6" cols="154" wrap="hard" name="content" id="content" required></textarea> 
                        </div>
                        <input type="submit" value="Envoyer"> <span class="passworderrorlogin"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></span>
                    </form>
                    <script>
                    // code from https://stackoverflow.com/a/557227/12982078
                    
                        var lines = 1;

                        function getKeyNum(e) {
                            var keynum;
                            // IE
                            if (window.event) {
                                keynum = e.keyCode;
                                // Netscape/Firefox/Opera
                            } else if (e.which) {
                                keynum = e.which;
                            }

                            return keynum;
                        }

                        var limitLines = function (e) {
                            var keynum = getKeyNum(e);

                            if (keynum === 13) {
                                if (lines >= this.rows) {
                                    e.stopPropagation();
                                    e.preventDefault();
                                } else {
                                    lines++;
                                }
                            }
                        };

                        var setNumberOfLines = function (e) {
                            lines = getNumberOfLines(this.value);
                        };

                        var limitPaste = function (e) {
                            var clipboardData, pastedData;

                            // Stop data actually being pasted into div
                            e.stopPropagation();
                            e.preventDefault();

                            // Get pasted data via clipboard API
                            clipboardData = e.clipboardData || window.clipboardData;
                            pastedData = clipboardData.getData('Text');

                            var pastedLines = getNumberOfLines(pastedData);

                            // Do whatever with pasteddata
                            if (pastedLines <= this.rows) {
                                lines = pastedLines;
                                this.value = pastedData;
                            }
                            else if (pastedLines > this.rows) {
                                // alert("Too many lines pasted ");
                                this.value = pastedData
                                    .split(/\r\n|\r|\n/)
                                    .slice(0, this.rows)
                                    .join("\n ");
                            }
                        };

                        function getNumberOfLines(str) {
                            if (str) {
                                return str.split(/\r\n|\r|\n/).length;
                            }

                            return 1;
                        }

                        var limitedElements = document.getElementsByClassName('textareatopic');

                        Array.from(limitedElements).forEach(function (element) {
                            element.addEventListener('keydown', limitLines);
                            element.addEventListener('keyup', setNumberOfLines);
                            element.addEventListener('cut', setNumberOfLines);
                            element.addEventListener('paste', limitPaste);
                        });
                    </script>
                </div>
            <?php } else { ?>
                <div class="closednotice"><h3> Ce sujet est clos, vous ne pouvez plus y répondre</h3></div>
            <?php }?>
        </div>
    </body>
    
</html>