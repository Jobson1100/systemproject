<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOME</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">

    <style>

.review {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        display: grid;
        width: 650px;
    }

    /* Style for the name */
    .review h3 {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 5px;
    }

    /* Style for the review text */
    .review p {
        font-size: 1rem;
        color: #666;
        line-height: 1.1;
        margin-right: 90%;
    }


    /* Style for the submit button */
    button[type="submit"] {
        background-color: #007bff; /* Change to your desired button color */
        color: #fff; /* Text color for the button */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Hover effect for the button */
    button[type="submit"]:hover {
        background-color: #0056b3; /* Change to a darker shade for hover effect */
    }
</style>

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
					<li><a href="home.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=designs.php><i class='bx bxs-info-circle'></i>GET STARTED</a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li>
					<li class="active"><a href="review.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li><a href="contact.php"><i class='bx bx-message'></i></i>CONTACT</a></li>
					<li><a href="about.php"><i class='bx bx-objects-vertical-bottom'></i>ABOUT </a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class='row'>
		<div class='col-4'>
			
        <?php
    session_start();

 // Database configuration
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "project";
 
 // Create a database connection
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Check the connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 
    

// and the user is logged in, retrieve the user's name from the database
$userId = $_SESSION["user_id"]; // Adjust this based on your session variable
$sql = "SELECT full_name FROM client WHERE userID = $userId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userName = $row["full_name"];
} else {
    $userName = "Guest"; // Use a default name if the user is not found
}
?>

<form method="post" action="add_review.php">
    <label for="review">Your Review:</label>
    <textarea id="review" name="review" rows="5" required></textarea>
    <input type="hidden" name="userName" value="<?php echo $userName; ?>">
    <button type="submit">Submit Review</button>
</form>

        </div>
    
        <div class='col-8'>

        <?php
        
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);
// Retrieve reviews from the database
$sql = "SELECT user_name, review_text FROM reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userName = $row["user_name"];
        $reviewText = $row["review_text"];
        echo "<div class='review'>";
        echo "<h3><strong>Name:</strong>$userName</h3>";
        echo "<p><strong>Review:</strong> $reviewText</p>";
        echo "</div>";
    }
} else {
    echo "No reviews found.";
}
?>

        </div>


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

</body>

</html>