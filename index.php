	<!DOCTYPE html>	
	<?php
	session_start();
	include "db.php";
	
	   // logout
    if(isset($_REQUEST) && isset($_REQUEST['btn']) && $_REQUEST['btn'] = 'logout')
    {
    
      session_destroy();
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
		<title>NIKOR JOBZ - index </title>

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
			<link rel="stylesheet" href="css/temp-css.css">
			<link rel="stylesheet" href="css/login-css.css">
		</head>
		<body>

				  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo3.png" alt="" title=""  height="50" /></a>
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
<!-- 
				     	<li><a class="ticker-btn" onclick="document.getElementById('chatbot').style.display='block'">Chat With Us</a></li>	 -->
						 </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>1500+</span> Jobs posted last week				
							</h1>	
							<form action="search.html" class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects">
											<select id = "search_city">
												<option value="">Select City</option>
												<?php $cities = mysqli_query($conn,"select * from city");
													while($city = mysqli_fetch_array($cities))
														{

													?>
												<option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name'];?></option>
												
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select id="search_designation">
												<option value="">All Category</option>
												<?php $categories = mysqli_query($conn,"select * from designation");
													while($category = mysqli_fetch_array($categories))
														{

													?>											
												<option value="<?php echo $category['designation_id'];?>"><?php echo $category['field_name'];?></option>					
												<?php
													}
												?>
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="button" class="btn btn-info" onclick="search();">
									      <span class="lnr lnr-magnifier"></span> Search
									    </button>
									</div>								
								</div>
							</form>	
							<p class="text-white"> <span>Search by tags:</span>Categories</p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Post Jobs</h4>
								<p>
									Companies can post job with their criterias and vacancy
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Search Jobs</h4>
								<p>
									Jobseekers can search jobs according to their requirements
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Apply for job</h4>
								<p>
									Jobseekers can apply for their desire jobs
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Attempt Test</h4>
								<p>
									Jobseekers can schedule and attempt test on their desired date
								</p>
							</div>										
						</div>																							
					</div>
				</div>	
			</section>
			<!-- End features Area -->
			
			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Featured Job Categories</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>			

					<div class="row">
						<?php 
							
						$categories = mysqli_query($conn,"select * from designation LIMIT 0,6");
													while($category = mysqli_fetch_array($categories))
														{
														
													?>		
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a>
									<img src="<?php echo $category['images'];?>" alt="<?php echo $category['field_name'];?>">
								</a>
								<p><?php echo $category['field_name'];?></p>
							</div>
						</div>

						<?php  }  ?>

					</div>
				</div>
			</section>
			   <section class="feature-cat-area pt-100" id="category" style="margin-left: 300px">
				<div class="container">
					<div class="row">
												<?php 
							
						$categories = mysqli_query($conn,"select * from designation LIMIT 6,9");
													while($category = mysqli_fetch_array($categories))
														{
														
													?>		
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a>
									<img src="<?php echo $category['images'];?>" alt="<?php echo $category['field_name'];?>">
								</a>
								<p><?php echo $category['field_name'];?></p>
							</div>
						</div>

						<?php  }  ?>
					</div>

				</div>	
			</section>
			<div class="clearfix"></div>
			<br>
			<!-- End feature-cat Area -->
			<?php if(! isset($_SESSION['company_id'])){?>
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<?php
						$posts = mysqli_query($conn,"select * from designation d, company c, company_job_post j,city ci  where d.designation_id = j.designation_id and c.company_id = j.company_id and ci.city_id = j.city_id and j.is_delete = 0 and j.is_active = 1 ");
							while($post = mysqli_fetch_array($posts))
							{
														

							?>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="<?php echo $post['images'];?>" alt="" width="80" height="100">
									
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
				
		<?php } ?>
		
		<div id="modal-wrapper" class="modal">

	<form class="modal-content animate" method="post" action="index.php">

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

<!-- Chatbot -->
<div id="chatbot" class="modal">

	<form class="modal-content animate" method="post" action="index.php">

		<div class="imgcontainer">
		<span onclick="document.getElementById('chatbot').style.display='none'" class="close" title="Close PopUp">&times;</span>
		<div class="chat-popup" id="chatbot">
    <form action="/chatbot/chatbot.php" class="form-container">
<center><h2>Chat Messages</h2></center>
<br/>
  <?php
    $query="select * from chats ORDER by datetime = CAST(CURRENT_TIMESTAMP AS DATE) ";
    $res=mysqli_query($conn,$query);

    while($data=mysqli_fetch_array($res)){
      $user=$data['user'];
      $chatbot=$data['chatbot'];
      $datetime=$data['datetime'];
  ?>

  <div class="chat-popup>
    <img src="user.jpg" alt="Avatar">
    <p id="message"><?php echo $user;?></p>
    <span class="time-right"><?php echo $datetime;?></span>
  </div>

  <div class="form-container textarea>
    <img src="chatbot.png" alt="Avatar" class="right">
    <p><?php echo $chatbot;?></p>
    <span class="time-left"><?php echo $datetime;?></span>
  </div>

<?php } ?>
<div class="sticky">
  <div class="row">
     <div class="col-md-12">
       <div class="input-group mb-3">
          <input type="text" class="form-container" id="msg">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
                 <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </div>
        </div>
   </div>
  </div>
</div>
</div>
		</div>

</div>
<!-- /chatbot -->
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
			<script src="js/index-js.js"></script>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
			<script type="text/javascript">

				function openForm() {
  document.getElementById("myForm").style.display = "true";
}

function closeForm() {
  document.getElementById("myForm").style.display = "true";
}

 function send(){
    var text=$('#msg').val().toLowerCase();
   
     $.ajax({
                type:"post",
                url:"mysearch.php",
                data:{text:text},
                success:function(data){
                    //alert(data);
                    $('#ref').load(' #ref');
                }
      });
  }

			</script>
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



