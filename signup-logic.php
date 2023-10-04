<?php
   

    // DATABASE CONNECTION
    require 'database.php';

    // FORM SUBMISION
    if(isset($_POST['submit']))
    {
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       

        // VALIDATION
        if(!$fullname)
        {
            $_SESSION['signup'] = "* Enter your fullname";
        }

        elseif(!$email)
        {
            $_SESSION['signup'] = "* Enter valid email address";
        }

        elseif(!$password)
        {
            $_SESSION['signup'] = "* Enter password";
        }

        else
        {

            // PASSWORD HARSHING
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // VALIDATING CREDETIALS
            $checking_users = "SELECT * FROM client WHERE full_name='$fullname' OR email='$email'";

            $output = mysqli_query($connection, $checking_users);

            if(mysqli_num_rows($output) == 1)
            {
                $_SESSION['signup'] = "* Some credetials already exist";
            }
        }

        // BACK TO SIGNUP
        if(isset($_SESSION['signup']))
        {
            // KEEPING DATA
            $_SESSION['signup-data'] = $_POST;

            header('location: register.php');
            die();
        }
    
        else
        {
            // REGISTRATION
            $inserting_data = "INSERT INTO client (full_name, email, password, role) VALUES('$fullname', '$email', '$hashed_password', 0)";

            $results = mysqli_query($connection, $inserting_data);

            if(!mysqli_errno($connection))
            {
                // SIGNUP SUCCESS
                $_SESSION['signup-success'] = "Registration successful, try Login in";
                mysqli_close($connection);

                header('location: login.php');
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
        header('location: register.php');
        die();
    }
?>