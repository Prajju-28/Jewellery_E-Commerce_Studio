<?php
session_start();
include('db.php');
if(!isset($_SESSION['Dealers']))
{
	header("location:login.php");
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

  <title>Dealers Dashboard</title>

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

<body>

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

          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link text-dark" href="admindashboard.php"><strong>Dashboard</strong> <span class="sr-only">(current)</span></a>
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
    <!-- slider section -->
	</br>
	</br>
	</br>
		<section class="client_section">
		<div class="container" style="background-color:white">
		  <div class="heading_container">
			<h2>
			  Order Details
			</h2>
		  </div>
		  <div class="row">
		  <div class="col-lg-12">
				  <table class="table table-dark">
					<thead>
						<th>Sl_No</th>
						<th> Jewellery ID</th>
						<th> Jewellery Name</th>
						<th> Customer Name</th>
						<th> Customer Pic</th>
						<th> Price</th>
						<th> Image</th>
					</thead>
					<tbody>
					<?php
					$qry="SELECT * FROM cart WHERE Status='Purchased'";
					$res=$conn->query($qry);
					if($res->num_rows > 0)
					{ 
						$count=0;
						$Total=0;
						while($row = $res->fetch_assoc())
						{
							$id=$row['jewellery_ID'];
							$User_Email=$row['User_Email'];
							$qry1="SELECT * FROM jewellery_product WHERE jewellery_Id ='$id'";
							$res1=$conn->query($qry1);
							if($res1->num_rows > 0)
							{
								
								while($row1 = $res1->fetch_assoc())
								{
									$qr="SELECT Name, Profile_Pic FROM register WHERE Email='$User_Email'";
									$r=$conn->query($qr);
									if($r->num_rows > 0)
									{										
										while($rww = $r->fetch_assoc())
										{
											$Upic= $rww['Profile_Pic'];
											$Uname=$rww['Name'];
										}
									}
									$count=$count+1;
									$Total=$Total+$row1['Buy_Price'];
									echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$row1['jewellery_ID_Number']."</td>";
									echo "<td>".$row1['jewellery_Name']."</td>";
									echo "<td>".$Uname."</td>";
									echo "<td><img src=".$Upic." height='70' width='70'></td>";
									echo "<td>Rs ".$row1['Buy_Price']." /-</td>";
									echo "<td><img src=".$row1['Pic1']." height='70' width='70'></td>";
									
								}
							}
						}
					}
					
					?>
						
						</tbody>
						</table>
					</div>
					
			</div>				
		</section>
    <!-- end slider section -->
	<section class="client_section">
		<div class="container" style="background-color:white">
		  <div class="heading_container">
			<h2>
			  Billing Address Details
			</h2>
		  </div>
		  <div class="row">
		  <div class="col-lg-12">
				  <table class="table table-dark">
					<thead>
						<th> Name </th>
						<th> Email </th>
						<th> Address </th>
						<th> Phone </th>
						<th> City </th>
						<th> Pincode</th>
					</thead>
					<tbody>
					<?php
					$qry="SELECT * FROM cart WHERE Status='Purchased'";
					$res=$conn->query($qry);
					if($res->num_rows > 0)
					{ 
						while($row = $res->fetch_assoc())
						{
							$User_Email=$row['User_Email'];
							$qry1="SELECT * FROM billing WHERE BuyerEmail ='$User_Email'";
							$res1=$conn->query($qry1);
							if($res1->num_rows > 0)
							{
								
								while($row1 = $res1->fetch_assoc())
								{
									
									echo "<tr>";
									echo "<td>".$row1['Name']."</td>";
									echo "<td>".$row1['Email']."</td>";
									echo "<td>".$row1['Address']."</td>";
									echo "<td>".$row1['Phone']."</td>";
									echo "<td>".$row1['City']."</td>";
									echo "<td>".$row1['PinCode']."</td>";
										
								}
							}
						}
					}
					
					?>
						
						</tbody>
						</table>
					</div>
					
			</div>				
		</section>
    <!-- end slider section -->
  </div>


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
                  +01 8886663344
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
</html>