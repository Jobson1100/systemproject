<?php
//Database connection
require 'database.php';

// Assign validating functions
if(isset($_POST['submit']))
    {
        $taskname = filter_var($_POST['task_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $workers = filter_var($_POST['workers'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $duration = filter_var($_POST['duration']);
        $date = filter_var($_POST['start_date']);
        $budget = filter_var($_POST['budget'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
       

        // VALIDATION
        if(!$taskname)
        {
            $_SESSION['assign'] = "* Enter task name";
        }

        elseif(!$status)
        {
            $_SESSION['assign'] = "* Enter status";
        }

        elseif(!$workers)
        {
            $_SESSION['assign'] = "* Enter the workers for the task";
        }
        
        elseif(!$duration)
        {
            $_SESSION['assign'] = "* Enter the duration for the task";
        }

        elseif(!$date)
        {
            $_SESSION['assign'] = "* Enter starting date";
        }

        elseif(!$budget)
        {
            $_SESSION['assign'] = "* Enter the task's budget";
        }
       
        else
        {


            // VALIDATING CREDETIALS
            $checking_users = "SELECT * FROM tasks WHERE task_name='$taskname' ";

            $output = mysqli_query($connection, $checking_users);

            if(mysqli_num_rows($output) == 1)
            {
                $_SESSION['assign'] = "* Task already exist";
            }
        }

        // BACK TO SIGNUP
        if(isset($_SESSION['assign']))
        {
            // KEEPING DATA
            $_SESSION['assign-data'] = $_POST;

            header('location: tasks.php');
            die();
        }
    
        else
        {
            // INSERTING TASK
            $inserting_data = "INSERT INTO tasks (task_name, status, Worker, Duration, start_date, budget) VALUES('$taskname', '$status', '$workers', '$duration','$date', '$budget')";

            $results = mysqli_query($connection, $inserting_data);

            if(!mysqli_errno($connection))
            {
                // ASSIGN SUCCESS
                $_SESSION['assign-success'] = "Task assigned successfully";
                mysqli_close($connection);
                
                header('location: tasks.php');

            }

            else
            {
                die(mysqli_error($connection));
            }
        }
    }

    else
    {
        // COMMAND FAILED
        header('location: report.php');
        die();
    }

//        // Get tasks from database
//        $sql = "SELECT * FROM tasks";
//        $result = $conn->query($sql);
//        // Display tasks
//        while ($row = $result->fetch_assoc()) {
//          echo "<tr>";
//          echo "<td>" . $row["task_name"] . "</td>";
//          echo "<td>" . $row["budget"] . "</td>";
//          echo "<td>" . $row["task_status"] . "</td>";
//          echo "<td><a href=\"edit_task.php?id=" . $row["task_id"] . "\">Edit</a> | <a href=\"delete_task.php?id=" . $row["task_id"] . "\">Delete</a></td>";
//          echo "</tr>";


// ?>

