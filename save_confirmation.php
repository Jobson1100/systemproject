<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the user's ID from the client
    $userId = $_POST["userID"];
    // Retrieve the confirmation text sent by the client
    $confirmationText = $_POST["confirmationText"];

    // Database connection (adjust with your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the confirmation text into the user's account based on their ID
    $sql = "UPDATE client SET confirmation_text = ? WHERE userID = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $confirmationText, $userId);

        if ($stmt->execute()) {
            echo "Confirmation message saved.";
        } else {
            echo "Failed to save confirmation message: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
