<?php

if (isset($_SESSION['loggedin'])) { ?>
    <p style="float:right; margin: 5px; font-size: 14px;"> Connecté en tant que : <?php if ($_SESSION['status']=='user') { echo "utilisateur"; } else if ($_SESSION['status']=='admin') { echo "administrateur"; } else if ($_SESSION['status']=='manager') { echo "gestionnaire"; } ?> </p>
<?php } ?>