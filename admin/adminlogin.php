<?php
	session_start();
	$con =mysqli_connect('localhost','root' );
	if($con){
		echo "connection successful";
	}
	else{
		echo "no connection";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'links.php' ?>
</head>
<body>
<header>
	<div class="container center-div shadow">
		<div class="heading text-center mb-5 text-uppercase text-white
		">ADMIN LOGIN PAGE </div>
		<div class="container row d-flex flex-row justify-content-center mb-5">
			<div class="admin-form shadow p-2">
				<form action="logincheck.php" method="POST">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="user" placeholder="username" class="form-control" autocomplete="off"></input>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="password" class="form-control" autocomplete="off"></input>
					</div>
					<input id="login" type="submit" class="btn btn-success" name="submit" value="Login"></input>
				</form>
			</div>
		</div>
	</div>
</header>
</body>
</html>