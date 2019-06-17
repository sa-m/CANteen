<?php
	require_once("dbconnect.php");
	session_start();
	$loginid=$_SESSION['loginid'];
	$sql="select * from customers where loginid='$loginid'";
	$result=mysqli_query($con,$sql);
	if(!$result)
		echo "DATABASE NOT AVAILABLE";
	$row=mysqli_fetch_array($result);
	$name=$row['name'];
	$contactno=$row['contactno'];
	$department=$row['department'];
	$canteen=$_POST['canteen'];
	$maindish=$_POST['md'];
	$specialdish1=$_POST['sd1'];
	$specialdish2=$_POST['sd2'];
	$fare=$_POST['calfare'];
	$date=date("Y/m/d");
	$status="CONFIRMED";
	if($canteen=='ANNAPURNA')
		$sql="select * from ann_booking where date='$date'";
	else if($canteen=='PRIVATE')
		$sql="select * from private_booking where date='$date'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	$token=$count+1;
	date_default_timezone_set("Asia/Calcutta");
	$time=date("h:i:sa");
	$otime="09:00:00am";
	$ctime="11:30:00pm";
	$t=strtotime($time);
	$time1=strtotime($otime);
	$time2=strtotime($ctime);
	if($t>$time1 && $t<$time2)
	{
		if($canteen=='ANNAPURNA')
		$sql="insert into ann_booking values('$token','$name','$loginid','$contactno','$department','$maindish','$specialdish1','$specialdish2','$fare','$status','$date')";
	else if($canteen=='PRIVATE')
		$sql="insert into private_booking values('$token','$name','$loginid','$contactno','$department','$maindish','$specialdish1','$specialdish2','$fare','$status','$date')";
	$status=mysqli_query($con,$sql);
	if($status)
	{
		header("location:itr.php?msg=Meal Booking Successful..");	
	}
	else
	{
		header("location:itr.php?msg=Please Book Again..");
	}
	}
	else
	{
		header("location:itr.php?msg=Connection_Timeout..");	
	}
	
?>