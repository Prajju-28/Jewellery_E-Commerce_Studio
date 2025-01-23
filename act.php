<?php
session_start();
include('db.php');
include('sendingMail.php');
if(!isset($_SESSION['admin']))
{
	header("location:login.php");
}
$to=$_GET['q'];
$otp=rand(1000,9999);
$subject="OTP for Activations";
$message="Thanking for Choosing Us. Your One time password is :$otp";
$Type=$_GET['r'];
if($Type == 'Dealer')
{
	send_mail($to,$subject,$message);
	$qry1="UPDATE dealers_register SET status='$otp' WHERE DEmail='$to'";
	$res=$conn->query($qry1);
	if($res == true)
	{
		echo"<script>alert('Dealer Successfully Activated... ');window.location.href='activate.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed!! Try Again... ');window.location.href='activate.php';</script>";
	}
}
else
{
	send_mail($to,$subject,$message);	
	$qry2="UPDATE register SET Status='$otp' WHERE Email='$to'";
	$res2=$conn->query($qry2);
	if($res2 == true)
	{
		echo"<script>alert('User Successfully Activated... ');window.location.href='activate.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed!! Try Again... ');window.location.href='activate.php';</script>";
	}
}
?>