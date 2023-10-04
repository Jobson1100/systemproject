<?php
// Database connection
require 'database.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $deleteQuery = "DELETE FROM tasks WHERE task_id='$taskId'";
    $result = mysqli_query($connection, $deleteQuery);

    if ($result) {
        $_SESSION['assign-success'] = "Task deleted successfully";
        mysqli_close($connection);
        header('location: tasks.php');
    } else {
        die(mysqli_error($connection));
    }
}
