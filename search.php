<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "camping";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['search']) && isset($_GET['submit'])){


$search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$query = "SELECT * FROM places WHERE name LIKE '%$search%'";
$places = mysqli_query($conn, $query);
}
else{
    header('location: pitch_types.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOME</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
</head>

<body>
	<div class='row'>
		<div class='header'>
			<h1>Welcome to Global Wild Swimming and Camping Website</h1>
		</div>
	</div>

	<div class='row'>

		<div class='col-12'>
			<div id='nav'>
				<ul>
					<li><a href="home.php"><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href="information.php"><i class='bx bxs-info-circle'></i>INFORMATION</a></li>
					<li class="active"><a href="pitch_types.php"><i class='bx bx-swim'></i>PITCH TYPES </a></li>
					<li><a href="user_reviews.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURE</a></li>
					<li><a href="contacts.html"><i class='bx bx-message'></i></i>CONTACT</a></li>
					<li><a href="local_Attraction.php"><i class='bx bxs-tree'></i>LOCAL ATTRACTION</a></li>
				</ul>
			</div>
		</div>

	</div>
    <div class='row'>
        <h2>RESULTS FOR YOUR SEARCH</h2>
        <button><a href="pitch_types.php"> BACK</button>
    </div>

<div class='row'>
	<?php if(mysqli_num_rows($places)>0):?>
		<div class='col-12'>
		<?php while($place = mysqli_fetch_assoc($places)): ?>
			<div id="site">
			
				
				<img src = "http://localhost/dw_practice/login_user/img/<?= $place ['picture'] ?>">
				<h2><?= $place['name']?></h2>
				<h2><?= $place['description']?></h2>
				<button>BOOK NOW</button>
				
				<!-- <h3>This pitch type is located in Liwonde and it is covers 50 tents.</h3> -->
			</div>

			<?php endwhile ?>
			<?php else: ?>
				<div class = "row">
				<h1>NO RESULTS FOUND</h1>
			</div>
				<?php endif ?>

		</div>
