<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CONTACT</title>
	<link rel="stylesheet" href="addition.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
</head>

<body>
	<div class='row'>
		<div class='header'>
			<h1>Engineering Project Management System</h1>
		</div>
	</div>

	<div class='row'>
		<div class='col-12'>
			<div id='nav'>
			<ul>
					<li><a href="home.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=designs.php><i class='bx bxs-info-circle'></i>GET STARTED</a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li>
					<li><a href="review.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li class="active"><a href="contact.php"><i class='bx bx-message'></i></i>CONTACT</a></li>
					<li><a href="about.php"><i class='bx bx-objects-vertical-bottom'></i>ABOUT </a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-4'>

		</div>

		<div class='col-4'>
			<div id="contact">
				<h3>CONTACT US</h3>
				<form action="https://formspree.io/f/xeqbkdke" method="POST">
					<input type="name" name="name" placeholder='Full name' autofocus required />
					<br>
					<br>
					<input type="email" name="email" placeholder="Your email" required></textarea>
					<br>
					<br>
					<textarea name="messaging" placeholder="Write message" required></textarea>
					<br>
					<br>
					<input type="submit" name="submit" value="SEND" />
				</form>
				<br>
			<!-- 	<button id="btnlog"><a href="logout-user.php">LOG OUT</a></button> -->
			</div>
		</div>

		<div class='col-4'>

		</div>
	</div>

	
</body>

</html>