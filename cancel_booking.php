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

// Delete the booking if it belongs to the logged-in user
$update_sql = "UPDATE client SET project_name = 'Not available', budget = 'Not selected', appointment_date = NULL WHERE userID = '$user_id'";

if ($connection->query($update_sql) === TRUE) {
    $_SESSION['cancel-success'] = "Cancelled successfully";
    mysqli_close($connection);
    
    header('location: view_bookings.php');    // echo "Booking has been canceled.";
} else {
    echo "Error canceling the booking: " . $connection->error;
}

$connection->close();
?>
