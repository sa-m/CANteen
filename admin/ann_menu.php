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
		<h1 class="text-primary text-uppercase text-center">ANAPURNA CANTEEN</h1>
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
		</div>
		<h2 class="text-danger">Records</h2>
		<div id="records_contant">
		</div>
		<div class="d-flex justify-content-center">
			<button type="button" class="btn btn-danger" onclick="deletemenu()">delete menu</button>
		</div>
		<!-- The Modal -->
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">ANAPURNA CANTEEN MENU</h4>
		        <button type="button" class="close" data-dismiss="modal">&times</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="form-group">
		        	<label>Special Dish 1:</label>
		        	<input type="text" name="" id="specialdish1" class="form-control"></input>
		        </div>
		        <div class="form-group">
		        	<label>Price 1:</label>
		        	<input type="text" name="" id="price1" class="form-control"></input>
		        </div>
		        <div class="form-group">
		        	<label>Special Dish 2:</label>
		        	<input type="text" name="" id="specialdish2" class="form-control"></input>
		        </div>
		        <div class="form-group">
		        	<label>Price 2:</label>
		        	<input type="text" name="" id="price2" class="form-control"></input>
		        </div>
		        <div class="form-group">
		        	<label>Breakfast:</label>
		        	<input type="text" name="" id="breakfast" class="form-control"></input>
		        </div>
		        <div class="form-group">
		        	<label>Price 3:</label>
		        	<input type="text" name="" id="price3" class="form-control"></input>
		        </div>
		        
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>

		    </div>
		  </div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){});

		readRecords();
		function readRecords(){
			var readrecord="readrecord";
			$.ajax({
				url:"ann_backend.php",
				type:"post",
				data:{ readrecord:readrecord },
				success:function(data,status){
					$('#records_contant').html(data);
				}
			});
		}
		function addRecord(){
			var specialdish1=$('#specialdish1').val();
			var price1=$('#price1').val();
			var specialdish2=$('#specialdish2').val();
			var price2=$('#price2').val();
			var breakfast=$('#breakfast').val();
			var price3=$('#price3').val();
			$.ajax({
				url:"ann_backend.php",
				type:"post",
				data:{ specialdish1:specialdish1,
					price1:price3,
					specialdish2:specialdish2,
					price2:price2,
					breakfast:breakfast,
					price3:price3
				},
				success:function(data,status){
					readRecords();
				}
			});
		}
		function deletemenu(){
			var del=true;
			$.ajax({
				url:"ann_backend.php",
				type:"post",
				data:{del:del},
				success:function(data,status){
					readRecords();
				}
			});
		}
	</script>
</body>
</html>