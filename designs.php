<?php
  require 'database.php';

  $fetch_data = "SELECT * FROM budget";
  $budgets_data = mysqli_query($connection, $fetch_data)

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CHOOSE BUDGET</title>
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
					<li><a href="home.php"><i class='bx bxs-home'></i>HOME</a></li>
					<li class="active"><a href=designs.php><i class='bx bxs-info-circle'></i>BUDGETS</a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li>
					<li><a href="review.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li><a href="contact.php"><i class='bx bx-message'></i></i>CONTACT</a></li>
					<li><a href="about.php"><i class='bx bx-swim'></i>ABOUT </a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php while($budget = mysqli_fetch_assoc($budgets_data)): ?>
	<div class=row>
		<div class=col-4>
		
        <div id=sites>
		

		<h1><i class='bx bx-money'></i>Choose Budget</h1> 
			<h2><span class="top-align" >from:</span>&nbsp;<?= $budget['budget_range'] ?></h2>
			<h2>Activities:</h2>
		<ul class="points">
			
              <li><span class="fa fa-check"></span> <?= $budget['activities1'] ?></li>
              <li><span class="fa fa-check"></span><?= $budget['activities2'] ?></li>
              <li><span class="fa fa-check"></span><?= $budget['activities3'] ?></li>
              <li><span class="fa fa-check"></span><?= $budget['activities4'] ?></li>
		</ul>
		<button id="#generate-button1"><a href="quotation1.php?budget_id=<?= $budget['id'] ?>">Generate Quotation</a></button>
			
          <!-- END TAG OF BUDGET CARD -->
		</div>
		
				<div class="loading-container" id="loading-container">
        <div class="spinner"></div>
        	 <p class="loading-text">Generating, please wait...</p>
   		</div>

		<script src="script.js"></script>
			
		</div>
		<?php endwhile ?>
	</div>
	</div>
	
   
	
</body>

</html>