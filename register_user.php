<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="stylesheet" href="flexible.css" />
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "camping";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstname = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["user_email"]);
    $phonenumber = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $password = mysqli_real_escape_string($conn, $_POST["user_password"]);

// $user = mysqli_query($conn, "SELECT * FROM camp WHERE email = '$email'");

// if (mysqli_query_row($user) > 0){
//     echo "<p>Email already exists!!</p>";
// } 

// else{
    $sql = "INSERT INTO camp (firstname, lastname, email, phonenumber, password) VALUES ('$firstname', '$lastname', '$email', '$phonenumber','$password')";

    //Execute the sql
    if (mysqli_query($conn, $sql)) {
        //This block will execute if data was successfully inserted into the database
        /* echo "<div class='row'>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-4'>";
        
        echo "<a href='login.php'>Go to the login page</a>";
        echo "</div>";
        echo "<div class='col-4'></div>";
        echo "</div>";*/

        header("Location: login.php");
        echo "<p>You have successfully registered</p>";
    } else {
        echo "<div class='row'>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-4'>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "</div>";
        echo "<div class='col-4'></div>";
        echo "</div>";
    }

    mysqli_close($conn);
    ?>
</body>

</html>