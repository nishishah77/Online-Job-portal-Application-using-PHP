	<!DOCTYPE html>
		<?php
		session_start();
			include "db.php";
		//contact
			if(isset($_POST) && isset($_POST['name']) && isset($_POST['email']) &&  isset($_POST['message']))
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];
				$insert = "insert into contact (name,email,message) values('".$name."','".$email."','".$message."')";			 
			if(mysqli_query($conn,$insert))
			{
				echo " Contact Inserted Successfully...!";
		
			}
			else
			{
				echo " Failed To Insert Contact...!";
				echo("Error description: " . $conn -> error);
			}
			}
		//login
		if( isset( $_POST ) && isset($_POST['login_email']) && isset($_POST['login_password']))
		{
			$email = $_POST['login_email'];
			$password = $_POST['login_password'];
			$client_check = mysqli_query($conn,"select * from clientpersonal p, clienteducational e, client_skills s,client_master m where client_email='".$email."' and client_password = '".$password."' and m.is_delete = 0 and m.is_active = 1 and p.client_pid = m.client_pid and e.client_eid = m.client_eid  and s.client_sid = m.client_sid");
			 echo "<script>alert(".$email."?>);</script>";
			echo $conn->error;
			if (mysqli_num_rows($client_check)!=0)
			{
				while($result = mysqli_fetch_array($client_check))
				{
					//personal information
					$client_pid = $result['client_pid'];
					$client_email = $result['client_email'];
					$client_password = $result['client_password'];
					$client_name =  $result['client_name'];
					$client_dob =  $result['client_dob'];
					$client_address =  $result['client_address'];
					$client_pincode =  $result['client_pincode'];
					$client_country =  $result['client_country'];
					$client_state =  $result['client_state'];
					$client_city =  $result['client_city'];
					$client_mobile =  $result['client_mobile'];

					//educational information
					$tenth_percentage = $result['10th_percentage'];
					$tenth_board = $result['10th_board'];
					$twelveth_percentage = $result['12th_percentage'];
					$twelveth_board = $result['12th_board'];
					$ug_degree = $result['ug_degree'];
					$ug_university = $result['ug_university'];
					$ug_percentage = $result['ug_percentage'];
					$pg_percentage = $result['pg_percentage'];
					$pg_degree = $result['pg_degree'];
					$pg_university = $result['pg_university'];
					

					//skills information
					$skills = $result['skills_id'];
				}

				if( isset($client_email) && isset($client_password))
				{
					
					//personal information
					$_SESSION['client_pid'] = $client_pid;
					$_SESSION['client_email'] = $client_email;
					$_SESSION['client_password'] = $client_password;
					$_SESSION['client_namee'] = $client_name;
					$_SESSION['client_dob'] = $client_dob;
					$_SESSION['client_address'] = $client_address;
					$_SESSION['client_pincode'] = $client_pincode;
					$_SESSION['client_city'] = $client_city;
					$_SESSION['client_state'] = $client_state;
					$_SESSION['client_country'] = $client_country;
					$_SESSION['client_mobile'] = $client_mobile;

					//educational information
					$_SESSION['10th_percentage'] = $tenth_percentage;
					$_SESSION['10th_board'] = $tenth_board;
					$_SESSION['12th_percentage'] = $twelveth_percentage;
					$_SESSION['12th_board'] = $twelveth_board;
					$_SESSION['ug_degree'] = $ug_degree;
					$_SESSION['ug_university'] = $ug_university;
					$_SESSION['ug_percentage'] = $ug_percentage;
					$_SESSION['pg_percentage'] = $pg_percentage;
					$_SESSION['pg_degree'] = $pg_degree;
					$_SESSION['pg_university'] = $pg_university;
					//work information
					if( isset($client_wid))
					{
						$_SESSION['company_name'] = $company_name;
						$_SESSION['company_address'] = $company_address;
						$_SESSION['company_pincode'] = $company_pincode;
						$_SESSION['company_country'] = $company_country;
						$_SESSION['company_city'] = $company_city;
						$_SESSION['company_state'] = $company_state;
						$_SESSION['company_mobile'] = $company_mobile;
						$_SESSION['company_email'] = $company_email;
						$_SESSION['experience'] = $experience;
					}

					//skills information
					$_SESSION['skills'] = $skills;
					
					$_SESSION['client_email'];
				}
				}
				
				$company_check = mysqli_query($conn,"select * from company where company_email = '".$email."' and company_password = '".$password."' and is_delete = 0 and is_active = 1");
			
			
				while($result = mysqli_fetch_array($company_check))
				{
					//company details
					$company_id = $result['company_id'];
					$company_name = $result['company_name'];
					$company_address = $result['company_address'];
					$company_pincode = $result['company_pincode'];
					$company_mobile = $result['company_mobile'];
					$company_email = $result['company_email'];
					$company_password = $result['company_password'];
				
				}

				if( isset($company_email) && isset($company_password))
				{
					
					$_SESSION['company_id'] = $company_id;
					$_SESSION['comapny_name'] = $company_name;
					$_SESSION['company_address'] = $company_address;
					$_SESSION['company_pincode'] = $company_pincode;
					$_SESSION['company_email'] = $company_email;
					$_SESSION['company_password'] = $company_password;
					$_SESSION['company_mobile'] = $company_mobile;

			
				}
			
				if(! isset($_SESSION['client_email']) && !isset($_SESSION['company_email']))
				{
					echo "<script>alert('Login Failed..!');</script>";
				}

			
		}
	?>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="icon" href="img/portfolio.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>NIKOR JOBZ - Contact</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/login-css.css">
		</head>
		<body>
			<?php
		// logout
		if(isset($_REQUEST) && isset($_REQUEST['btn']) && $_REQUEST['btn'] = 'logout')
		{
			
			session_destroy();
		}
			?>
			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo3.png" alt="" title="" height="50" /></a>
				      </div>
 					 <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>				          
				          <li><a href="contact.php">Contact</a></li>
				         
				         <?php
				         	
				       
				           if( isset($_SESSION) && isset($_SESSION['client_email']))
				           {

				         ?>
				         <li><a href="jobseeker-main.php">My area</a></li>
				         <li><a class="ticker-btn" href="contact.php?btn=logout">Logout</a></li>		
				         <?php

				     		}
				     		else if(isset($_SESSION) && isset($_SESSION['company_email']) )
				     		{
				         ?>
				         <li><a href="company-main.php">My area</a></li>
				         <li><a class="ticker-btn" href="index.php?btn=logout">Logout</a></li>	
				    	 <?php 
				 			}
				 			else
				 			{

				 				?>
				 				<li class="menu-has-children"><a href="">Signup</a>
				          	  <ul>
				          	  	<li><a href="jobseeker-registration.php">Jobseeker</a></li>
				          	  	<li><a href="company-registration.php">Company</a></li>
				          	  </ul>
				          </li>
				         <li><a class="ticker-btn" onclick="document.getElementById('modal-wrapper').style.display='block'">Login</a></li>			   
				         
				 				<?php
				 			} 
				     ?>
						 </ul>
				      </nav>
				      <!-- #nav-menu-container -->		    		

			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-8">
						
							<div class="clearfix"></div>
							<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
								<div class="row">	
									<div class="col-lg-12 form-group">
										<input name="name" id="name" placeholder="Enter your name" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
										<span id="name_err" style="color: #c0392b;font-weight:bold;"></span>	
										<input name="email"id="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
										<span id="email_err" style="color: #c0392b;font-weight:bold;"></span>
										<textarea id="message" class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										<span id="message_err" style="color: #c0392b;font-weight:bold;"></span>
										<button class="primary-btn mt-20 text-white" onclick="contact();" style="float: right;">Send Message</button>
										<div class="mt-20 alert-msg" style="text-align: left;"></div>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
			
		<div id="modal-wrapper" class="modal">

	<form class="modal-content animate" method="post" action="contact.php">

		<div class="imgcontainer">
		<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
		<img src="img/user2.jpg" alt="Avatar" class="avatar">
		<h1 style="text-align:center">LOGIN</h1>
		</div>

		<div class="container">
			<div class="input-group-icon mt-10">
				<input type="email" placeholder="Enter Email" name="login_email" id="login_email" class="txt">
			</div>
			<div class="input-group-icon mt-10">
				<input type="password" placeholder="Enter Password" name="login_password" id="login_password" class="txt">
			</div>
			<div class="input-group-icon mt-10">
				<button type="submit" class="loginbtn" id="login_btn">Login</button>
			</div>
			<div class="input-group-icon mt-10">
				<a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
			</div>
		</div>

	</form>

</div>
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Instragram Feed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
			<script src="js/contact.js"></script>	
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			style="display:block; text-align:center;"
			data-ad-layout="in-article"
			data-ad-format="fluid"
			data-ad-client="ca-pub-7013552742369373"
			data-ad-slot="5323679646"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			<script src="js/login-js.js"></script>	
		</body>
	</html>



