<?php
	session_start();
	
    // FORM DATA
    $fullname = $_SESSION['signup-data']['fullname'] ?? null;
    $email = $_SESSION['signup-data']['email'] ?? null;
	$password = $_SESSION['signup-data']['password'] ?? null;
	
	unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIGN UP</title>
	<link rel="stylesheet" href="flexible.css" />
</head>

<body>
	<div class='row'>

	</div>

	<div class='row'>


		<div id="signin">
			<h2>SIGN UP</h2>
            <?php if(isset($_SESSION['signup'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['signup'];
                                unset($_SESSION['signup']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
			<form action="signup-logic.php" method="POST">
				<br>
				<input type="text" name="fullname" placeholder='fullname'/>
				<br>
				<br>
				<input type="email" name="email" placeholder='email'/>
				<br>
				<br>
				<input type="password" name="password" placeholder='password'/>
				<br>
				<br>
				<input type="submit" name="submit" value="SIGN UP" />
			</form>
			<br>
			Already have an account?
			<a href='login.php'>SIGN IN</a>
		</div>

	</div>

	<div class='row'>

	</div>

	</div>
</body>

</html>