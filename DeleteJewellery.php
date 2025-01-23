<?php
session_start();
include('db.php');
if(!isset($_SESSION['Dealers']))
{
	header("location:login.php");
}
$Dealer=$_SESSION['Dealers'];
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
    <!-- slider section -->
 
  <!-- item section -->


  <!-- end item section -->


  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Jewellery Product
        </h2>
      </div>
	  
      <div class="price_container">
	  <?php 
	  
	  $qry ="SELECT * FROM jewellery_product WHERE Seller ='$Dealer'";
	  $res=$conn->query($qry);
	  if($res->num_rows > 0)
	  {
		  while($row=$res->fetch_assoc())
		  {
			  $key=$row['jewellery_Id'];
	  ?>
	    <div class="box">
          <div class="name">
            <h3>
             <strong><?php echo $row['jewellery_Name'];?></strong>
            </h3>
			<hr>
			<h6>
             <strong><?php echo $row['Jewellery_Tag_line'];?></strong>
            </h6>
			<hr>
          </div>
          <div class="img-box">
            <img src="<?php echo $row['Pic1'];?>" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Rs <span><?php echo $row['Buy_Price'];?></span> /-
            </h5>
			<h5>
              Rs <span> <del><?php echo $row['MRP_Price'];?></del></span> /-
            </h5>
            <a href="DeleteProduct.php?q=<?php echo $key?>" class='btn btn-danger'>
              Delete
            </a>
          </div>
        </div>
		<?php
		  }
	  }
	  else
	  {
		  echo' <div class="box">
          <div class="name">
            <h6>
             No Product are added Yet
            </h6>
          </div>
        </div>';
	  }
		?>
        
      </div>
    </div>
  </section>

  <!-- end price section -->

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