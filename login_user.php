<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["user_email"];
$password = $_POST["user_password"];

$sql = "SELECT * FROM camp WHERE email='$email' && password='$password'";

$result = mysqli_query($conn, $sql);
//Authenticate a user
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	//login the user by putting their id in session
	$_SESSION["user_id"] = $row["id"];
	setcookie("user_id", $row["id"], time() + (3600 * 24 * 7));
	$_SESSION["Invalid_credentials"] =  false;
	//setcookie("user_id"), $row["id"], time()+(3600*24*7); 
	//After successful login redirect the user to the posts page
	header("Location: contact.php");
	die();
} else {
	// $_SESSION["isloggedin"] = False;
	$_SESSION["invalid_credentials"] =  "Sorry invalid credentials";
	// $_SESSION["num_login_fail"] =  True;
	header("Location: login.php");
	echo "Error: Sorry invalid credentials " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>