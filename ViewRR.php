<!DOCTYPE html>
<?php
session_start();
include('db.php');
if(!isset($_SESSION['Dealers']))
{
	header("location:login.php");
}
$Dealer=$_SESSION['Dealers'];
?>
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

  <title>JEWEL</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  
  <style>
  body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }
 
 .checked {
  color: orange;
}
 
.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

  </style>
  
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
 <!-- about section -->
	
<?php 
	include('db.php');	
	$key=$_GET['q'];
	$qry="SELECT * FROM jewellery_product WHERE jewellery_Id='$key'";
	$res=$conn->query($qry);
	if($res->num_rows > 0)
	{
		while($row =$res->fetch_assoc())
		{
			$key=$row['jewellery_Id'];
		?>
		<div class="container">
			<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo $row['Pic1'];?>" /></div>
						  <div class="tab-pane" id="pic-2"><img src="<?php echo $row['Pic2'];?>" /></div>
						  <div class="tab-pane" id="pic-3"><img src="<?php echo $row['Pic3'];?>" /></div>
						  </div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo $row['Pic1'];?>" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo $row['Pic2'];?>" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo $row['Pic3'];?>" /></a></li>
						 </ul>
						
					</div>
				
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $row['jewellery_Name'];?></h3>
						<h5 class="product-title"><?php echo $row['Jewellery_Tag_line'];?></h5>
						<div class="rating">
							<span class="review-no">Metal User: <strong><?php echo $row['Metal'];?></strong> </span>
							</br>
							<span class="review-no">Category: <strong><?php echo $row['Category'];?></strong> </span>
						</div>
						<p class="product-description"><?php echo $row['Jewellery_Description'];?></p>
						<h4 class="price">current price: <span>Rs <?php echo $row['Buy_Price'];?> /-</span></h4>
						<h4 class="price">Market price: <span>  Rs<del> <?php echo $row['MRP_Price'];?></del> /-</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong></strong></p>
						
						
					</div>
					
					<?php
								}
							}
							?>
				</div>
				</br>
				</br>
				<div style="background-color:black; height:5px;width:100%;">
				</div>
	<section class="client_section">
    <div class="container">
      </br>
      </br>
      <h3 class="secondary_heading">
        Review
      </h3>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
             <?php 
				$qry ="SELECT `reviewrating`.* , `register`.* FROM `reviewrating`, `register` WHERE `reviewrating`.User_Email = `register`.`Email` and reviewrating.jewellery_ID ='$key'";
				$res= $conn->query($qry);
				if($res->num_rows > 0 )
				{ 
					while($rw = $res->fetch_assoc())
					{
						
			  ?>
			<div class="client_container">
              <div class="client-id">
			 
                <div class="img-box">
                  <img src="<?php echo $rw['Profile_Pic']?>" alt="">
                </div>
                <div class="name">
                  <h2>
                    <?php echo $rw['Name']?>
                  </h2>
				  <h6>
                    <?php echo $rw['Date']?>
					</br>
                    <?php echo $rw['Time']?>
                  </h6>
                  
                </div>
              </div>
              <div class="detail-box">
                <p>
                  <?php $n=$rw['Rating'];
					for($i=0;$i<$n;$i++)
						{
							echo '<i class="fa fa-lg fa-star checked"></i>';
						}
					?>		
                </p>
				<p>
                  " <?php echo $rw['Review']?> "
                </p>
              </div>
					<?php 
					}
				}
				else 
				{
					echo'<p> No Reviews Posted </p>';
				}
				?>
            </div>
          </div>
        
     
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  </section>
			</div>
		</div>
	</div>
    <!-- end slider section -->
  </div>

 
  <!-- info section -->
  
  <!-- end info_section -->

  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>