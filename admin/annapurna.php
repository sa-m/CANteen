<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:adminlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container center-div shadow">
		<div class="heading text-center mb-5 text-uppercase text-white
		">ANAPURNA CANTEEN</div>
		<div class="container row d-flex flex-row justify-content-center mb-5">
			<a href="ann_menu.php" class="btn btn-warning">Add Menu</a>
			<a href="ann_bookings.php" class="btn btn-success">Check Bookings</a>
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</div>
	</div>
</body>
</html>