<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>QUOTATION</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">

    <style>

    .hidden {
    display: none;
    }

    </style>
</head>

<body>
	<div class='row'>
		<div class='header'>
		<img id="log" src="logo.png"><h1>Engineering Project Management System</h1>
		</div>
	</div>

	
	
	<div class=row>

		<div class=col-12>
        <div id=budgets>
		<h1>Quotation</h1> <br>
		<table>
        <tr>
            <th>Item</th>
            <th>Duration</th>
            <th>Cost (MK)</th>
			<th>Description</th>
        </tr>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$totalBudget = 0; // Initialize total budget

// Get the budget_id from the URL
$budget_id = $_GET['budget_id'];

// Create a prepared statement to retrieve quotations for the specified budget_id
$stmt = $conn->prepare("SELECT * FROM quotation WHERE quotation_id = ?");
if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind parameters
if (!$stmt->bind_param("i", $budget_id)) {
    die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
}

// Execute the prepared statement
if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
}

$result = $stmt->get_result();

// Display tasks
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["item"] . "</td>";
    echo "<td>" . $row["duration"] . "</td>";
    echo "<td>" . $row["cost"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "</tr>";
    $totalBudget += (float) $row['cost'];
}

echo '<tr>';
echo '<td colspan="5"></td>';
echo '<td><strong>Total Cost:</strong></td>';
echo '<td><strong>K' . $totalBudget . '</strong></td>';
echo '</tr>';

?>


		</table>
        <div class="buttons">
            <button id="accept"><a href="payment.php?totalBudget=<?php echo $totalBudget; ?>">Go to Payment</a></button>
            <button id="reject"> <a href="designs.php">Reject quotation</a></button>
        </div>
            <!-- Add a container to display the message box -->
            <!-- <div id="messageBox" class="hidden">
                <p>Do you want to accept the quotation?</p>
                <button id="yes">Yes</button>
                <button id="no">No</button>
            </div> -->
				
		</div>
	</div>
<!-- <script>
        // Get references to the elements
var acceptButton = document.getElementById("accept");
var messageBox = document.getElementById("messageBox");
var yesButton = document.getElementById("yes");
var noButton = document.getElementById("no");

// Add click event listener to the Accept button
acceptButton.addEventListener("click", function () {
    // Show the message box
    messageBox.classList.remove("hidden");
});

// Add click event listener to the Yes button in the message box
yesButton.addEventListener("click", function () {
    // Send an AJAX request to save "accept" to the user's session
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "saveAccept.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server (if needed)
            alert("Accepted: Yes");
            
    // Redirect to another page after clicking "Yes"
         window.location.href =  "payment.php?totalBudget=" + totalBudget; // Replace with the URL of the page you want to redirect to
        }
    };

    xhr.send("choice=accept");
});

// Add click event listener to the No button in the message box
noButton.addEventListener("click", function () {
    // Hide the message box
    messageBox.classList.add("hidden");
});

</script> -->

	
	
</body>
</html>