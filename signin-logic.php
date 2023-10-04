<?php
    require 'database.php';

    // SIGNING FUNCTION
    if(isset($_POST['submit']))
    {
        // Getting User Data from Database
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!$email)
        {
            $_SESSION['signin'] = "* User credetials required";
        }

        elseif(!$password)
        {
            $_SESSION['signin'] = "* Password required";
        }

        else
        {
            // FETCHING USERS
            $fetch_user = "SELECT * FROM client WHERE email='$email'";
            $fetch_result = mysqli_query($connection, $fetch_user);

            if(mysqli_num_rows($fetch_result) == 1)
            {
                // CONVERTING RECORDS
                $user_record = mysqli_fetch_assoc($fetch_result);
                $db_password = $user_record['password'];

                // COMPARING PASSWORDS
                if(password_verify($password, $db_password))
                {
                    // ACCESS CONTROL SESSION
                    $_SESSION['user_id'] = $user_record['userID'];

                    // // ADMIN USER SESSION
                    if($user_record['role'] == 1)
                    {
                         $_SESSION['admin'] = true;
                            // ADMIN USER LOCATION
                            header('location: view_clients.php');
                    }
                    else
                    {
                        // USER LOCATION
                            header('location: home.php');
                    }
                }

                else
                {
                    $_SESSION['signin'] = "* Wrong password";
                }
            }

            else
            {
                $_SESSION['signin'] = "* Email account not found";
            }
        }

        // SIGNING PAGE LOCATION
        if(isset($_SESSION['signin']))
        {
            $_SESSION['signin-data'] = $_POST;

            header('location: login.php');
            die();
        }
    }

    else
    {
        header('location: login.php');
    }
?>