<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CLIENTS</title>
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
    }

    .client-item:hover {
        background-color: brown;
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
					<!-- <li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li> -->
					<li class="active"><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS AND APPOINTMENTS</a></li>
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
    
        <div class='col-12'>
    <h2>Clients</h2>

        <?php
        // Assuming you have a database connection established
        $servername = "localhost"; // Replace with your database server hostname
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $database = "project"; // Replace with your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        // Replace 'your_table_name' with the actual name of your client table
        $sql = "SELECT full_name, project_name, appointment_date, budget FROM client WHERE role=0";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fullName = $row["full_name"];
                $projectName = $row["project_name"];
                $appointmentDate = $row["appointment_date"];
                $budget = $row["budget"];

                echo "<div class='client-item' onclick='redirectToPage()'>";
                echo "<h3>$fullName</h3>";
                echo "<p id='project-name'><strong>Project Name:</strong> $projectName</p>";
                echo "<p><strong>Appointment Date:</strong> $appointmentDate</p>";
                echo "<p><strong>Customer Budget: MK</strong> $budget</p>";
                echo "</div>";
                echo "<script>
                function redirectToPage() {
                    // Redirect to another page
                    window.location.href = 'tasks.php';
                }
                </script>";
            }
        } else {
            echo "<tr><td colspan='4'>No clients found</td></tr>";
        }

        // Close your database connection here if needed
        ?>

    </table>
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