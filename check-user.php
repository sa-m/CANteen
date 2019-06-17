<?php
	session_start();
	require_once("dbconnect.php");
	$loginid=$_POST['loginid'];
	$password=$_POST['password'];
	$password=base64_decode($password);
	$sql="select * from customers where loginid='$loginid' and password='$password'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count>0)
	{
		$_SESSION['loginid']=$loginid;
		header("location:itr.php");
	}
	else
	{
		header("location:login.php?msg=Invalid Login Credentials");	
	}
?>