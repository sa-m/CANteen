<?php
	session_start();
	require_once("dbconnect.php");
	$loginid=$_SESSION['loginid'];
	$cpassword=$_POST['cpassword'];
	$cpassword=base64_decode($cpassword);
	$npassword=$_POST['npassword'];
	$npassword=base64_decode($npassword);
	$sql1="select * from customers where loginid='$loginid' and password='$cpassword'";
	$result=mysqli_query($con,$sql1);
	$count=mysqli_num_rows($result);
	
	if($count>0)
	{	
		$sql2="update customers set password='$npassword' where loginid='$loginid'";
		$status=mysqli_query($con,$sql2);
		if($status)
		{
			header("location:profile.php?msg=Password Changed...");
		}
	}
	else
	{
		header("location:change-password.php?msg=invalid current password...");
	}
?>