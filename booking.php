<?php
	session_start();
	

	// FORM DATA
    $taskname = $_SESSION['book-data']['task_name'] ?? null;
	$status = $_SESSION['book-data']['status'] ?? null;
	$worker = $_SESSION['book-data']['workers'] ?? null;
	$duration = $_SESSION['book-data']['duration'] ?? null;
	$date = $_SESSION['book-data']['start_date'] ?? null;
	$budget = $_SESSION['book-data']['budget'] ?? null;
	
	unset($_SESSION['book-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BOOK APPOINTMENT</title>
	<link rel="stylesheet" href="flexible.css"/>
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
					<!-- <li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li> -->
					<li><a href="review.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li><a href="contact.php"><i class='bx bx-message'></i></i>CONTACT</a></li>
                    <li><a href="view_bookings.php"><i class='bx bx-message'></i></i>VIEW BOOKING</a></li>
					<li><a href="about.php"><i class='bx bx-objects-vertical-bottom'></i>ABOUT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>


	<div class='row'>
	
	
		<div class="book_form">
        <?php 
        if(isset($_SESSION['book-error'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['book-error'];
                                unset($_SESSION['book-error']);
                            ?>
                        </p>
                    </div>
		<?php elseif
		(isset($_SESSION['book-success'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['book-success'];
                                unset($_SESSION['book-success']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
			
		<form method="post" action="book_appointment.php">
    <label for="project_name">Project Name:</label>
    <input type="text" name="project_name" required>
    <br>
    <label for="booking_datetime">Date and Time:</label>
    <input type="datetime-local" name="appointment_date" required><br>
    
    <input type="submit" value="Book Appointment">
</form>

	</div>	
	
	</div>

	</div>


</body>

</html>