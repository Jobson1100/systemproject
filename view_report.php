<?php
  require 'database.php';

  $fetch_data = "SELECT * FROM reports";
  $reports_data = mysqli_query($connection, $fetch_data)
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>REPORTS</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
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
					<li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=tasks.php><i class='bx bxs-info-circle'></i>TASKS</a></li>
					<li><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS</a></li>
					<li class="active"><a href="view_reviews.php"><i class='bx bx-comment-detail'></i>READ REVIEWS</a></li>	
					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class='bx bx-message'></i></i>EMAILS</a></li>
					<li><a href="https://dashboard.tawk.to/#/chat"><i class='bx bx-message'></i></i>MESSAGES</a></li>
					<li><a href="report.php"><i class='bx bx-objects-vertical-bottom'></i>REPORT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
	<?php while($report = mysqli_fetch_assoc($reports_data)): ?>
		<div class=row>
		<div class=col-8>
            <div class="reports">
			<button id="delete_report"><a href="delete_report.php?id=<?= $report["id"] ?>">Delete</a></button> <!-- Add Delete link -->
                <div class="name">
                Client name:  <?= $report['name'] ?> 
                </div>
            <div class="project-name">
            Project_name: <?= $report['project_name'] ?>
            </div>
				<div class="report-area">
				<?= nl2br($report['report_text']) ?> 
				</div>
              <br>
              
            </div>

          
			
					
		</div>
		<?php endwhile ?>
       

				
					
	
	</div>

	</div>
	</div>
	</div>

</body>

</html>