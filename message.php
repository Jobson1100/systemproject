<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="stylesheet" href="flexible.css"/>
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

    $Name = mysqli_real_escape_string($conn, $_POST["user_name"]);
    $messages = mysqli_real_escape_string($conn, $_POST["messaging"]);

    $sql = "INSERT INTO message (name, messages) VALUES ('$Name','$messages')";

    //Execute the sql
    if (mysqli_query($conn, $sql)) {
        //This block will execute if data was successfully inserted into the database
       echo "<div class='row'>";
        echo "<div class='col-6'></div>";
        echo "<div class='col-6'>";
        echo "<a href='home.php'>Go back</a>";
        echo "</div>";
        echo "<div class='col-6'></div>";
        echo "</div>";
        echo "<p>Message sent successfully</p>";
    } 

    else {
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



