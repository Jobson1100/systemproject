<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>APPOINTMENT</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <style>
    /* CSS for client item */
    .client-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
        background-color: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center-align the content within the div */
        color: black;
    }

    .client-item h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    .client-item p {
        margin: 5px 0;
        color: #666;
    }

    .client-item #project-name{
        margin: 5px 0;
        color: #666;
        margin-right: 25%;
    }

    .client-item .client-details {
        display: flex;
        justify-content: space-between;
    }

    /* Style for the "No clients found" message */
    .no-clients {
        font-size: 16px;
        color: #888;
    }

   .row .col-8 #cancel-booking{
        padding: 5px;
        background-color: darkblue;
        margin-right: 15px;
        border-radius: 5px;
    }

       .row .col-8 #cancel-booking a{
 color: white;
 text-decoration: none;

    }

    .row .col-8 #cancel-booking:hover{
background-color: red;
color: darkblue;

    }

    .row .col-8 #back{
        padding: 5px;
        background-color: grey;
        margin-left: 15px;
        border-radius: 5px;
    }

    .row .col-8 #back a{
        color: white;
        text-decoration: none;
    }

    .row .col-8 #back:hover{
background-color: black;

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
					<li><a href=designs.php><i class='bx bxs-info-circle'></i>GET STARTED</a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li>
					<li><a href="review.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li><a href="contact.php"><i class='bx bx-message'></i></i>CONTACT</a></li>
                    <li class="active"><a href="view_bookings.php"><i class='bx bx-message'></i></i>VIEW BOOKING</a></li>
					<li><a href="about.php"><i class='bx bx-objects-vertical-bottom'></i>ABOUT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class='row'>
		
    
        <div class='col-8'>
        <?php
require_once('database.php'); // Include your database connection code

// Check if the user is logged in (you should implement user authentication)
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Get user ID from the session (assuming user authentication is implemented)
$user_id = $_SESSION['user_id'];

// Retrieve and display the user's bookings
$sql = "SELECT * FROM client WHERE userID = '$user_id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       
        echo "<div class='client-item'>";
        echo "Name: " . $row['full_name'] . "<br>";
        echo "Project Name: " . $row['project_name'] . "<br>";
        echo "Booking Date and Time: " . $row['appointment_date'] . "<br>";
        echo "Selected Budget: " . $row['budget'] . "<br>";
        echo "<hr>";
                // Check if this booking has been canceled successfully
                 // Check if this booking has been canceled successfully
        if (isset($_SESSION['cancel-success'])) {
            echo "<div class='alert_message error'>";
            echo "<p>";
            echo $_SESSION['cancel-success'];
            unset($_SESSION['cancel-success']);
            echo "</p>";
            echo "</div>";
        }

        echo "<button id='cancel-booking'><a href='cancel_booking.php'>Cancel Booking</a></button>";
        echo "<button id='back'><a href='booking.php'>Back</a></button>";
        echo "</div>";
    }
} else {
   // Set a session message
   $_SESSION['no-bookings'] = "You have no bookings yet.";
    
   // Display the message
   echo $_SESSION['no-bookings'];}

$connection->close();
?>

        </div>

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