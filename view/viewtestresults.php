<html>
    <head>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="icon" type="image/png" href="public/images/infinitelogo.png" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Date',  'Score'],
            <?php 
                for ($i = 0; $i < count($results); $i++) {
                    echo "['".$dates[$i]."',".$results[$i]."],";
                }
                ?> 
            ]);

            var options = {
            title: '<?php echo $description ?>' ,
            vAxis: {title: '<?php echo "Score " .'('. $unit .')' ?>'},
            min: <?php echo $min?> ,
            max: <?php echo $max?> ,
            legend: {position: 'none'} ,
            title: {position: 'none'} ,
            'chartArea': {'width': '80%', 'height': '90%'}
            };

            var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
        </script>
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
            <li class="button"><a class="whitelink" href="index.php?action=userprofile">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="index.php?action=logout">Déconnexion</a></li>
        </ul>
        <?php include("viewloggednotice.php") ?>
    </div>
</header>

	<body>
    <div class="chartitle"><h2><?php echo $description ?></h2></div>
    <?php if (empty($results)) { ?>
        <div class="chartitle"><h3> Aucun résultat </h3></div>
    <?php } else { ?>
        <div id="chart_div" class="chart"></div>
    <?php } ?>
    
    <div class="push"></div>
    <?php include("viewfooterShort.php") ?>
    </body>
    


</html>