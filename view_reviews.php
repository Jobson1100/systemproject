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
        margin: auto;
        margin-top: 15px;
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
					<li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=tasks.php><i class='bx bxs-info-circle'></i>TASKS</a></li>
					<li><a href="view_clients.php"><i class='bx bxs-cog'></i>VIEW CLIENTS</a></li>
                    <li class="active"><a href="view_reviews.php"><i class='bx bxs-cog'></i>READ REVIEWS</a></li>
					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class='bx bx-message'></i></i>EMAILS</a></li>
					<li><a href="https://dashboard.tawk.to/#/dashboard/64ff5a2a0f2b18434fd7edb5"><i class='bx bx-message'></i></i>VIEW MESSAGES</a></li>
					<li><a href="report.php"><i class='bx bx-objects-vertical-bottom'></i>REPORT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class='row'>
		
    
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

	</div>

	    </div>

</body>

</html>