<?php
	require_once("dbconnect.php");
		date_default_timezone_set("Asia/Calcutta");
		$canteen=$_POST['can'];
		$date=date("Y/m/d");
		if($canteen=='ANNAPURNA')
			$sql="select specialdish1,price1,specialdish2,price2,breakfast,price3 from ann_menu where date='$date'";
		else if($canteen=='PRIVATE')
			$sql="select specialdish1,price1,specialdish2,price2,breakfast,price3 from private_menu where date='$date'";


			$row=mysqli_query($con,$sql);
			$count=mysqli_num_rows($row);
			$result=mysqli_fetch_array($row);
	if($count>0)
	{
		$specialdish1=$result['specialdish1'];
		$price1=$result['price1'];
		$specialdish2=$result['specialdish2'];
		$price2=$result['price2'];
		$breakfast=$result['breakfast'];
		$price3=$result['price3'];

	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  	<script src="bootstrap/js/bootstrap.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
  	<style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      border-bottom: 3px solid blue;
      border-top: 3px solid blue;
      border-radius: 0;
      margin-bottom: 0;
    }
    .body{
      background-image: url("image/1.png");
      background-size: 100% 100%;
    }

    .header{}
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
      padding-top: 0;
      padding-bottom: 0;
      background-color: #b0e0e6;
    }
    .jumbotron h1,p {color:#000000;}
    .panel-heading{
      text-align: center;
      font: 20px bold serif;
      padding: 4px;
    }
    button{
      font-size: 17px;
      font-weight: bold;
    }
    td{
      font-size: 17px;
      padding: 7px;
      font-family: red serif;
      text-align: center;
    }
    th{
      padding-right: 22px;
      font-size: 17px;
      text-align: center;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>

</head>
<body>
			<br><table cellpadding="10px" cellspacing="20px" width="100%">
		<tr>
			<th>Type</th>
			<th>Dish Name</th>	
			<th>Price</th>
		</tr>

		<tr >
			<td>MAIN MEAL</td>
			<td></td>
			<?php
				if($canteen=='ANNAPURNA')
					$main=15;
				else if($canteen=='PRIVATE')
					$main=40;
			?>
			<td><?php echo $main?></td>
		</tr>


		<tr >
			<td>SPECIAL DISH 1</td>
			<td><?php echo $specialdish1; ?></td>
			<td><?php echo $price1; ?></td>
		</tr>
		<tr >
			<td>SPECIAL DISH 2</td>
			<td><?php echo $specialdish2; ?></td>
			<td><?php echo $price2; ?></td>
		<tr >
			<td>BREAKFAST</td>
			<td><?php echo $breakfast; ?></td>
			<td><?php echo $price3; ?></td>
		</tr>
</table>
</body>
</html>
<?php
	}
	else
	{
?>
	<br/>
	<h2>menu not updated</h2>
<?php
	}
?>