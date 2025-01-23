<?php
include('db.php');
session_start();
if(!isset($_SESSION['User']))
{
	header("location:login.php");

}
else
{
	$key=$_GET['q'];
	$User=$_SESSION['User'];
	
	$qry="INSERT INTO `cart`(`jewellery_ID`, `User_Email`, `Status`) VALUES ('$key','$User','Not Purchased')";
	$res=$conn->query($qry);
	if($res == true)
	{
		echo"<script>alert('jewellery Product added to your Cart');window.location.href='cart.php';</script>";
	}
	else
	{
		echo"<script>alert('Failed to add to cart Try again');window.location.href='cart.php';</script>";
	
	}
}
	
?>