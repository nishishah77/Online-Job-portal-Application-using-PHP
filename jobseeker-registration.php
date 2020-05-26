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
			//registration
		if(isset($_POST) && isset($_POST['client_name']) && isset($_POST['client_dob']) && isset($_POST['client_email'])&& isset($_POST['client_password']) && isset($_POST['client_mobile']) && isset($_POST['client_address']) && isset($_POST['client_city']) && isset($_POST['client_pincode']))
		{
			$client_name = $_POST['client_name'];
			$client_dob = $_POST['client_dob'];
			$client_email = $_POST['client_email'];
			$client_password = $_POST['client_password'];
			$client_mobile = $_POST['client_mobile'];
			$client_address = $_POST['client_address'];
			$client_city = $_POST['client_city'];
			$client_pincode = $_POST['client_pincode'];

			//fetching state and country

			$getstatecountry = mysqli_query($conn,"select ci.state_id,st.country_id from city ci,state st,country co where ci.city_id = $client_city and ci.state_id = st.state_id and st.country_id = co.country_id ");

			while($result = mysqli_fetch_array($getstatecountry))
			{
				$client_state = $result['state_id'];
				$client_country = $result['country_id'];
			}

			//insert in clientpersonal

			$insert = "insert into clientpersonal (client_name,client_dob,client_address,client_pincode,client_country,client_state,client_city,client_mobile,client_email,client_password) values('".$client_name."','".$client_dob."','".$client_address."',".$client_pincode.",".$client_country.",".$client_state.",".$client_city.",".$client_mobile.",'".$client_email."','".$client_password."')";			 
			if(mysqli_query($conn,$insert))
			{
				echo " Registered Successfully...!";
			//fetch id of last inserted client personal id
			$client_pid=0;
			 $getClientPersonalId = mysqli_query($conn,"SELECT client_pid FROM clientpersonal ORDER BY client_pid DESC LIMIT 1");

			while($result = mysqli_fetch_array($getClientPersonalId))
			{
				$client_pid = $result['client_pid'];				
			}

			}
			else
			{
				echo " Failed To Register...!";
				echo("Error description: " . $conn -> error);
			}

		}
		if(isset($_POST) && isset($_POST['percentage10']) && isset($_POST['board10']) && isset($_POST['percentage12'])&& isset($_POST['board12']) && isset($_POST['ugdegree']) && isset($_POST['uguniversity']) && isset($_POST['percentageug']))
		{
			$percentage10 = $_POST['percentage10'];
			$board10 = $_POST['board10'];
			$percentage12 = $_POST['percentage12'];
			$board12 = $_POST['board12'];
			$ugdegree = $_POST['ugdegree'];
			$uguniversity = $_POST['uguniversity'];
			$percentageug = $_POST['percentageug'];
			$pgdegree = $_POST['pgdegree'];
			$pguniversity = $_POST['pguniversity'];
			$percentagepg = $_POST['percentagepg'];

		
			//insert in clienteducational
			if($_POST['pgdegree'] != "" && $_POST['pguniversity'] != "" && $_POST['percentagepg'] != "")
			{
			$insert = "insert into clienteducational (10th_percentage,10th_board,12th_percentage,12th_board,ug_degree,ug_university,ug_percentage,pg_degree,pg_university,pg_percentage) values(".$percentage10.",'".$board10."',".$percentage12.",'".$board12."','".$ugdegree."','".$uguniversity."',".$percentageug.",'".$pgdegree."','".$pguniversity."',".$percentagepg.")";
			}
			else
			{
				$insert = "insert into clienteducational (10th_percentage,10th_board,12th_percentage,12th_board,ug_degree,ug_university,ug_percentage) values(".$percentage10.",'".$board10."',".$percentage12.",'".$board12."','".$ugdegree."','".$uguniversity."',".$percentageug.")";
			}
			echo $insert;			 
			if(mysqli_query($conn,$insert))
			{
				echo " Registered Successfully...!";
				//fetch id of last inserted client Educational id
				$client_eid=0;
				 $getClientEducationalId = mysqli_query($conn,"SELECT client_eid FROM clienteducational ORDER BY client_eid DESC LIMIT 1");

				while($result = mysqli_fetch_array($getClientEducationalId))
				{
					$client_eid = $result['client_eid'];				
				}

			}
			else
			{
				echo " Failed To Insert in Educational Table...!";
				echo("Error description: " . $conn -> error);
			}



		}	
		if(isset($_POST) && isset($_POST['companyname']) && isset($_POST['companyaddress']) && isset($_POST['companypincode'])&& isset($_POST['companycity']) && isset($_POST['companymobile']) && isset($_POST['experience']) && isset($_POST['companyemail']))
		{	
			$companyname = $_POST['companyname'];
			$companyaddress = $_POST['companyaddress'];
			$companypincode = $_POST['companypincode'];
			$companycity = $_POST['companycity'];
			$companymobile = $_POST['companymobile'];
			$experience = $_POST['experience'];
			$companyemail = $_POST['companyemail'];
			$designation_id = $_POST['designation'];
			$company_state=$company_country="";
			$skills = $_POST['skills'];
			//fetch state and country from city
			
			$getstatecountry = mysqli_query($conn,"select ci.state_id,st.country_id from city ci,state st,country co where ci.city_id = $companycity and ci.state_id = st.state_id and st.country_id = co.country_id ");

			while($result = mysqli_fetch_array($getstatecountry))
			{
				$company_state = $result['state_id'];
				$company_country = $result['country_id'];
			}

			//insert in work experience

			$insert = "insert into client_work (company_name,company_address,company_pincode,company_city,company_state,company_country,work_experience,company_phone,company_email,designation_id) values('".$companyname."','".$companyaddress."',".$companypincode.",".$companycity.",".$company_state.",".$company_country.",".$experience.",".$companymobile.",'".$companyemail."',".$designation_id.")";	
			echo $insert;		 
			if(mysqli_query($conn,$insert))
			{
				echo " Registered Successfully...!";
			}
			else
			{
				echo " Failed To Register...!";
				echo("Error description: " . $conn -> error);
			}

			//fetch 
			$client_wid=0;
			 $getClientWorkId = mysqli_query($conn,"SELECT client_wid FROM client_work ORDER BY client_wid DESC LIMIT 1");

			while($result = mysqli_fetch_array($getClientWorkId))
			{
				$client_wid = $result['client_wid'];				
			}
			
		}

		if(isset($_POST) && isset($_POST['skills']))
		{
			$skills = $_POST['skills'];

			$insert = "insert into client_skills (skills_id) values('".$skills."')";	
				 
			if(mysqli_query($conn,$insert))
			{

				echo " Registered Successfully...!";
			//fetch 
			$client_sid=0;
			 $getClientSkillsId = mysqli_query($conn,"SELECT client_sid FROM client_skills ORDER BY client_sid DESC LIMIT 1");

			while($result = mysqli_fetch_array($getClientSkillsId))
			{
				$client_sid = $result['client_sid'];				
			}

			}
			else
			{
				echo " Failed To Register...!";
				echo("Error description: " . $conn -> error);
			}
		}

		if( (isset($client_pid) && isset($client_eid) && isset($client_sid)) || (isset($client_pid) && isset($client_eid) && isset($client_sid)))
		{
			if(isset($client_wid))
			{
				$insert = "insert into client_master (client_pid,client_eid,client_wid,client_sid) values(".$client_pid.",".$client_eid.",".$client_wid.",".$client_sid.")";
			}	
			 else
			 {
			 	$insert = "insert into client_master (client_pid,client_eid,client_sid) values(".$client_pid.",".$client_eid.",".$client_sid.")";	
			 }
			if(mysqli_query($conn,$insert))
			{
				echo " Registered Successfully...!";
			}
			else
			{
				echo " Failed To Register...!";
				echo("Error description: " . $conn -> error);
			}

		}
	?>
	<html>
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
		<title>NIKOR JOBZ - Jobseeker Registration</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
			<link rel="stylesheet" href="css/wizard-css.css">
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
				         <li><a class="ticker-btn" href="jobseeker-registration.php?btn=logout">Logout</a></li>		
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
								Jobseeker Registration			
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="price.html"> Jobseeker Registration </a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
 			<section class="button-area">
				<div class="container">
					<div class="col-md-12">
							<section>
	 					       <div class="wizard">
	            					<div class="wizard-inner">
	               						 <div class="connecting-line"></div>
	                						<ul class="nav nav-tabs" role="tablist">

							                    <li role="presentation" class="active" id="1step1">
							                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
							                            <span class="round-tab">
							                                <i class="fa fa-user"></i>
							                            </span>
							                        </a>
							                    </li>

							                    <li role="presentation" class="disabled" id="1step2">
							                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
							                            <span class="round-tab">
							                                <i class="fa fa-graduation-cap"></i>
							                            </span>
							                        </a>
							                    </li>
							                    <li role="presentation" class="disabled" id="1step3">
							                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
							                            <span class="round-tab">
							                                <i class="fa fa-briefcase"></i>
							                            </span>
							                        </a>
							                    </li>							                    
							                    <li role="presentation" class="disabled" id="1step4">
							                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
							                            <span class="round-tab">
							                                <i class="fa fa-binoculars"></i>
							                            </span>
							                        </a>
							                    </li>
	               						    </ul>
	            					</div>

	        					    <form role="form">
	    				            	<div class="tab-content">
						                    <div class="tab-pane active" role="tabpanel" id="2step1">
						                    	<div class="col-6" style="  display: block;margin-right: auto;margin-left: auto;">
						                        <h3>Personal Information</h3>
						                        	<form action="jobseeker-registration.php"method="post">
														
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
															<input type="text" id="client_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required="" class="single-input">
															<span id="client_name_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<?php
														 $min = date('Y-01-01', strtotime('-50 years'));
                 										 $max = date('Y-12-31', strtotime('-19 years'));
														?>
														<div class=" input-group-icon mt-10">	
															<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>															
															<input type="date" id="client_dateofbirth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date Of Birth'" required="" class="single-input" min="<?php echo $min;?>"  max="<?php echo $max;?>">
															<span id="client_dateofbirth_err" style="color: #c0392b;font-weight:bold;"></span>	
														  </div>
														  <div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
															<input type="text" id="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input">
															<span id="client_address_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<div class="input-group-icon mt-10">	
														<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>	
															<input type="text" id="client_pincode" placeholder="Pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" required="" class="single-input" type="number" maxlength="6" minlength="6">	
															<span id="client_pincode_err" style="color: #c0392b;font-weight:bold;"></span>					
														</div>
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;" id="client_country">
																	<?php?>
																	<option value="" id="">Country</option>
																</select>
																<?php?>
																<div class="nice-select" tabindex="0">
																	<span class="current">Country</span><ul class="list">
																	<li data-value="" class="option">Country</li>
																	<?php
																	$countries = mysqli_query($conn,"select * from country");
																	while($country = mysqli_fetch_array($countries))
																	{
																	?>
																	<li data-value="<?php echo $country['country_id'];?>" onclick="countryChange(<?php echo $country['country_id'];?>);" class = "option"><?php echo $country['country_name'];?></li>
																	<?php
																    }
																	?>
																</ul></div>
															</div>
															<span id="client_country_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>

														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;" id="client_state">
																	<option value="">State</option>
																</select>
																
																<div class="nice-select" tabindex="0">
																	<span class="current">State</span>
																	<ul class="list" id="client_state_ul">
																	<li data-value="" class="option">State</li>
																	</ul></div>
															</div>
															<span id="client_state_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>

														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;"id="client_city">
																<option value="">City</option>
																</select>
																<div class="nice-select" tabindex="0"><span class="current">City</span>
																	<ul class="list" id = "client_city_ul">
																	<li data-value="" class="option">City</li>
																</ul>
															</div>
															</div>
															<span id="client_city_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>															
														<div class="input-group-icon mt-10">
														<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>		
															<input type="text" id="client_mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" required="" class="single-input" type="number" maxlength="10" minlength="10">			
															<span id="client_mobile_err" style="color: #c0392b;font-weight:bold;"></span>	
														</div>														 
																
														<div class="input-group-icon mt-10">
														<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>																	
															<input type="email" id="client_email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
															<span id="client_email_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-key" aria-hidden="true"></i></div>					
															<input type="password" id="client_password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required="" class="single-input">
															<span id="client_password_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-key" aria-hidden="true"></i></div>					
															<input type="password" id="client_confirmpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required="" class="single-input">
															<span id="client_cpassword_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>

													</form>
												</div>
						                        <ul class="list-inline pull-right">
						                            <li><button type="button" class="btn btn-primary next-step" onclick="nextstep1();" >Save and continue</button></li>
						                        </ul>
						                    </div>
						                    <div class="clearfix"></div>
						                    <div class="tab-pane" role="tabpanel" id="2step2">
						                    	<div class="col-6" style="  display: block;margin-right: auto;margin-left: auto;">
						                        <h3>Educational Information</h3>
						                        	<form action="jobseeker-registration.php"method="post">
														
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
															<input type="text" id="10percentage" placeholder="10th Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = '10th Percentage'" required="" class="single-input">
															<span id="10percentage_err" style="color: #c0392b;font-weight:bold;"></span>

														</div>
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-clipboard" aria-hidden="true"></i></div>
															<input type="text" id="10board" placeholder="10th Board" onfocus="this.placeholder = ''" onblur="this.placeholder = '10th Board'" required="" class="single-input">
															<span id="10board_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
															<input type="text" id="12percentage" placeholder="12th Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = '12th Percentage'"  class="single-input">
															<span id="12percentage_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-clipboard" aria-hidden="true"></i></div>
															<input type="text" id="12board" placeholder="12th Board" onfocus="this.placeholder = ''" onblur="this.placeholder = '12th Board'" required="" class="single-input">
															<span id="10board_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
															<input type="text" id="ugdegree" placeholder="UG Degree" onfocus="this.placeholder = ''" onblur="this.placeholder = 'UG Degree'"  class="single-input">
															<span id="ugdegree_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-university" aria-hidden="true"></i></div>
															<input type="text" id="uguniversity" placeholder="UG University" onfocus="this.placeholder = ''" onblur="this.placeholder = 'UG University'"  class="single-input">
															<span id="uguniversity_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>	
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
															<input type="text" id="ugpercentage" placeholder="UG Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'UG Percentage'"  class="single-input">
															<span id="ugpercentage_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
															<input type="text" id="pgdegree" placeholder="PG Degree" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PG Degree'"  class="single-input">
															<span id="pgdegree_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-university" aria-hidden="true"></i></div>
															<input type="text" id="pguniversity" placeholder="PG University" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PG University'"  class="single-input">
															<span id="pguniversity_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>	
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
															<input type="text" id="pgpercentage" placeholder="PG Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PG Percentage'"  class="single-input">
															<span id="pgpercentage_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
						                            </form>
						                        </div>
						                        <ul class="list-inline pull-right">
						                            <li><button type="button" class="btn btn-default prev-step" onclick="prevstep2();" >Previous</button></li>
						                            <li><button type="button" class="btn btn-primary next-step" onclick="nextstep2();">Save and continue</button></li>
						                        </ul>
						                    </div>
						                    <div class="clearfix"></div>
						                    <div class="tab-pane" role="tabpanel" id="2step3">
						                   		 <div class="col-6" style="  display: block;margin-right: auto;margin-left: auto;">

						                        <h3>Work Experience Information</h3>
						                        <form action="jobseeker-registration.php"method="post">
														
															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-building" aria-hidden="true"></i></div>
															<input type="text" id="companyname" placeholder="Company Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company Name'"  class="single-input">
															<span id="companyname_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														
														  <div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
															<input type="text" id="company_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" class="single-input">
															<span id="company_address_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
														<div class="input-group-icon mt-10">	
														<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>	
															<input type="text" id="company_pincode" placeholder="Pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" class="single-input" type="number" maxlength="6" minlength="6">	
															<span id="company_pincode_err" style="color: #c0392b;font-weight:bold;"></span>					
														</div>
														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;" id="company_country">
																	
																	<option value="" id="">Country</option>
																</select>
																<?php?>
																<div class="nice-select" tabindex="0">
																	<span class="current">Country</span><ul class="list">
																	<li data-value="" class="option">Country</li>	
																	<?php
																	$countries = mysqli_query($conn,"select * from country");
																	while($country = mysqli_fetch_array($countries))
																	{
																	?>
																	<li data-value="<?php echo $country['country_id'];?>" onclick="companycountryChange(<?php echo $country['country_id'];?>);" class = "option"><?php echo $country['country_name'];?></li>
																	<?php
																    }
																	?>
																</ul>
															</div>
															</div>
															<span id="company_country_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>

														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;" id="company_state">
																	<option value="" class="option">State</option>
																</select>
																
																<div class="nice-select" tabindex="0">
																	<span class="current">State</span>
																	<ul class="list" id="company_state_ul">
																		<li data-value="" class="option">State</li>
																	</ul></div>
															</div>
															<span id="company_state_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>

														<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;"id="company_city">
																	<option value="">City</option>
																</select>
																<div class="nice-select" tabindex="0"><span class="current">City</span>
																	<ul class="list" id = "company_city_ul">
																	<li class="option" data-value="">City</li>
																</ul>
															</div>
															</div>
															<span id="company_city_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>																
														<div class="input-group-icon mt-10">
														<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>		
															<input type="text" id="company_mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'"  class="single-input" type="number" maxlength="10" minlength="10">	
															<span id="company_mobile_err" style="color: #c0392b;font-weight:bold;"></span>					
														</div>														 
														<div class="input-group-icon mt-10">
														<div class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>																	
															<input type="text" id="experience" placeholder="Experience" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Experience'" class="single-input">
															<span id="experience_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>																						
														<div class="input-group-icon mt-10">
														<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>																	
															<input type="email" id="company_email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'"  class="single-input">
															<span id="company_email_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>
 															<div class="input-group-icon mt-10">
															<div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
															<div class="form-select" id="default-select">
																<select style="display: none;" id="designation">
																	<option value="">Designation</option>
																	<?php
																	$designations = mysqli_query($conn,"select * from designation");
																	while($designation = mysqli_fetch_array($designations))
																	{
																	?>
																	<option value="<?php echo $designation['designation_id'];?>"><?php echo $designation['designation_name'];?></option>
																		<?php
																		}
																		?>
																</select>

																<div class="nice-select" tabindex="0">
																	<span class="current">Designation</span><ul class="list">
																		<li data-value="" class="option">Designation</li>
																	<?php
																	$designations = mysqli_query($conn,"select * from designation");
																	while($designation = mysqli_fetch_array($designations))
																	{
																	?>
																	<li data-value="<?php echo $designation['designation_id'];?>"  class = "option"><?php echo $designation['designation_name'];?></li>
																	<?php
																    }
																	?>
																</ul>
																
															</div>
															</div>
															<span id="designation_err" style="color: #c0392b;font-weight:bold;"></span>
														</div>	
														</form>						
													</div>												
						                    <ul class="list-inline pull-right">						                        
						                            <li><button type="button" class="btn btn-default prev-step" onclick="prevstep3();" >Previous</button></li>
						                            <li><button type="button" class="btn btn-warning prev-step" onclick="skip();" >Skip</button></li>
						                            <li><button type="button" class="btn btn-primary btn-info-full next-step" onclick="nextstep3();">Save and continue</button></li>
						                        </ul>
						                </div>
						                    <div class="clearfix"></div>
						                         <div class="tab-pane" role="tabpanel" id="2step4">
						                         	<div class="col-6" style="  display: block;margin-right: auto;margin-left: auto;">

						                       		 <h3>Technical Skills Information</h3>
						                       		
						                       		 <?php
						                       		 $skills = mysqli_query($conn,"select * from technical_skills");
																	while($skill = mysqli_fetch_array($skills))
																	{
						                       		 ?>
						                       		 		
												<div class="single-element-widget mt-30">
									
													<input type="checkbox" name="skills" id="<?php echo $skill['skill_id'];?>" value="<?php echo $skill['skill_id'];?>">  <?php echo $skill['skill_name'];?>
												</div>
									<?php }  ?>

						                        <ul class="list-inline pull-right">
						                            <li><button type="button" class="btn btn-default prev-step" onclick="prevstep4();">Previous</button></li>
						                            <li><button type="button" class="btn btn-primary btn-info-full next-step " onclick="formsubmit();">Submit</button></li>
						                        </ul>
						                    </div>

						                	<div class="clearfix"></div>
	        				        	</div>
	          						</form>
	        					</div>
	    					</section>
	    			</div>
				</div>	    					
	        </section>
			<!-- End Registration Area -->		
			<h1 style="text-align:center; font-size:50px; color:#fff">Modal Popup Box Login Form</h1>


		<div id="modal-wrapper" class="modal">

	<form class="modal-content animate" method="post" action="jobseeker-registration.php">

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
							</div>f
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
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>			
			<script src="js/jobseeker-registration.js"></script>	
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
				function companycountryChange(id)
				{
					
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET","ajax.php?country="+id+"&for=company",false);
					xmlhttp.send(null);
					document.getElementById("company_state_ul").innerHTML = xmlhttp.responseText;
					
				}
				function companyfillCityUL(id)
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET","ajax.php?state="+id+"&purpose=UL&for=company",false);
					xmlhttp.send(null);
					document.getElementById("company_city_ul").innerHTML = xmlhttp.responseText;
					companyfillCityOption(id);
				}
				function companyfillCityOption(id)
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET","ajax.php?state="+id+"&purpose=Option&for=company",false);
					xmlhttp.send(null);
					document.getElementById("company_city").innerHTML = xmlhttp.responseText;
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
			
							function alertbox()
				{
					          swal({
							  title: "Login Failed",
							  text: "Invalid Email Or Password..!",
							  icon: "error",
							});
           		       
				}
				function openForm() {
  document.getElementById("myForm").style.display = "true";
}

function closeForm() {
  document.getElementById("myForm").style.display = "true";
}
			</script>
			<script src="js/login-js.js"></script>	
		</body>
	</html>



