
<!DOCTYPE html>
		<?php
		session_start();
	include "db.php";
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
					session_start();
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
					session_start();
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
		<title>NIKOR JOBZ - Job Posts</title>

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
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
		</head>
		<body>
			<?php

		// logout
		if(isset($_REQUEST) && isset($_REQUEST['btn']) && $_REQUEST['btn'] = 'logout')
		{
			
			session_destroy();
		}
		
				$client_pid = 0;
				$test_date = "";
				$jobpost_id = 0;

				if( isset($_REQUEST) && isset($_REQUEST['client_pid']) && isset($_REQUEST['test_date']) && isset($_REQUEST['jobpost_id']))
				{
					$client_pid = $_REQUEST['client_pid'];
					$test_date = $_REQUEST['test_date'];
					$jobpost_id = $_REQUEST['jobpost_id'];
					//insert in clientpersonal

			$insert = "insert into test_scheduled (client_pid,test_date,company_post_id) values(".$client_pid.",'".$test_date."',".$jobpost_id.")";		
			
			if(mysqli_query($conn,$insert))
			{
				echo "<script>swal({
                    title: 'Success',
                    text: 'Test Scheduled Succesfully',
                    icon: 'success',
                  });</script>";
			}
			else
			{
				echo $conn->error;	 
			}
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
				         <li><a class="ticker-btn" href="index.php?btn=logout">Logout</a></li>		
				         <?php

				     		}
				     		else if(isset($_SESSION) && isset($_SESSION['company_email']) )
				     		{
				         ?>
				         <li><a href="company-main.php">My area</a></li>
				         <li><a class="ticker-btn" href="jobposts.php?btn=logout">Logout</a></li>	
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
				      </nav><!-- #nav-menu-container -->		    		

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
								Job Posts			
							</h1>	
							<p class="text-white"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Job Posts</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<?php
			$jobpost_id = 0;
			if(isset($_REQUEST) && isset($_REQUEST['jobpost']))
			{
				$jobpost_id = $_REQUEST['jobpost'];
			
			?>
			      <!-- Start profile -->
      <center>
      <section class="post-area section-gap" id="profile">
        <div class="container">
          <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">
               
        <div class="section-top-border">
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <center><h3 class="mb-30">Schedule Test</h3></center>
                <form method="post">
                  <?php
                    
                    if(isset($_SESSION['client_pid']))
                    {
                      $client_pid = $_SESSION['client_pid'];
                      $client_email = $_SESSION['client_email'];
                    }
                    else
                    {
                    	echo "<script>pleaselogin();</script>";	
                    }
                    
                  ?>
                  <?php
                  $min = date("Y-m-d");
                  $max = date('Y-m-d', strtotime('+2 months'));
                  ?>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <input type="date" name="test_date" placeholder="Test Date" id="test_date" onfocus="this.placeholder = ''" value="<?=$client_name;?>" onblur="this.placeholder = 'Test Date'" required class="single-input" min="<?php echo $min;?>" max="<?php echo $max;?>">
                  </div>
                  <input type="hidden" name="client_pid" id="client_pid" value="<?=$client_pid;?>">
                  <input type="hidden" name="jobpost_id" id="jobpost_id" value="<?=$jobpost_id;?>">
                     
                      </form>
                        <div class="clearfix"></div>
                        <center>
                      <button type="button" class="btn btn-primary" onclick="schedule_test();" >Save</button>
                      </center>

                </div>

              </div>
            </div> 

            </div>
        </div>  
      
    </div>
      </section>
      </center>
			<?php
			}
			else
			{
			?>
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<?php
							$city_id = 0;
							$designation_id = 0;
							if(isset($_REQUEST) && (isset($_REQUEST['city']) || isset($_REQUEST['designation'])))
							{
								if(isset($_REQUEST['city']))
								{
									$city_id = $_REQUEST['city'];
								}
								if(isset($_REQUEST['designation']))
								{
									$designation_id = $_REQUEST['designation'];
								}
								if($designation_id != 0)
								{
									if($city_id != 0 )
									{
										$posts = mysqli_query($conn,"select * from designation d, company c, company_job_post j,city ci  where d.designation_id = j.designation_id and c.company_id = j.company_id and ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 and j.city_id = $city_id and j.designation_id = $designation_id ");
									}
									else
									{
										$posts = mysqli_query($conn,"select * from designation d, company c, company_job_post j,city ci  where d.designation_id = j.designation_id and c.company_id = j.company_id and ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 and j.designation_id = $designation_id ");
									}
								}
								else
								{
									$posts = mysqli_query($conn,"select * from designation d, company c, company_job_post j,city ci  where d.designation_id = j.designation_id and c.company_id = j.company_id and ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 and j.city_id = $city_id");
								}
							}
							else
							{
								$posts = mysqli_query($conn,"select * from designation d, company c, company_job_post j,city ci  where d.designation_id = j.designation_id and c.company_id = j.company_id and ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 ");
							}
							while($post = mysqli_fetch_array($posts))
							{
														

							?>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="<?php echo $post['images'];?>" alt="" width="100" height="100">
									
								</div>
								<pre>     </pre>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<h4><?php echo $post['designation_name'];?></h4>
											<h6><?php echo $post['company_name']; ?></h6>		
										</div>
										<ul class="btns">
											<li><a href="jobposts.php?jobpost=<?php echo $post['company_post_id'];?>">Apply</a></li>
										</ul>
									</div>
									<p>
										<?php echo $post['description']; ?>
									</p>									
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $post['city_name']; ?></p>
									
								</div>
								</div>
								<?php 
								}
								?>
							
						</div>
					
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Jobs by Location</h4>
								<ul class="cat-list">
						<?php
						$posts = mysqli_query($conn,"select distinct ci.city_name,j.city_id from company_job_post j,city ci  where  ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 ");
						while($post = mysqli_fetch_array($posts))
						{
							?>
									<li><a class="justify-content-between d-flex" href="jobposts.php?city=<?php echo $post['city_id'];?>"><p><?php echo $post['city_name'];?></p></a></li>
							<?php
						}
							?>
								</ul>
							</div>

						
						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->
			<?php

			}
			?>

			<div id="modal-wrapper" class="modal">

	<form class="modal-content animate" method="post" action="jobpost.php">

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
            <div class="col-lg-6  col-md-12">
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> by NIKOR JOBZ 
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
      <script src="js/jobposts.js"></script>
            <script type="text/javascript">

        function countryChange(id)
        {
          
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","ajax.php?country="+id,false);
          xmlhttp.send(null);
          document.getElementById("client_state_ul").innerHTML = xmlhttp.responseText;
          
        }
        function fillCityUL(id)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","ajax.php?state="+id+"&purpose=UL",false);
          xmlhttp.send(null);
          document.getElementById("client_city_ul").innerHTML = xmlhttp.responseText;
          fillCityOption(id);
        }
        function fillCityOption(id)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","ajax.php?state="+id+"&purpose=Option",false);
          xmlhttp.send(null);
          document.getElementById("client_city").innerHTML = xmlhttp.responseText;
        }
      </script>
    </body>
  </html>


