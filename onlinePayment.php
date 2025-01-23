<!DOCTYPE html>
<?php
include('db.php');
session_start();
include('sendingMail.php');

if(isset($_SESSION['User']))
	{
		$pic=$_SESSION['Profile_Pic'];
		$User=$_SESSION['User'];
	}
	else
	{
		header("location:login.php");
	}

	if(isset($_POST['Pay']))
	{
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$Cardnumber=$_POST['Cardnumber'];
		$CVV=$_POST['CVV'];
		$Date=$_POST['Date'];
		$Phone=$_POST['Phone'];
		$BuyerEmail =$_SESSION['User'];
		$total=$_SESSION['GrandTotal'];
			$to=$_SESSION['User'];			
			$subject="Online Payment Succesfull";
			$message="Thanking for Choosing Us. $total has paid to the dealer with $Cardnumber check Accout Details for more informations";
			send_mail($to,$subject,$message);
			$qry="INSERT INTO `onlinepayment`(`FirstName`, `LastName`, `Cardnumber`, `CVV`, `Date`, `Phone`, `Email`) VALUES ('$FirstName', '$LastName', '$Cardnumber', '$CVV', '$Date', '$Phone', '$BuyerEmail')";
			$res=$conn->query($qry);
			if($res == true )
			{
				$qry2="UPDATE cart SET Status='Purchased' WHERE User_Email='$BuyerEmail'";
				$res2=$conn->query($qry2);	
					if($res2 == true)
					{		
						echo "<script>alert('Thanks buy Buying the product!!! Billing Address Saved sucessfull and the product will be Delivered Soon');</script>";
					}
			
			}
			else
			{
				echo "<script>alert('Failed to save Try again!!!');</script>";
			}
		
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
	  
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          Payment Method
		  </h2>
		  <div class="row">
				<div class="col-lg-4">
				  <img src='images/VISA.png'>
				</div>
				<div class="col-lg-4">
				 <img src='images/PAYPAL.png'>
				</div>				
			</div>
      </div>
	
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="onlinepayment.php" method="POST">
			<div class="row">
				<div class="col-lg-12">
				  <input type="text" placeholder="Card Holder First Name" name="FirstName" required />
				</div>
				<div class="col-lg-12">
				  <input type="text" placeholder="Card Holder Last Name" name="LastName" required />
				</div>				
			</div>	
			<div class="row">
				<div class="col-lg-4">
				  <input type="text" placeholder="Card Number" name="Cardnumber" required />
				</div>
				<div class="col-lg-4">
				  <input type="text" placeholder="CVV" name="CVV" required />
				</div>	
				<div class="col-lg-4">
				Card Expiry Date  <input type="date"  name="Date" required />
				</div>						
			</div>	
			<div class="row">
				<div class="col-lg-12">
				  <input type="tel" pattern='[6-9]{1}[0-9]{9}' placeholder="Phone" name="Phone" required />
				</div>							
			</div>	</br>		
			
			</br>
			</br>
            <div class="d-flex ">
             <input type="submit" class="btn btn-success" name="Pay" value="Pay" >
            </div>
          </form>
        </div> 
		<div class="col-lg-6">
						<div class="card">
						  <div class="card-header">
							Product Price Details
						  </div>
						  <div class="card-body">
						<h4 class="card-title">Grand Total: <strong>Rs <?php echo $_SESSION['GrandTotal'];?> /-</strong> </h4>
										<hr>
							 </div>
						</div>

		
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