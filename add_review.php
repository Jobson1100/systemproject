<?php
// database.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// and the form is submitted via POST

$userName = $_POST["userName"];
$reviewText = $_POST["review"];

// Insert the review into the database
$sql = "INSERT INTO reviews (user_name, review_text) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $userName, $reviewText);

    if ($stmt->execute()) {
        echo "Review submitted successfully.";
    } else {
        echo "Failed to submit review: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Failed to prepare the statement: " . $conn->error;
}

// Close your database connection here if needed
?>
