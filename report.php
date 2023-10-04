<?php
	session_start();

	// FORM DATA
    $name = $_SESSION['report-in-data']['name'] ?? null;
	$project_name = $_SESSION['report-in-data']['project-name'] ?? null;
	$report = $_SESSION['report-in-data']['report-text'] ?? null;
	
	unset($_SESSION['report-in-data']);
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
		<img id="log" src="logo.png"><h1>Engineering Project Management System</h1>
		</div>
	</div>

	<div class='row'>
		<div class='col-12'>
			<div id='nav'>
			<ul>
					<li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=tasks.php><i class='bx bxs-info-circle'></i>TASKS</a></li>
					<li><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS</a></li>
					<li><a href="view_reviews.php"><i class='bx bx-comment-detail'></i>READ REVIEWS</a></li>	
					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class='bx bx-message'></i></i>EMAILS</a></li>
					<li><a href="https://dashboard.tawk.to/#/chat"><i class='bx bx-message'></i></i>MESSAGES</a></li>
					<li class="active"><a href="report.php"><i class='bx bx-objects-vertical-bottom'></i>REPORT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
	<section class="report-form">
	<div class=row>
		
		<div class=col-8>
			<h1>Engineering Project Report</h1>
			<?php if(isset($_SESSION['report-in'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['report-in'];
                                unset($_SESSION['report-in']);
                            ?>
                        </p>
                    </div>
		<?php elseif
		(isset($_SESSION['report-in-success'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['report-in-success'];
                                unset($_SESSION['report-in-success']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
					<form action="add_report" method="POST"> <!-- Change action attribute to your form processing script -->
					<label for="name">Client name:</label><br>
					<input type="text" id="name" name="name"><br>

					<label for="project-name">Project name:</label><br>
					<input type="text" id="project-name" name="project-name"><br>
					<label for="report-text">Report:</label><br>
					<textarea id="report-text" name="report-text" class="text-area" placeholder="Write your construction project report here..."></textarea>
					<button name="submit" type="submit" class="submit-button">Save</button>	
					<button class="submit-button"><a href="view_report.php">View Reports</a></button>	
				</form>
					
		</div>
				
					
	
		</div>
		</section>
	</div>
	</div>
	</div>

</body>

</html>