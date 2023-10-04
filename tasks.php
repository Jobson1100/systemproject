<?php
	session_start();
	

	// FORM DATA
    $taskname = $_SESSION['assign-data']['task_name'] ?? null;
	$status = $_SESSION['assign-data']['status'] ?? null;
	$worker = $_SESSION['assign-data']['workers'] ?? null;
	$duration = $_SESSION['assign-data']['duration'] ?? null;
	$date = $_SESSION['assign-data']['start_date'] ?? null;
	$budget = $_SESSION['assign-data']['budget'] ?? null;
	
	unset($_SESSION['assign-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TASKS</title>
	<link rel="stylesheet" href="flexible.css"/>
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
</head>

<body>
	<div class='row'>
		<div class='header'>
			<img id="log" src=".png"><h1>Engineering Project Management System</h1>
		</div>
	</div>

	<div class='row'>

		<div class='col-12'>
			<div id='nav'>
			<ul>
					<li><a href="home_admin.php" ><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=tasks.php><i class='bx bxs-info-circle'></i>TASKS</a></li>
					<li  class="active"><a href="view_clients.php"><i class='bx bxs-cog'></i>CLIENTS</a></li>
					<li><a href="view_reviews.php"><i class='bx bx-comment-detail'></i>READ REVIEWS</a></li>	
					<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class='bx bx-message'></i></i>EMAILS</a></li>
					<li><a href="https://dashboard.tawk.to/#/dashboard/64ff5a2a0f2b18434fd7edb5"><i class='bx bx-message'></i></i>VIEW MESSAGES</a></li>
					<li><a href="report.php"><i class='bx bx-objects-vertical-bottom'></i>REPORT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>

	</div>


	<div class='row'>
		<div class='col-4'>
	<div id="assign">
					<?php if(isset($_SESSION['assign'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['assign'];
                                unset($_SESSION['assign']);
                            ?>
                        </p>
                    </div>
		<?php elseif
		(isset($_SESSION['assign-success'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['assign-success'];
                                unset($_SESSION['assign-success']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
			<form action="add_task.php" method="POST">
				<label for="task_name">Task Name:</label><br>
				<input type="text" id="task_name" name="task_name"><br>
				<label for="status">Status:</label><br>
				<input type="text" id="status" name="status"><br>
				<label for="workers">Workers:</label><br>
				<input type="text" id="worker" name="workers"><br>
				<label for="duration">Duration:</label><br>
				<input type="text" id="duration" name="duration"><br>
				<label for="workers">Start date:</label><br>
				<input type="date" id="userDate" name="start_date" class="date-input"><br>
				<label for="budget">Budget:</label><br>
				<input type="text" id="budget" name="budget"><br>
				<button id="btn-task"type="submit" name="submit">Assign Task</button>
				<button id="btn-to-progress"><a href="view_progress.php">View Progress</a></button>
			</form>
		  </div>
		</div>
	<div class="col-8">
		<table>
    <tr>
      <th>Task Name</th>
      <th>Task Status</th>
      <th>Workers</th>
	  <th>Duration</th>
	  <th>Start Date</th>
	  <th>Budget</th>
	  <th>Action</th>
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

    // Get tasks from database
    $sql = "SELECT * FROM tasks";

    $result = $conn->query($sql);
    // Display tasks
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["task_name"] . "</td>";
      echo "<td>" . $row["status"] . "</td>";
	  echo "<td>" . $row["Worker"] . "</td>";
	  echo "<td>" . $row["Duration"] . "</td>";
	  echo "<td>" . $row["start_date"] . "</td>";
	  echo "<td>" . $row["budget"] . "</td>";
	  echo "<td><a href=\"update_task.php?id=" . $row["task_id"] . "\">Edit</a> | 
	  <a href=\"delete_task.php?id=" . $row["task_id"] . "\">Delete</a></td>";
	echo "</tr>";
	$totalBudget += (float)$row['budget'];
    }
	echo '<tr>';
echo '<td colspan="5"></td>';
echo '<td><strong>Total Budget:</strong></td>';
echo '<td><strong>K' . number_format($totalBudget, 2) . '</strong></td>';

echo '</tr>';

    ?>

		</table>
	</div>	
	</div>

	</div>

	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			myIndex++;
			if (myIndex > x.length) { myIndex = 1 }
			x[myIndex - 1].style.display = "block";
			setTimeout(carousel, 6000);
		}
	</script>

</body>

</html>