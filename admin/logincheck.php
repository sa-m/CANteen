<?php
	session_start();
	$con=mysqli_connect('localhost','root' );
	$db=mysqli_select_db($con, 'canteen');
	if($db){
		echo "connection not successful";
	}
	else{
		echo "no connection";
	}
	if(isset($_POST['submit'])){
		$username=$_POST['user'];
		$password=$_POST['pass'];
		$sql="select * from admintable where user='$username' and pass='$password'";
		$query=mysqli_query($con,$sql);
		$row=mysqli_num_rows($query);
			if($row==1){
				echo "login successful";
				if($username=='annapurna')
				{
					$_SESSION['user']='annapurna';
					header('location:annapurna.php');
				}
				else
				{
					$_SESSION['user']='annapurna';
					header('location:private.php');
				}

				
			}
			else{
				echo "login failed";
				header('adminlogin.php');
			}
	}
?>