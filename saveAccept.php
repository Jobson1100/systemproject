<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in; handle accordingly (e.g., redirect to login page)
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'accept') {
        // Save "accept" in the database for the logged-in user
        $user_id = $_SESSION['user_id'];

        // Create a database connection (replace with your database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the "accept" value into the database
        $sql = "INSERT INTO accepted_quotations (user_id, action) VALUES (?, 'accept')";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            // Successfully saved "accept" in the database
            echo json_encode(array('status' => 'success'));
        } else {
            // Failed to save in the database
            echo json_encode(array('status' => 'error', 'error' => $conn->error));
        }

        $stmt->close();
        $conn->close();
    } else {
        // Invalid action
        echo json_encode(array('status' => 'invalid_action'));
    }
} else {
    // Invalid request method
    echo json_encode(array('status' => 'invalid_request'));
}
?>
