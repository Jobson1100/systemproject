<?php
// Database connection
require 'database.php';

if (isset($_POST['update'])) {
    // Retrieve task information
    $taskId = $_POST['task_id'];
    $taskname = filter_var($_POST['task_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $workers = filter_var($_POST['workers'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duration = filter_var($_POST['duration']);
    $date = filter_var($_POST['start_date']);
    $budget = filter_var($_POST['budget'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Update task in the database
    $updateQuery = "UPDATE tasks SET task_name='$taskname', status='$status', Worker='$workers', Duration='$duration', start_date='$date', budget='$budget' WHERE task_id='$taskId'";
    $result = mysqli_query($connection, $updateQuery);

    if ($result) {
        $_SESSION['assign-success'] = "Task updated successfully";
        mysqli_close($connection);
        header('location: tasks.php');
    } else {
        die(mysqli_error($connection));
    }
}

// Retrieve the task to edit
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $selectQuery = "SELECT * FROM tasks WHERE task_id='$taskId'";
    $taskResult = mysqli_query($connection, $selectQuery);
    $task = mysqli_fetch_assoc($taskResult);
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '	<meta charset="UTF-8">';
    echo '	<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '	<title>HOME</title>';
    echo '	<link rel="stylesheet" href="flexible.css"/>';
    echo '	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">';
    echo '</head>';
    echo '<body>';
    echo '	<div class="row">';
    echo '		<div class="header">';
    echo '			<img id="log" src=".png"><h1>Engineering Project Management System</h1>';
    echo '		</div>';
    echo '	</div>';
    
    echo '	<div class="row">';
    echo '		<div class="col-12">';
    echo '			<div id="nav">';
    echo '			<ul>';
    echo '					<li class="active"><a href="home_admin.php" ><i class="bx bxs-home"></i>HOME</a></li>';
    echo '					<li><a href="tasks.php"><i class="bx bxs-info-circle"></i>TASKS</a></li>';
    echo '					<li><a href="user_reviews.php"><i class="bx bx-comment-detail"></i>READ REVIEW</a></li>';
    echo '					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="bx bx-message"></i>EMAILS</a></li>';
    echo '					<li><a href="https://dashboard.tawk.to/#/dashboard/64ff5a2a0f2b18434fd7edb5"><i class="bx bx-message"></i>VIEW MESSAGES</a></li>';
    echo '					<li><a href="report.php"><i class="bx bx-objects-vertical-bottom"></i>REPORT</a></li>';
    echo '					<li><a href="logout-user.php"><i class="bx bxs-tree"></i>LOG OUT</a></li>';
    echo '				</ul>';
    echo '			</div>';
    echo '		</div>';
    echo '	</div>';
    echo '	<div class="row">';
    echo '		<div class="col-8">';

 // Display an HTML form for editing the task
    echo '<h2>Edit Task</h2>';
    echo '<form method="post" action="update_task.php">';
    echo '<input type="hidden" name="task_id" value="' . $task['task_id'] . '">';
    echo 'Task Name: <input type="text" name="task_name" value="' . $task['task_name'] . '" required><br>';
    echo 'Status: <input type="text" name="status" value="' . $task['status'] . '" required><br>';
    echo 'Workers: <input type="text" name="workers" value="' . $task['Worker'] . '" required><br>';
    echo 'Duration: <input type="text" name="duration" value="' . $task['Duration'] . '" required><br>';
    echo 'Start Date: <input type="text" name="start_date" value="' . $task['start_date'] . '" required><br>';
    echo 'Budget: <input type="text" name="budget" value="' . $task['budget'] . '" required><br>';
    echo '<input type="submit" name="update" value="Update Task">';
    echo '</form>';
echo '		</div>';
echo '	</div>';
echo '</body>';
echo '</html>';




            
   
} else {
    header('location: tasks.php');
    exit(); // Exit the script to prevent further execution
}
?>
