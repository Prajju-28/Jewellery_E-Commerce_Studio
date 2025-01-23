<?php
session_start();
include('db.php');
include('sendingMail.php');
if(!isset($_SESSION['admin']))
{
	header("location:login.php");
}

if(isset($_POST['Reply']))
{
	
	$to=$_GET['q'];
	$message=$_POST['ReplyMessage'];
	
	$subject="Your Queries Responses";
	$message="Thanking for Choosing Us. $message";
	send_mail($to,$subject,$message);
	echo"<script>alert('Reply Message sent successfully');window.location.href='Feedback.php'</script>";
}
?>