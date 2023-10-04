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

// Get user input
$project_name = $_POST['project_name'];
$appointment_date = $_POST['appointment_date'];

// Check if the selected time slot is available
$sql = "SELECT * FROM client WHERE appointment_date = '$appointment_date' and userID='$user_id'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
     // ASSIGN SUCCESS
     $_SESSION['already-booked'] = "Date already Booked. Choose another date";
     mysqli_close($connection);
     
     header('location: booking.php');
} 
else {
    // Insert the booking into the database
    $update_sql = "UPDATE client SET project_name = '$project_name', appointment_date = '$appointment_date' WHERE userID = '$user_id'";
    
    if ($connection->query($update_sql) === TRUE) {
          // ASSIGN SUCCESS
          $_SESSION['book-success'] = "Booking successfully";
          mysqli_close($connection);
          
          header('location: booking.php');
    } else {
        echo "Error: " . $insert_sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
