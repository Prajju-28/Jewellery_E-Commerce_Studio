<?php
session_start();
include('db.php');
if(!isset($_SESSION['admin']))
{
	header("location:login.php");
}
$to=$_GET['q'];
$Type=$_GET['r'];
if($Type == 'Dealer')
{

	$qry1="DELETE FROM dealers_register WHERE DEmail='$to'";
	$res=$conn->query($qry1);
	if($res == true)
	{
		echo"<script>alert('Dealer Deactivated Successfully... ');window.location.href='Deactivate.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed!! Try Again... ');window.location.href='Deactivate.php';</script>";
	}
}
else
{
	
	$qry2="DELETE FROM register WHERE Email='$to'";
	$res2=$conn->query($qry2);
	if($res2 == true)
	{
		echo"<script>alert('User Dectivated Successfully ... ');window.location.href='Deactivate.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed!! Try Again... ');window.location.href='Deactivate.php';</script>";
	}
}
?>