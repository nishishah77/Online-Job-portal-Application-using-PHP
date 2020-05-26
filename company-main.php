<?php session_start(); 

  include "db.php";

    //delete post
    if( isset($_POST['post_id']))
    {
      $post_id = $_POST['post_id'];
      $delete = "update company_job_post set is_delete = 1 where company_post_id = ".$post_id;      
      if(mysqli_query($conn,$delete))
      {
        echo " Deleted Successfully...!";

      }
      else
      {
        echo "Failed To Delete Password...!";
        echo("Error description: " . $conn -> error);
      }
    }
    if(!isset($_SESSION['company_id']))
    {
      header("location:index.php");
    }
    //add post
    $percentageug = $city = $percentage12 = $percentageug = $percentagepg = $designation = $vacancy=NULL;
    $description = $skills = NULL;
    if( isset($_POST) && isset($_POST['city']) && isset($_POST['percentage10']) && isset($_POST['percentage12']) && isset($_POST['percentageug']) || isset($_POST['percentagepg']) && isset($_POST['designation']) && isset($_POST['description']) && isset($_POST['vacancy']) && isset($_POST['skills']))
    {
      $city = $_POST['city'];
      $percentage10 = $_POST['percentage10'];
      $percentage12 = $_POST['percentage12'];
      $percentageug = $_POST['percentageug'];
      $percentagepg = $_POST['percentagepg'];
      $designation = $_POST['designation'];
      $description = $_POST['description'];
      $vacancy = $_POST['vacancy'];
      $skills = $_POST['skills'];

      if($percentagepg != "")
      {
      $insert = "insert into company_job_post(city_id,company_id,10th_percentage,12th_percentage,ug_percentage,pg_percentage,designation_id,description,vacancy,skills_id) values(".$city.",".$_SESSION['company_id'].",".$percentage10.",".$percentage12.",".$percentageug.",".$percentagepg.",".$designation.",'".$description."',".$vacancy.",'".$skills."')";   
      }
      else{
           $insert = "insert into company_job_post(city_id,company_id,10th_percentage,12th_percentage,ug_percentage,designation_id,description,vacancy,skills_id) values(".$city.",".$_SESSION['company_id'].",".$percentage10.",".$percentage12.",".$percentageug.",".$designation.",'".$description."',".$vacancy.",'".$skills."')"; 
      }   
      echo $insert;
      if(mysqli_query($conn,$insert))
      {
        echo " Job post added Successfully...!";

      }
      else
      {
        echo "Failed To add jobpost...!";
        echo("Error description: " . $conn -> error);
      }

    }

    //reset password

    if(isset($_POST) && isset($_POST['new_password']))
    {
      $new_password = $_POST['new_password'];
      $modify = "update company set company_password = '".$new_password."' where company_id=".$_SESSION['company_id'];      
      if(mysqli_query($conn,$modify))
      {
        echo " Modified Successfully...!";

      }
      else
      {
        echo "Failed To Reset Password...!";
        echo("Error description: " . $conn -> error);
      }
    }
    //modify profile
    if(isset($_POST) && isset($_POST['company_name']) && isset($_POST['company_address']) && isset($_POST['company_pincode']) && isset($_POST['company_mobile']) && isset($_POST['company_email']))
    {
      $company_name = $_POST['company_name'];
      $company_address = $_POST['company_address'];
      $company_pincode = $_POST['company_pincode'];
      $company_mobile = $_POST['company_mobile'];
      $company_email = $_POST['company_email'];

      $modify = "update company set company_name = '".$company_name."',company_address='".$company_address."',company_pincode=".$company_pincode.",company_mobile=".$company_mobile.",company_email='".$company_email."' where company_id=".$_SESSION['company_id'];      
      if(mysqli_query($conn,$modify))
      {
        echo " Modified Successfully...!";

      }
      else
      {
        echo "Failed To Modify...!";
        echo("Error description: " . $conn -> error);
      }
    
    }

?>
  <!DOCTYPE html>

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
    <title>NIKOR JOBZ - Company Main</title>

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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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
                 <li><a href="company-main.php">My area</a></li>
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
             </ul>
              </nav><!-- #nav-menu-container -->            
       
            </div>
          </div>
        </header><!-- #header -->


      <!-- start banner Area -->
      <section class="banner-area relative" id="home">  
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row search-page-top d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
              <h1 class="text-white">
                Company Area      
              </h1>
              <p class="text-white link-nav">
                <a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="jobseeker-main.php"> Company Area</a>
              </p>  
            <div class="header-scrolled">
           <div class="row justify-content-center form-wrap" >
               <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li><a href="#profile">My Profile</a></li>
                  <li><a href="#add_jobpost">Add Job Post</a></li>              
                  <li><a href="#jobpost">View Job Post</a></li>
                  <li><a href="#reset_password">Reset Password</a>
              </nav><!-- #nav-menu-container -->    
            </div>
            </div>    
            </div>                    
          </div>
        </div>
      </section>
      <!-- End banner Area -->  
      
      <!-- Start profile -->
      <center>
      <section class="post-area section-gap" id="profile">
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <div class="col-lg-8 post-list">
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <center><h3 class="mb-30">My Profile</h3></center>
                <form method="post">
                  <?php
                  $company_id = 0;

                  if(isset($_SESSION['company_id']))
                  {
                    $company_id = $_SESSION['company_id'];
                    $getdetails = mysqli_query($conn,"select * from company where company_id = ".$company_id);

                      while($result = mysqli_fetch_array($getdetails))
                      {
                        $company_name = $result['company_name'];
                        $company_address = $result['company_address'];
                        $company_pincode = $result['company_pincode'];
                        $company_mobile = $result['company_mobile'];
                        $company_email = $result['company_email'];

                      }

                  }
                    
 
                    
                  ?>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
                    <input type="text" name="name" placeholder="Name" id="company_name" onfocus="this.placeholder = ''" value="<?=$company_name;?>" onblur="this.placeholder = 'Name'" required class="single-input">
                  </div>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
                    <input type="text" id="company_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" value="<?=$company_address;?>"required="" class="single-input">
                            </div>
                
                        <div class="input-group-icon mt-10">  
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div> 
                              <input type="text" id="company_pincode" placeholder="Pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" required="" class="single-input" type="number" value="<?=$company_pincode;?>" maxlength="6" minlength="6">            
                            </div>
                           
                            
                 

                         <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>    
                              <input type="text" id="company_mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" required="" value="<?=$company_mobile;?>"class="single-input" type="number" maxlength="10" minlength="10">           
                    </div>  
                    <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>                                 
                              <input type="email" id="company_email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" value="<?=$company_email;?>"  class="single-input">

                            </div>    
                      </form>
                        <div class="clearfix"></div>
                        <center>
                      <button type="button" class="btn btn-primary" onclick="modify();" >Save</button>
                      </center>

                </div>

              </div>
            </div> 
            <div class="clearfix"></div>
            </div>
        </div>  
      
    </div>
      </section>
      </center>
      <!-- End profile -->

    <!-- Add Post -->
<center>
      <section class="post-area section-gap" id="add_jobpost">
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <div class="col-lg-8 post-list">
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <center><h3 class="mb-30">Add Job Post</h3></center>
                <form method="post">

                  <div class="input-group-icon mt-10">
                              <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                              <div class="form-select" id="default-select">
                                <select style="display: none;" id="client_country">
                                  <?php?>
                                  <option value="<?php?>" id=""></option>
                                </select>
                                <?php?>
                                <div class="nice-select" tabindex="0">
                                  <span class="current">Country</span><ul class="list">
                                    
                                  <?php
                                  $countries = mysqli_query($conn,"select * from country");
                                  while($country = mysqli_fetch_array($countries))
                                  {
                                  ?>
                                  <li data-value="<?php echo $country['country_id'];?>" onclick="companycountryChange(<?php echo $country['country_id'];?>);" class = "option"><?php echo $country['country_name'];?></li>
                                  <?php
                                    }
                                  ?>
                                </ul></div>
                              </div>
                            </div>

                            <div class="input-group-icon mt-10">
                              <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                              <div class="form-select" id="default-select">
                                <select style="display: none;" id="company_state">
                                  
                                </select>
                                
                                <div class="nice-select" tabindex="0">
                                  <span class="current">State</span>
                                  <ul class="list" id="company_state_ul">
                                    
                                  </ul></div>
                              </div>
                            </div>

                            <div class="input-group-icon mt-10">
                              <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                              <div class="form-select" id="default-select">
                                <select style="display: none;"id="company_city">
                                
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">City</span>
                                  <ul class="list" id = "company_city_ul">
                                  
                                </ul>
                              </div>
                              </div>
                            </div>        
                  
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
                    <input type="text" name="10thpercentage" placeholder="10th Percentage" id="10thpercentage" onfocus="this.placeholder = ''"  onblur="this.placeholder = '10th Percentage'" required class="single-input">
                  </div>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
                    <input type="text" id="12thpercentage" placeholder="12th Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = '12th Percentage'" required="" class="single-input">
                            </div>
                      <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
                    <input type="text" id="ugpercentage" placeholder="UG Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'UG Percentage'" required="" class="single-input">
                            </div>

                      <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-percent" aria-hidden="true"></i></div>
                    <input type="text" id="pgpercentage" placeholder="PG Percentage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'PG Percentage'" required="" class="single-input">
                            </div>                            
                    <div class="input-group-icon mt-10">
                              <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                              <div class="form-select" id="default-select">
                                <select style="display: none;" id="designation">
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
                                    
                                  <?php
                                  $designations = mysqli_query($conn,"select * from designation");
                                  while($designation = mysqli_fetch_array($designations))
                                  {
                                  ?>
                                  <li data-value="<?php echo $designation['designation_id'];?>"  class = "option"><?php echo $designation['designation_name'];?></li>
                                  <?php
                                    }
                                  ?>
                                </ul></div>
                              </div>
                            </div>              
                                  

                        <div class="input-group-icon mt-10">  
                            <div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div> 
                            <textarea cols="25" rows="5" class="single-input" id="description" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required=""></textarea>
                          </div>

                        <div class="input-group-icon mt-10">  
                            <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div> 
                              <input type="text" id="vacancy" placeholder="Vacancy" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vacancy'" required="" class="single-input" type="number">            
                            </div>
                            <div class="clearfix"></div>
                       <div class="input-group-icon mt-10">
                         <div class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                         <label class="single-input">Technical Skills</label>
                         <div class="tab-pane single-input" role="tabpanel">
                                      
                                       <?php
                                       $skills = mysqli_query($conn,"select * from technical_skills");
                                  while($skill = mysqli_fetch_array($skills))
                                  {
                                       ?>
                                          
                        <div class="single-element-widget mt-1 float-left">
                  
                          <input type="checkbox" name="skills" id="<?php echo $skill['skill_id'];?>" value="<?php echo $skill['skill_id'];?>">  <?php echo $skill['skill_name'];?>
                        </div><pre>          </pre>
                          <?php }  ?>
                       </div>

                            </div>    
                      </form>
                        <div class="clearfix"></div>
                        <center>
                      <button type="button" class="btn btn-primary" onclick="addpost();" >Post</button>
                      </center>

                </div>

              </div>
            </div> 
            <div class="clearfix"></div>
            </div>
        </div>  
      
    </div>
      </section>
      </center>
      <!-- End Add Post -->
       <!-- Job post Status -->
    <section class="post-area section-gap" id="application_status">  
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <center><h3 class="mb-30">Job Posts</h3></center>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Post</th>
                <th scope="col">Vacancy</th>
                <th scope="col">Description</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <?php
            $count = 0;
          $jobs = mysqli_query($conn,"select * from company_job_post j,company c,designation d where j.company_id = $company_id and j.company_id = c.company_id and d.designation_id = j.designation_id and j.is_delete = 0 and j.is_active = 1");
            if (mysqli_num_rows($jobs)==0)
             {
              
             }
             else
             {
              ?>
              <tbody>
              <?php
              while($post = mysqli_fetch_array($jobs))
              {
                $count++;
          ?>
          <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $post['designation_id'];?></td>
            <td><?php echo $post['vacancy'];?></td>
            <td><?php echo $post['description'];?></td>
            <td><input type="image"  src="img/trash.png" onclick="delete_post(<?php echo $post['company_post_id'];?>)"> </td>        
          </tr>
          <?php
          }
          ?>
         </tbody> 
        <?php
          
          }
        ?>
       </table>
        </div>
        </div>
      </section>

     <!-- /Job post Status -->


 <!-- Job post Status -->
    <section class="post-area section-gap" id="application_status">  
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <center><h3 class="mb-30">Job Post Application Status</h3></center>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Post</th>
                <th scope="col">Candidate</th>
                <th scope="col">Date of Test</th>
                <th scope="col">Total Marks</th>
                <th scope="col">Pass Marks</th>
                <th scope="col">Obtained Marks</th>
                <th scope="col">Status</th>
                <th scope="col">Client Mobile</th>
                <th scope="col">Client Email</th>
              </tr>
            </thead>
            <?php
            $count = 0;
          $tests = mysqli_query($conn,"select * from test_scheduled ts, test_conducted tc,company c, company_job_post j,clientpersonal cp where ts.company_post_id = j.company_post_id and j.company_id = c.company_id and tc.tsid = ts.tsid and cp.client_pid = ts.client_pid and j.company_id = $company_id and j.is_delete = 0 and j.is_active = 1 ");
            if (mysqli_num_rows($tests)==0)
             {
              
             }
             else
             {
              ?>
              <tbody>
              <?php
              while($application = mysqli_fetch_array($tests))
              {
                $count++;
          ?>
          <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $application['designation_id'];?></td>
            <td><?php echo $application['client_name'];?></td>
            <td><?php echo $application['test_date'];?></td>
            <td><?php echo $application['test_total_marks'];?></td>
            <td><?php echo "5";?></td>
            <td><?php echo $application['test_obtain_marks'];?></td>
            <td><?php echo $application['test_result'];?></td>
            <td><?php echo $application['client_mobile'];?></td>
            <td><?php echo $application['client_email'];?></td>
          </tr>
          <?php
          }
          ?>
         </tbody> 
        <?php
          
          }
        ?>
       </table>
        </div>
        </div>
      </section>

     <!-- /Job post Status -->


     <!-- Reset Password-->
        <section class="post-area section-gap" id="reset_password">  
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <div class="col-lg-8 post-list">
             <div class="row">
              <div class="col-lg-8 col-md-8">
                <center><h3 class="mb-30">Reset Password</h3></center>
                <form method="post">
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-key" aria-hidden="true"></i></div>
                    <input type="password" name="current_password" placeholder="Current Password" id="current_password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Current Password'" required class="single-input">
                  </div>
                 <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-key" aria-hidden="true"></i></div>
                    <input type="password" name="new_password" placeholder="New Password" id="new_password" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'New Password'" required class="single-input">
                  </div>
                  <input type="hidden" name="email" id="email_id" value="<?=$_SESSION['company_email'];?>">
                  <input type="hidden" name="id" id="id" value="<?=$_SESSION['company_id'];?>">
                  <input type="hidden" name="password" id="password" value="<?=$_SESSION['company_password'];?>">
                  <input type="hidden" name="phone" id="phone" value="<?=$_SESSION['company_mobile'];?>">
                  <center>
                  <center>
                   <button type="button" class="btn btn-primary" onclick="reset_password();" >Reset Password</button>
                   </center>
                </form>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        </div>
      </section>
     <!-- /Reset Password -->
     <!-- /Candidate Details Modal -->
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>      
      <script src="js/parallax.min.js"></script>    
      <script src="js/mail-script.js"></script> 
      <script src="js/main.js"></script>  
      <script src="js/company-main.js"></script> 
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
          document.getElementById("company_city_ul").innerHTML = xmlhttp.responseText;
          fillCityOption(id);
        }
        function fillCityOption(id)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","ajax.php?state="+id+"&purpose=Option",false);
          xmlhttp.send(null);
          document.getElementById("company_city").innerHTML = xmlhttp.responseText;
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
     
    </body>
  </html>



