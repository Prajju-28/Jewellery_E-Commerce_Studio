<!DOCTYPE html>
<?php
include('db.php');
session_start();
if(isset($_SESSION['User']))
	{
		$pic=$_SESSION['Profile_Pic'];
		$User=$_SESSION['User'];
	}
	else
	{
		header("location:login.php");
	}
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

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="Productjewellery.php">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>
				<?php 
				if(!isset($_SESSION['User']))
				{
				?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="register.php">register</a>
                </li>
				<?php }
				else
				{
					?>
				<li class="nav-item">
                  <a class="nav-link" href=""><img src="<?php echo $pic?>" height="50" width="50" style="border-radius:50%;"></a>
                </li>
					<div class="quote_btn-container ">
              <a href="cart.php">
                <img src="images/cart.png" alt="">
                <div class="cart_number">
                  0
                </div>
              </a>              
            </div>	
				<li class="nav-item">
                  <a class="nav-link" href="logout.php">logout</a>
                </li>
					
				<?php }?>
              </ul>

            </div>
            
          </div>
        </nav>
      </div>
    </header>
	  <section class="client_section">
		<div class="container" style="background-color:white">
		  <div class="heading_container">
			<h2>
			  Cart Details
			</h2>
		  </div>
		  <div class="row">
		  <div class="col-lg-8">
				  <table class="table table-dark">
					<thead>
						<th>Sl_No</th>
						<th> Jewellery ID</th>
						<th> Jewellery Name</th>
						<th> Price</th>
						<th> Image</th>
					</thead>
					<tbody>
					<?php
					$qry="SELECT * FROM cart WHERE User_Email ='$User' and Status='Not Purchased'";
					$res=$conn->query($qry);
					if($res->num_rows > 0)
					{ 
						$count=0;
						$Total=0;
						while($row = $res->fetch_assoc())
						{
							$id=$row['jewellery_ID'];
							$qry1="SELECT * FROM jewellery_product WHERE jewellery_Id ='$id'";
							$res1=$conn->query($qry1);
							if($res1->num_rows > 0)
							{
								
								while($row1 = $res1->fetch_assoc())
								{
									$count=$count+1;
									$Total=$Total+$row1['Buy_Price'];
									echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$row1['jewellery_ID_Number']."</td>";
									echo "<td>".$row1['jewellery_Name']."</td>";
									echo "<td>Rs ".$row1['Buy_Price']." /-</td>";
									echo "<td><img src=".$row1['Pic1']." height='70' width='70'></td>";
									
								}
							?>
						<tr><td colspan="5"></td></tr>
						<tr><td colspan=4>Total:</td><td ><strong>Rs <?php echo $Total;?> /-</strong></td></tr>
						 <?php }
						 
						 
						}
					}else{
					
					?> <tr><td colspan="5">No Products are added to cart at this moment</td></tr>
						<?php 
					}
						?>
						</tbody>
						</table>
						
					</div>
					<?php 
					if($res->num_rows > 0)
						{
							?>
					<div class="col-lg-4">
						<div class="card">
						  <div class="card-header">
							Product Price Details
						  </div>
						  <div class="card-body">
							<h5 class="card-title">Total Price: <strong>Rs <?php echo $Total;?> /-</strong> </h5>
							<h5 class="card-title">Shipping Cost: <strong>Rs 150 /-</strong> </h5>
							<h5 class="card-title">TAX: <strong>Rs 100 /-</strong> </h5>
							<hr>
							<?php $GrandTotal=$Total+150+100;
							$_SESSION['GrandTotal']=$GrandTotal;
							?>
							<h4 class="card-title">Grand Total: <strong>Rs <?php echo $GrandTotal;?> /-</strong> </h4>
							<hr>
							<center><a href="CheckOut.php" class="btn btn-success">Check Out</a></center>
						  </div>
						</div>
					</div>
					<?php 
							}
					?>
			</div>				
		</section>
		
		<section class="client_section">
		<div class="container" style="background-color:white">
		  <div class="heading_container">
			<h2>
			  Purchased History
			</h2>
		  </div>
		  <div class="row">
		  <div class="col-lg-12">
				  <table class="table table-dark">
					<thead>
						<th>Sl_No</th>
						<th> Jewellery ID</th>
						<th> Jewellery Name</th>
						<th> Price</th>
						<th> Image</th>
					</thead>
					<tbody>
					<?php
					$qry="SELECT * FROM cart WHERE User_Email ='$User' and Status='Purchased'";
					$res=$conn->query($qry);
					if($res->num_rows > 0)
					{ 
						$count=0;
						$Total=0;
						while($row = $res->fetch_assoc())
						{
							$id=$row['jewellery_ID'];
							$qry1="SELECT * FROM jewellery_product WHERE jewellery_Id ='$id'";
							$res1=$conn->query($qry1);
							if($res1->num_rows > 0)
							{
								
								while($row1 = $res1->fetch_assoc())
								{
									$count=$count+1;
									$Total=$Total+$row1['Buy_Price'];
									echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$row1['jewellery_ID_Number']."</td>";
									echo "<td>".$row1['jewellery_Name']."</td>";
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
  </div>

 
  <!-- info section -->
  
  <!-- end info_section -->

  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>