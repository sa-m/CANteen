<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:adminlogin.php');
	}
	date_default_timezone_set("Asia/Calcutta");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'links.php' ?>
</head>
<body>
	<div class="container">
		<h1 class="text-primary text-uppercase text-center">PRIVATE CANTEEN</h1>
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
		</div>
		<h2 class="text-danger">Records</h2>
		<div id="records_content">
		</div>
		<!-- The Modal -->
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">PRIVATE CANTEEN BOOKINGS</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		        <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		         <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		         <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		         <div class="form-group">
		        	<label>Name:</label>
		        	<input type="text" name="" id="name" class="form-control" placeholder="name"></input>
		        </div>
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>

		    </div>
		  </div>
		</div>
	</div>
		<a href="logout.php" class="btn btn-danger">Logout</a>
	</div>
</body>
</html>