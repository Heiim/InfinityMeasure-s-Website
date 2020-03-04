<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../../quirky.css">
        <link rel="icon" type="image/png" href="../../images/infinitelogo.png" />
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
            vAxis: {title: '<?php echo "Score " . $unit ?>'},
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
            <a href="../../home.html"><img src="../../images/infinitelogo.png" width=100%x height=100%>
        </div>
        <p class="name">Infinite Measures</p>
        </a>
    </div>
    <div class="connection">
        <ul>
            <li class="button"><a class="whitelink" href="profile.php">Mon compte</a></li>
            <li class="button"><a class="whitelink" href="logout.php">Déconnexion</a></li>
        </ul>
    </div>
</header>

	<body>
    <div class="chartitle"><h2><?php echo $description ?></h2></div>
    <div id="chart_div" class="chart"></div>
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