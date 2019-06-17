
<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:adminlogin.php');
	}
	require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'links.php' ?>
</head>
<body>
	<center><div class="container">
		<br/><br/>
		<h1 class="text-primary text-uppercase text-center">ANAPURNA CANTEEN</h1><br/>
		<table class='table table-bordered table-striped'>
					<tr>
					    <th>Token NO.</th>
	                    <th>name</th>
	                    <th>contact</th>
	                    <th>department</th>
	                    <th>Main Dish</th>
	                    <th>Special dish1</th>
	                    <th>Special Dish2</th>
	                    <th>Fare</th>
	                    <th>Status</th>
	                </tr>
		  <?php
		  				date_default_timezone_set("Asia/Calcutta");
	                      $date=date("Y/m/d");
	                      	$sql="select * from ann_booking where date='$date'";
	 						$result=mysqli_query($con,$sql);
	                      $result=mysqli_query($con,$sql);
	                      if(mysqli_num_rows($result)>0)
	                      {
	                        $row=mysqli_fetch_array($result);
	                  ?>
	                  <?php
	                        while ($row) { 
	                  ?>
	                        <tr>
	                          <td><?php echo $row['token_no'];?></td>
	                          <td><?php echo $row['name'];?></td>
	                          <td><?php echo $row['contact'];?></td>
	                          <td><?php echo $row['department'];?></td>
	                          <td><?php echo $row['main'];?></td>
	                          <td><?php echo $row['sd1'];?></td>
	                          <td><?php echo $row['sd2'];?></td>
	                          <td><?php echo $row['fare'];?></td>
	                          <td><?php echo $row['status'];?></td>
	                        </tr>
	                  <?php
	                        $row=mysqli_fetch_array($result);
	                        }
	                      }
	                  ?>


	    </table>
		<a href="logout.php" class="btn btn-danger">Logout</a>
	</div></center>
</body>