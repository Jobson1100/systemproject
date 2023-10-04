<?php
	session_start();

	// FORM DATA
    $email = $_SESSION['signin-data']['email'] ?? null;
	$password = $_SESSION['signin-data']['password'] ?? null;

	unset($_SESSION['signin-data']);
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
</head>

<body>
	<div class='row'>

	</div>



	<div class='row'>
		<div id="signin">
			<h2>SIGN IN</h2>
			
			<form action="signin-logic.php" method="POST">
			<?php if(isset($_SESSION['signin'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['signin'];
                                unset($_SESSION['signin']);
                            ?>
                        </p>
                    </div>
		<?php elseif
		(isset($_SESSION['signup-success'])): ?>
                    <div class="alert_message error">
                        <p>
                            <?=
                                $_SESSION['signup-success'];
                                unset($_SESSION['signup-success']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
				
				<br>
				<input type="email" name="email" id="email" placeholder='email' />
				<br>
				<br>
				<input type="password" name="password" id="password" placeholder='password'/>
				<br>
				<br>

				<input type="submit" name="submit" value="SIGN IN">
				<!-- <span id="msg"></span> -->

				<!-- <button type="button" id="login" onclick="userLogin();">SIGN IN</button>
				<button class="btn btn-success" type="button" id="reset" onclick="resetAll();" style="display:none;">Reset</button>*/ -->
			</form>
			<br>
			Don't have an account?
			<a href='register.php'>SIGN UP</a>
			<br>
			<br>
			<button id="back"><a href='login.php'><i class='bx bx-arrow-back'></i></a></button>
		</div>

	</div>

	</div>
	</div>
	<div class='row'>

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

	<!-- <script>
			var attempt = 3; 
 
function resetAll(){
	attempt = 3;
	document.getElementById("email").disabled=false;
	document.getElementById("password").disabled=false;
	document.getElementById("login").disabled=false;
	document.getElementById("msg").innerHTML="";
	document.getElementById("reset").style.display="none";
}
 
 
function userLogin(){
	var username = document.getElementById("email").value;
	var password = document.getElementById("password").value;
 
	if(username=="" || password==""){
		alert ("Please complete the required field!");
	}else{
		if (username == "admin" && password == "admin"){
			alert ("Login successfully");
		}else{
			attempt --;
			document.getElementById("msg").innerHTML="<center class='text-danger'>Invalid username or password</center>";
			alert("You have left "+attempt+" login attempt;");
			if(attempt == 0){
				document.getElementById("email").disabled=true;
				document.getElementById("password").disabled=true;
				document.getElementById("login").disabled=true;
				document.getElementById("reset").style.display="inline";
			}
		}
	}
}
		</script> -->
</body>

</html>