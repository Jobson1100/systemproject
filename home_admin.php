<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>
	<link rel="stylesheet" href="flexible.css" />
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
					<li class="active"><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS AND APPOINTMENTS</a></li>
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
			<?php if(isset($_SESSION['progress-success'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['progress-success'];
                                unset($_SESSION['progress-success']);
                            ?>
                        </p>
                    </div>
		<?php endif?>
		<form action="progress.php" method="POST">
        <label for="record_id">Record ID:</label><br>
        <input type="text" id="record_id" name="record_id"><br>
        <label for="success">Success:</label><br>
        <input type="text" id="success" name="success"><br>
        <label for="incomplete">Incomplete:</label><br>
        <input type="text" id="incomplete" name="incomplete"><br>
        <label for="not_started">Not started:</label><br>
        <input type="text" id="not_started" name="not_started"><br>
        <label for="on_hold">On Hold:</label><br>
        <input type="text" id="on_hold" name="on_hold">
        <br><br>
        <input type="submit" name="submit" value="Update Progress">
        <br>
    </form>
		
			</div>
			<div class="col-8">
				<h2>Doughnut Chart</h2>
			<div id="container"></div>

		</div>
		<?php 
		include 'database.php';
		$query = "SELECT * FROM progress ";
		$getData = $connection->query($query);
		?>
		<script>
	// Data retrieved from https://netmarketshare.com/
	// Build the chart
	Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Project Progress, 2023',
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
	
	<div class="row">

	</div>

	<div class='row'>
		<div id='footer'>

			<div id="footerNav">
			<li class="active"><a href="home.php" >HOME</a></li>
					<li><a href=designs.php>DESIGNS</a></li>
					<li><a href="feature.php">FEATURES</a></li>
					<li><a href="user_reviews.php">REVIEW</a></li>	
					<li><a href="contact.php">CONTACT</a></li>
					<li><a href="about.php">ABOUT </a></li>
					<li><a href="logout-user.php">LOG OUT</a></li>
			</div>


			<a href=""><i class='bx bxl-facebook-circle'></i></a>
			<a href=""><i class='bx bxl-twitter'></i></a>
			<a href=""><i class='bx bxl-whatsapp'></i></a>
			<a href=""><i class='bx bxl-instagram'></i></a>
			<a href=""><i class='bx bxl-tiktok'></i></a>
			
			<h3>Engineering Project Management System &copy;copyrightsreserved </h3>

		</div>

	</div>
	</div>

	    </div>
	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			myIndex++;
			if (myIndex > x.length) { myIndex = 1 }
			x[myIndex - 1].style.display = "block";
			setTimeout(carousel, 6000);
		}
	</script>

</body>

</html>