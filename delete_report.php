<?php
// Add your database connection code here

if (isset($_GET['id'])) {
    $report_id = $_GET['id'];

    // Perform the deletion query based on the $report_id
    $delete_query = "DELETE FROM reports WHERE id = $report_id";
    $result = mysqli_query($connection, $delete_query);

    if ($result) {
        // Report deleted successfully
        header('Location: reports.php'); // Redirect back to the reports page
        exit;
    } else {
        // Handle the deletion error, if any
        echo "Error deleting report: " . mysqli_error($connection);
    }
} else {
    // If the report ID is not provided in the URL, handle the error accordingly
    echo "Report ID not provided.";
}

// Close the database connection
mysqli_close($connection);
?>
