<?php
	require_once("dbconnect.php");
	$name=$_POST['name'];
	$loginid=$_POST['loginid'];
	$contactno=$_POST['contactno'];
	$department=$_POST['department'];
	$password=$_POST['password'];
	$password=base64_decode($password);

	$sql="insert into customers values('$name','$loginid','$contactno','$department','$password')";
	$status=mysqli_query($con,$sql);

	if($status)
	{
		header("location:login.php?msg=Registration Successful..");	
	}
	else
	{
		header("location:register.php?msg=Please Register Again..");
	}
?>