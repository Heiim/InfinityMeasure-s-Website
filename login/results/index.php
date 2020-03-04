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
          title: 'Score reconnaissance de tonalité',
          vAxis: {title: 'Score'},
          min: 0,
          max: 10,
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
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
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