<?php
session_start();
	// FORM DATA
    $record_id = $_SESSION['progress-data']['record_id'] ?? null;
	$success = $_SESSION['progress-data']['success'] ?? null;
	$incomplete = $_SESSION['progress-data']['incomplete'] ?? null;
	$not_started = $_SESSION['progress-data']['not_started'] ?? null;
	$on_hold = $_SESSION['progress-data']['on_hold'] ?? null;
	
	unset($_SESSION['progress-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CLIENT PROGRESS</title>
	<link rel="stylesheet" href="flexible.css"/>
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
	<div class='row'>
		<div class='header'>
			<img id="log" src=".png"><h1>Engineering Project Management System</h1>
		</div>
	</div>

	<div class='row'>

		<div class='col-12'>
			<div id='nav'>
            <ul>
					<!-- <li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li> -->
					<li class="active"><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS AND APPOINTMENTS</a></li>
					<li><a href="view_reviews.php"><i class='bx bx-comment-detail'></i>REVIEWS</a></li>	
					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class='bx bx-message'></i></i>EMAILS</a></li>
					<li><a href="https://dashboard.tawk.to/#/chat"><i class='bx bx-message'></i></i>MESSAGES</a></li>
					<li><a href="report.php"><i class='bx bx-objects-vertical-bottom'></i>REPORT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class='row'>
		<div class='col-4'>

		</div>
			<div class="col-8">
				<h2>Progress Tracking</h2>
			<div id="container"></div>

		</div>
		<?php 
	      // Assuming you have a database connection established
          $servername = "localhost"; // Replace with your database server hostname
          $username = "root"; // Replace with your database username
          $password = ""; // Replace with your database password
          $database = "project"; // Replace with your database name
  
        // Create a connection to the database
        $connection = new mysqli($servername, $username, $password, $database);
        
        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
        $query = "SELECT * FROM progress ";
		$getData = $connection->query($query);
		?>
		<script>
            
	// Build the chart
	Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Doughnut Chart, 2023',
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Progress',
        colorByPoint: true,
        data: [
			<?php 
				$data = '';
				if ($getData->num_rows>0){
					while ($row = $getData->fetch_object()){
						$data.='{ name:"'.$row->indexes.'", y:' .$row->percentages.'},';
					}
				}

				echo $data;

				?>
        //     name: 'Chrome',
        //     y: 74.77,
        //     sliced: true,
        //     selected: true
        // },  {
        //     name: 'Edge',
        //     y: 12.82
        // },  {
        //     name: 'Firefox',
        //     y: 4.63
        // }, {
        //     name: 'Safari',
        //     y: 2.44
        // }, {
        //     name: 'Internet Explorer',
        //     y: 2.02
        // }, {
        //     name: 'Other',
        //     y: 3.28
        ]
    }]
});
	</script>
	

		</div>

	</div>


</div>

</body>

</html>