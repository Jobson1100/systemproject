<?php
   

    // DATABASE CONNECTION
    require 'database.php';

    // FORM SUBMISION
    if(isset($_POST['submit']))
    {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $project_name = filter_var($_POST['project-name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $report = filter_var($_POST['report-text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       

        // VALIDATION
        if(!$name)
        {
            $_SESSION['report-in'] = "* Enter client name";
        }

        elseif(!$project_name)
        {
            $_SESSION['report-in'] = "* Enter the project name";
        }

        elseif(!$report)
        {
            $_SESSION['report-in'] = "* Enter your report";
        }

        else
        {

         

            // VALIDATING CREDETIALS
            $checking_users = "SELECT * FROM reports WHERE name='$name'";

            $output = mysqli_query($connection, $checking_users);

            if(mysqli_num_rows($output) == 1)
            {
                $_SESSION['report-in'] = "* Client's report already exist";
            }
        }

        // BACK TO SIGNUP
        if(isset($_SESSION['report-in']))
        {
            // KEEPING DATA
            $_SESSION['report-in-data'] = $_POST;

            header('location: report.php');
            die();
        }
    
        else
        {
            // REGISTRATION
            $inserting_data = "INSERT INTO reports (name, project_name, report_text) VALUES('$name', '$project_name', '$report')";

            $results = mysqli_query($connection, $inserting_data);

            if(!mysqli_errno($connection))
            {
                // SIGNUP SUCCESS
                $_SESSION['report-in-success'] = "Saved successfully";
                mysqli_close($connection);

                header('location: report.php');
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
        $_SESSION['report-in'] = "* Saving failed";
        header('location: report.php');
        die();
    }
?>