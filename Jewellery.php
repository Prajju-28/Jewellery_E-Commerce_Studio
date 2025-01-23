<?php
session_start();
include('db.php');
if(!isset($_SESSION['Dealers']))
{
	header("location:login.php");
}
if(isset($_POST['Add']))
{
	$jewellery_ID_Number=$_POST['jewellery_ID_Number'];
	$jewellery_Name=$_POST['jewellery_Name'];
	$Jewellery_Tag_line=$_POST['Jewellery_Tag_line'];
	$Metal=$_POST['Metal'];
	$Category=$_POST['Category'];
	$Weight=$_POST['Weight'];
	$Buy_Price=$_POST['Buy_Price'];
	$MRP_Price=$_POST['MRP_Price'];
	$Jewellery_Description=$_POST['Jewellery_Description'];
	$Stock=$_POST['Stock'];
	$Seller=$_SESSION['Dealers'];
	$HALMARKNO=$_POST['HALMARKNO'];
	
	$BaseName1=basename($_FILES['Product_Pic1']['name']);
	$BaseName2=basename($_FILES['Product_Pic2']['name']);
	$BaseName3=basename($_FILES['Product_Pic3']['name']);
	$HALMARK=basename($_FILES['HALMARK']['name']);
	
	$qry="SELECT * FROM jewellery_product WHERE jewellery_ID_Number='$jewellery_ID_Number'";
	$res=$conn->query($qry);
	if($res->num_rows > 0 )
	{
		echo"<script> alert('This Product Details exists in Database Try again with different Queries');</script>";
	}
	else
	{
		$dir_path = "uploads/jewellery/$jewellery_ID_Number";
		
		if(is_dir($dir_path))
		{
			$path1="uploads/jewellery/$jewellery_ID_Number/$BaseName1";
			$path2="uploads/jewellery/$jewellery_ID_Number/$BaseName2";
			$path3="uploads/jewellery/$jewellery_ID_Number/$BaseName3";
			$path4="uploads/jewellery/$jewellery_ID_Number/$HALMARK";
		}
		else
		{
			mkdir($dir_path);
			$path1="uploads/jewellery/$jewellery_ID_Number/$BaseName1";
			$path2="uploads/jewellery/$jewellery_ID_Number/$BaseName2";
			$path3="uploads/jewellery/$jewellery_ID_Number/$BaseName3";
			$path4="uploads/jewellery/$jewellery_ID_Number/$HALMARK";
		}
		move_uploaded_file($_FILES['Product_Pic1']['tmp_name'],$path1);
		move_uploaded_file($_FILES['Product_Pic2']['tmp_name'],$path2);
		move_uploaded_file($_FILES['Product_Pic3']['tmp_name'],$path3);
		move_uploaded_file($_FILES['HALMARK']['tmp_name'],$path4);
		$qry="INSERT INTO `jewellery_product`(`jewellery_ID_Number`, `jewellery_Name`, `Jewellery_Tag_line`, `Metal`, `Category`,`Weight`,`Buy_Price`, `MRP_Price`, `Jewellery_Description`, `Pic1`, `Pic2`, `Pic3`, `HALMARKNO`,`HALMARK`,`Seller`, `Stock`) VALUES
		('$jewellery_ID_Number', '$jewellery_Name', '$Jewellery_Tag_line', '$Metal', '$Category','$Weight','$Buy_Price','$MRP_Price','$Jewellery_Description','$path1', '$path2', '$path3','$HALMARKNO','$path4','$Seller', '$Stock')";
		$res=$conn->query($qry);
		if($res == true)
		{
			echo "<script>alert('Data saved sucessfully');</script>";
		}
		else
		{
			echo "<script>alert('Failed to save Try again!!!');</script>";
		}
	}
}
?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Jewellery</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              JEWEL
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link text-dark" href="DealerDashboard.php"><strong>Dashboard</strong> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="Jewellery.php"><strong>Jewellery</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="DeleteJewellery.php"><strong>Remove Products</strong> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="User_Orders.php"><strong>Users Orders</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="RR.php"><strong>Rating and Reviews</strong></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link text-dark" href="logout.php"><strong>logout</strong></a>
                </li>
              </ul>

            </div>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container">   
        <h2 class="justify-content-center">
          <center>Add Jewellery Details</center>
        </h2>
      </div>
	
    </div>
    <div class="container">
      <div class="row" >
        <div class="col-md-12" >
       <form action="Jewellery.php" method="POST" enctype="multipart/form-data" style="border:red 5px solid;padding:20px;border-radius:20px">
			<div class="row">
				<div class="col-lg-4">
				  <input type="text" placeholder="Jewellery ID Number" name="jewellery_ID_Number" required />
				</div>
				<div class="col-lg-4">
				  <input type="text" placeholder="Jewellery Name" name="jewellery_Name" required />
				</div>
				<div class="col-lg-4">
				  <input type="text" placeholder="Jewellery Tag line" name="Jewellery_Tag_line" required />
				</div>
			</div>
			<hr>
			<div class="row">
			<div class="col-lg-3">
				Metal Type:
				  <select name="Metal" class="form-control" required>
							<option>Select</option>
							<option>Platinum</option>
							<option>Gold</option>
							<option>Silver</option>
							<option>Bronze</option>
							<option>Titanium</option>
							<option>Diamonds</option>
							<option>Stainless_steel</option>
							<option>Copper</option>
							<option>Brass</option>
							<option>Aluminum</option>
							<option>Rose_Gold</option>							
						</select>
				</div>
				<div class="col-lg-3">
				Jewellery Category:
				  <select name="Category" class="form-control" required>
							<option>Select</option>
							<option>Rings</option>
							<option>Earrings</option>
							<option>Bracelets</option>
							<option>Necklaces</option>
							<option>Diamonds</option>
							<option>Anklet</option>
							<option>Belly_Chain</option>
							<option>Navratna_jewellery</option>
							<option>Nosewear</option>
							<option>Gemstone</option>							
						</select>
				</div>
				<div class="col-lg-2">
				  <input type="text" placeholder="Weight"  name="Weight" required />
				</div>	
				<div class="col-lg-2">
				  <input type="text" placeholder="Buy_Price"  name="Buy_Price" required />
				</div>	
				<div class="col-lg-2">
				  <input type="text" placeholder="MRP_Price"  name="MRP_Price" required />
				</div>				
			</div>
			<div class="col-lg-12">
				  <input type="text" class="message-box" placeholder="Jewellery_Description" required name="Jewellery_Description"/> 
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-4">
				Product_Pic 1:
				  <input type="file"  name="Product_Pic1" required />
				</div>
				
				<div class="col-lg-4">
				Product_Pic 2:
				  <input type="file"  name="Product_Pic2" required />
				</div>
				
				<div class="col-lg-4">
				Product_Pic 3:
				  <input type="file"  name="Product_Pic3" required />
				</div>				
			</div>
			<div class="row">
				<div class="col-lg-4">
				
				  <input type="text"  name="HALMARKNO" required placeholder="HALMARKNO" required />
				</div>
				
				<div class="col-lg-4">
				HALMARK Invoice PDF file:
				  <input type="file"  name="HALMARK" required />
				</div>			
			</div>
			<div class="row">				
				<div class="col-lg-12">
				  <input type="text"  placeholder="Stock"  name="Stock" required />
				</div>
			</div>
			</br>
			</br>
            <div class="d-flex ">
             <input type="submit" class="btn btn-success" name="Add" value="Add Jewellery" >
            </div>
          </form>
        </div>
       
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="">
                <img src="images/logo.png" alt="">
                <span>
                  JEWEL
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/location.png" alt="">
                <span>
                  Address
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/phone.png" alt="">
                <span>
                  +01 1234567890
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/mail.png" alt="">
                <span>
                  jewelwork24@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_form">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Newsletter
            </h5>
          </div>
          <form action="">
            <div class="email_box">
              <label for="email2">Enter Your Email</label>
              <input type="text" id="email2">
            </div>
            <div>
              <button>
                subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Follow Us
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
            <a href="">
              <img src="images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>