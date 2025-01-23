<!DOCTYPE html>
<?php
	include('db.php');
	session_start();
	if(isset($_SESSION['User']))
	{
		$pic=$_SESSION['Profile_Pic'];
	}
	$User = $_SESSION['User'];
	$jewellery_ID=$_GET['q'];
	
	if(isset($_POST['Submit']))
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");
		$time = date("h:i:s");
		$jewellery_ID=$jewellery_ID;
		$User_Email=$User;
		$Rating	=$_POST['Rating'];
		$Review=$_POST['Review'];
		
		$qry1="SELECT * FROM reviewrating WHERE jewellery_ID = '$jewellery_ID' AND User_Email = '$User_Email' and Review ='$Review'";
		$res1=$conn->query($qry1);
		$num=$res1->num_rows;
		if($num !=0 )
		{			
			echo'<script>';
			echo'alert("U have to Purchase Product first to given your Review!!!");';
			echo'window.location="Productjewellery.php";';
			echo'</script>';
		}
		else
		{
		$qry="INSERT INTO `reviewrating`(`jewellery_ID`, `User_Email`, `Rating`, `Review`,`Date`,`Time`) VALUES ('$jewellery_ID', '$User_Email', '$Rating', '$Review','$date','$time')";
		 $res=$conn->query($qry);
			if($res == true )
			{
				echo "<script>alert('Successfully Submitted the review!!!');window.location.href='index.php';</script>";
			}
			else
			{
				echo "<script>alert('Failed to save Try again!!!');window.location.href='AddReview.php?q=".$jewellery_ID."';</script>";
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
    <!-- end header section -->
  </div>

  <!-- item section -->
  <!-- end item section -->


  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
			<ins>Jewellery Product</ins>
        </h2>
      </div>
	  
      <div class="row">
    
	<div class="col-md-6">
	  <?php 
	  $id = $_GET['q'];
	  $qry ="SELECT DISTINCT * from cart inner JOIN jewellery_product where cart.jewellery_ID=jewellery_product.jewellery_Id and cart.User_Email='$User' and cart.Status ='Purchased'";
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
            <img src="<?php echo $row['Pic1'];?>" alt="" height="200" width="250">
          </div>
          <div class="detail-box">
            <h5>
              Rs <span><?php echo $row['Buy_Price'];?></span> /-
            </h5>
			<h5>
              Rs <span> <del><?php echo $row['MRP_Price'];?></del></span> /-
            </h5>
           <hr>
		   
          </div>
        </div>
		<?php
		  }
	  }
	  else
	  {
		  echo'<script>alert("Buy this Product to Add Review");window.location.href="Productjewellery.php";</script>';
	  }
		?>
        
      </div>
	  
	 <div class="col-md-6">
		  <h2 class="">
          Review form
        </h2>
		   <form action ="AddReview.php?q=<?php echo $id;?>" method="POST">
				<div class="col-lg-12">
				 Rating: <input type="range" min='1' max='5' class="form-control" placeholder="Rating" name="Rating" required />
				</div>
				<div class="col-lg-12">
				  <textarea  type="text" rows='4' class="form-control"  placeholder="Review" name="Review"  required /></textarea>
				</div>
				</br>
				</br>
				<div class="col-lg-12">
				<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
				</div>
		   </form>
        </div>  
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