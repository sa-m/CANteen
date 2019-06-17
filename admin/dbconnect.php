<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die("Connection Error");
	}
	$dbstatus=mysqli_select_db($con,"canteen");
	if(!$dbstatus)
	{
		die("Database Not Found");
	}
?>