<?php

require_once('dbconnect.php');
date_default_timezone_set("Asia/Calcutta");
$date=date("Y/m/d");
$can=$_GET['can'];
$token=$_GET['token'];
if($can=="ANNAPURNA")
//$sql="delete from ann_booking where date='$date' and token_no='$token'";
$sql="update ann_booking set status='CANCELLED' where date='$date' and token_no='$token'";
if($can=="PRIVATE")
//$sql="delete from private_booking where date='$date' and token_no='$token'";
$sql="update private_booking set status='CANCELLED' where date='$date' and token_no='$token'";

$status=mysqli_query($con,$sql);
if($status)
{
	header("location:itr.php?book=Booking Cancelled Successfully");
}
else
{
	header("location:itr.php?");
}
?>