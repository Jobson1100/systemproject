<?php

// Connect to your database (replace with your credentials)
$connection = new mysqli("localhost", "root", "", "project");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// Assign validating functions
if(isset($_POST['submit']))
    {
        $record_id = filter_var($_POST['record_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
        // VALIDATION
        if(!$record_id)
        {
            $_SESSION['progress-success'] = "* Enter the record ID first!!";
        }

      

    // Get data from the form
    $record_id = $_POST['record_id'];
    $success = $_POST['success'];
    $incomplete = $_POST['incomplete'];
    $not_started = $_POST['not_started'];
    $on_hold = $_POST['on_hold'];

      // BACK TO SIGNUP
      if(isset($_SESSION['progress']))
      {
          // KEEPING DATA
          $_SESSION['progress-data'] = $_POST;

          header('location: view_progress.php');
          die();
      }

    // Update the progress for the specified record ID
    $sql = "UPDATE progress SET 
        percentages = CASE indexes
            WHEN 'success' THEN ?
            WHEN 'incomplete' THEN ?
            WHEN 'not_started' THEN ?
            WHEN 'on_hold' THEN ?
            ELSE percentages
        END
        WHERE record_id = ?";
    $stmt = $connection->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $connection->error);
}

$stmt->bind_param("ddddd", $success, $incomplete, $not_started, $on_hold, $record_id);



if ($stmt->execute()) {
    $_SESSION['progress-success'] = "Chart updated successfully";
    mysqli_close($connection);
    
    header('location: view_progress.php');
}

    else {
            echo "Error updating progress: " . $stmt->error;
        }
}
// Close the database connection
$stmt->close();
$connection->close();
?>
