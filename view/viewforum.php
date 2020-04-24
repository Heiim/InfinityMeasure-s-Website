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
                <li class="button"><a class="whitelink" href="index.php?action=userprofile">Mon compte</a></li>
                <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
            </ul>
        </div>
    </header>

	<body>
        <div class="topicscontainer">
            <div class="topicwrapper">
                <?php for ($i = 0; $i < count($dates); $i++) {?>
                    <a href="index.php?action=viewtopic&id=<?= $idtopics[$i] ?>">
                        <div class="topic">
                            <span class="name"><?= $titles[$i]?></span>
                            <span class="date">Dernier message : <?= $dates[$i]?></span>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <div>
                <form style="margin-bottom: 30px;" action="index.php?action=newtopic" method="post" autocomplete="off">
                    <div>
                        <label class="goodsize" for="content">Nouveau sujet : </label>
                    </div>
                    <div style="margin-top: 7px;">
                        <label style="font-size: 18px;" for="title">Titre : </label>
                        <input class="titleinput" name="title" id="title" required>
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
        </div>

        
        

    </body>
    
</html>