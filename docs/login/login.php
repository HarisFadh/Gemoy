<?php
require '../config.php';
if (isset($_POST["submit"])){
	$usernameemail = $_POST["usernameemail"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0){
		if($password == $row["password"]){
			$_SESSION["login"] = true;
			$_SESSION["id"] = $row["id"];
			header("Location: ../index.php");
		}
	}
	else{
		echo
		"<script> alert('User Not Registered'); </script>";
	}
}


?>


<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">Have an account?</h3>
						<form action="" method="post" class="login-form" autocomplete="off">
							<div class="form-group">
								<input type="text" id="usernameemail" name="usernameemail" class="form-control rounded-left" placeholder="Username or Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" id="password" name="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<div class="form-group d-md-flex">
								<div class="text-md-right">
									<a href="../register/register.php">Register</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>