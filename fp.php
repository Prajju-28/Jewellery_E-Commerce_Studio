<?php
include("db.php");
session_start();
include('sendingMail.php');
if(isset($_POST['submit']))
{
	$email=$_POST['Email'];
	$Security_Question=$_POST['Security_Question'];
	$Answer= $_POST['Answer'];
	
	
			$qry="SELECT Password, Security_Question,Answer FROM register WHERE Email='$email'";
			$res=$conn->query($qry);
			if($res->num_rows > 0 )
			{
				while($row=$res->fetch_assoc())
				{
					if($row['Security_Question'] == $Security_Question and $row['Answer'] == $Answer)
					{
						$Password=$row['Password'];
						$subject="Password Retrive Message";
						$message="your current Password is : $Password";
						send_mail($email,$subject,$message);
						echo"<script> alert('Check your register Mail for Password');</script>";
					}
					else
					{
						echo"<script> alert('Try again');</script>";
					}
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

  <title>Login</title>

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
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
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
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          login Page
        </h2>
      </div>
	
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="fp.php" method="POST">
			
				<div class="col-lg-12">
				  <input type="email" placeholder="Email-Id" name="Email" required />
				</div>
									
					<div class="row">
						<div class="col-lg-6">
							 Security_Question:
								<select name="Security_Question" class="form-control">
									<option>What is your pet name?</option>
									<option>What is your first school name</option>
									<option>What is your first Mobile Number</option>
								</select>
						</div>
						<div class="col-lg-6">
						  Answer<input type="text"  placeholder="Answer"  name="Answer"/>
						</div>
					</div>
			</br>
			</br>
            <div class="d-flex ">
             <input type="submit" class="btn btn-success" name="submit" value="submit" >
            </div>
			<br>
			<a href="fp.php">forgotten password ? </a> <a href="register.php">new register</a>
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