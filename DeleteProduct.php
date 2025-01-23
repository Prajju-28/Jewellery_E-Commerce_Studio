<?php
session_start();
include('db.php');
if(!isset($_SESSION['Dealers']))
{
	header("location:login.php");
}
$key=$_GET['q'];
$qry="DELETE FROM jewellery_product WHERE jewellery_Id ='$key'";
$res=$conn->query($qry);
if($res == true)
{
	echo"<script>alert('Product Deleted Successfully');window.location.href='DeleteJewellery.php';</script>";
}
else
{	
	echo"<script>alert('Something went wrong!! try again');window.location.href='DeleteJewellery.php';</script>";
}

?>

