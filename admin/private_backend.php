<?php
	$conn=mysqli_connect('localhost','root',"");
	if(!$conn)
	{
		die("Connection Error");
	}
	$dbstatus=mysqli_select_db($conn,"canteen");
	if(!$dbstatus)
	{
		die("Database Not Found");
	}
	extract($_POST);
	date_default_timezone_set("Asia/Calcutta");
	if(isset($_POST['readrecord'])){
		?>
		<table class='table table-bordered table-striped'>
						<tr>
							<th>No.</th>
							<th>Special Dish 1</th>
							<th>Price 1</th>
							<th>Special Dish 2</th>
							<th>Price 2</th>
							<th>Breakfast</th>
							<th>Price 3</th>
						<tr>
		<?php
		$date=date("Y/m/d");
		$displayquery="SELECT * FROM private_menu where date='$date' ";
		$result=mysqli_query($conn,$displayquery);
		if(mysqli_num_rows($result) > 0){
			$number=1;
			$row=mysqli_fetch_array($result);
			while($row)
			{
				?>
				<tr>
					<td> <?php echo $number; ?></td>
					<td><?php echo $row['specialdish1']; ?></td>
					<td><?php echo $row['price1']; ?></td>
					<td><?php echo $row['specialdish2']; ?></td>
					<td><?php echo $row['price2']; ?></td>
					<td><?php echo $row['breakfast']; ?></td>
					<td><?php echo $row['price3']; ?></td>
				</tr>
				<?php
				$number++;
				$row=mysqli_fetch_array($result);
			}
		}
		?>
		</table>
		<br/>
	<?php
	}
	if(isset($_POST['specialdish1']) && isset($_POST['price1']) && isset($_POST['specialdish2']) && isset($_POST['price2']) && isset($_POST['breakfast']) && isset($_POST['price3']))
	{
		$date=date("Y/m/d");
		$displayquery="SELECT * FROM private_menu where date='$date'";
		$result=mysqli_query($conn,$displayquery);
		if(mysqli_num_rows($result) >=1)
		{
			echo "menu full";
		}
		else	
		{
			$query="INSERT INTO `private_menu`(`specialdish1`, `price1`, `specialdish2`, `price2`, `breakfast`, `price3`,`date`) VALUES ('$specialdish1','$price1','$specialdish2','$price2','$breakfast','$price3','$date')";
			mysqli_query($conn,$query);
		}
		
	}
		if(isset($_POST['del']))
	{
		$date=date("Y/m/d");
		$displayquery="DELETE FROM private_menu where date='$date'";
		$result=mysqli_query($conn,$displayquery);
	}
?>