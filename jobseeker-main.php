<?php session_start(); 

  include "db.php";
     // logout
    if(isset($_REQUEST) && isset($_REQUEST['btn']) && $_REQUEST['btn'] = 'logout')
    {
    
      session_destroy();
    }
  if(!isset($_SESSION['client_pid']))
  {
    header("location:index.php");
  }
    //reset password

    if(isset($_POST) && isset($_POST['new_password']))
    {
      $new_password = $_POST['new_password'];
      $modify = "update clientpersonal set client_password = '".$new_password."' where client_pid=".$_SESSION['client_pid'];      
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
    if(isset($_POST) && isset($_POST['client_name']) && isset($_POST['client_address']) && isset($_POST['client_pincode']) && isset($_POST['client_mobile']) && isset($_POST['client_email']))
    {
      $client_name = $_POST['client_name'];
      $client_address = $_POST['client_address'];
      $client_pincode = $_POST['client_pincode'];
      $client_mobile = $_POST['client_mobile'];
      $client_email = $_POST['client_email'];

      $modify = "update clientpersonal set client_name = '".$client_name."',client_address='".$client_address."',client_pincode=".$client_pincode.",client_mobile=".$client_mobile.",client_email='".$client_email."' where client_pid=".$_SESSION['client_pid'];      
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
    <title>NIKOR JOBZ - Jobseeker Main</title>

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
                Jobseeker Area      
              </h1>
              <p class="text-white link-nav">
                <a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="jobseeker-main.php"> Jobseeker Area</a>
              </p>  
           <div class="row justify-content-center form-wrap">
               <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li><a href="#profile">My Profile</a></li>
                  <li><a href="jobposts.php">View Job posts</a></li>
                  <li><a href="#scheduled_test">View Scheduled Tests</a></li>                  
                  <li><a href="#test_status">Test Status</a></li>
                  <li><a href="#reset_password">Reset Password</a>
              </nav><!-- #nav-menu-container -->    
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
                  

                  if(isset($_SESSION['client_pid']))
                  {
                    $client_pid = $_SESSION['client_pid'];
                    $getdetails = mysqli_query($conn,"select * from clientpersonal where client_pid = ".$client_pid );
                      
                      while($result = mysqli_fetch_array($getdetails))
                      {
                        $client_name = $result['client_name'];
                        $client_address = $result['client_address'];
                        $client_pincode = $result['client_pincode'];
                        $client_mobile = $result['client_mobile'];
                        $client_email = $result['client_email'];

                         
                      }

                  }
                    
 
                    
                  ?>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
                    <input type="text" name="name" placeholder="Name" id="client_name" onfocus="this.placeholder = ''" value="<?=$client_name;?>" onblur="this.placeholder = 'Name'" required class="single-input">
                  </div>
                  <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
                    <input type="text" id="client_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" value="<?=$client_address;?>"required="" class="single-input">
                            </div>
                
                        <div class="input-group-icon mt-10">  
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div> 
                              <input type="text" id="client_pincode" placeholder="Pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" required="" class="single-input" type="number" value="<?=$client_pincode;?>" maxlength="6" minlength="6">            
                            </div>
                           
                            
                 

                         <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>    
                              <input type="text" id="client_mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" required="" value="<?=$client_mobile;?>"class="single-input" type="number" maxlength="10" minlength="10">           
                    </div>  
                    <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>                                 
                              <input type="email" id="client_email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" value="<?=$client_email;?>"  class="single-input">

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

     <!-- Scheduled Tests -->
    <section class="post-area section-gap" id="scheduled_test">  
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <center><h3 class="mb-30">Scheduled Tests</h3></center>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Test for Company</th>
                <th scope="col">Test Date</th>
                <th scope="col">Test Status</th>
              </tr>
            </thead>
            <?php
          $tests = mysqli_query($conn,"select * from test_scheduled t, company c, company_job_post j,clientpersonal cp where t.company_post_id = j.company_post_id and j.company_id = c.company_id and cp.client_pid = t.client_pid and t.client_pid = $client_pid");
            if (mysqli_num_rows($tests)!=0)
             {
          ?>
            <tbody>
              <?php
                $today = date("Y-m-d");

                $count = 0;
                    while($test = mysqli_fetch_array($tests))
                    {
                      $count++;
               ?>
              <tr>
                <th scope="row"><?php echo $count;?></th>
                <td><?php echo $test['company_name']; ?></td>
                <td><?php echo $test['test_date']?></td>
                <td> 
                  <?php
                 $conduted_test = mysqli_query($conn,"select * from test_conducted  where tsid =".$test['tsid']);
                if (mysqli_num_rows($conduted_test)==0)
                {
                  if( $test['test_date'] < $today)
                  {
                    ?>
                    <a class="btn btn-warning">Expired</a>
                    <?php
                  }
                  else if($test['test_date'] > $today )
                  {
                  ?>
                   <a  class="btn btn-info">Yet to Start</a>
                  <?php

                }
                else if( $test['test_date'] == $today)
                {
                  ?>
                  <a href="test.php?tsid=<?php echo $test['tsid'];?>" class="btn btn-primary">Start</a>
                  <?php
                }
              }
              else
              {
                 ?>
                   <a class="btn btn-success">Completed</a>
                  <?php
              }
            ?>
            
          </td>
          <?php 
        }
          ?>
              </tr>
            </tbody>
             <?php
        }
        else
        {
          
        }
      ?>
       </table>
        </div>
        </div>
      </section>

     <!-- /Scheduled Tests -->
     <!-- Test Status -->
    <section class="post-area section-gap" id="test_status">  
        <div class="container">
          <div class="row d-flex justify-content-center border border-primary">
            <center><h3 class="mb-30">Test Status</h3></center>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Appeared Test</th>
                <th scope="col">Date</th>
                <th scope="col">Total Marks</th>
                <th scope="col">Pass Marks</th>
                <th scope="col">Obtained Marks</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <?php
            $count = 0;
          $tests = mysqli_query($conn,"select * from test_scheduled ts, test_conducted tc,company c, company_job_post j,clientpersonal cp where ts.company_post_id = j.company_post_id and j.company_id = c.company_id and tc.tsid = ts.tsid and cp.client_pid = ts.client_pid and ts.client_pid = $client_pid");
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
            <td><?php echo $application['company_name'];?></td>
            <td><?php echo $application['test_date'];?></td>
            <td><?php echo $application['test_total_marks'];?></td>
            <td><?php echo "5";?></td>
            <td><?php echo $application['test_obtain_marks'];?></td>
            <td><?php echo $application['test_result'];?></td>
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

     <!-- /Test Status -->

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
                  <input type="hidden" name="email" id="email_id" value="<?=$_SESSION['client_email'];?>">
                  <input type="hidden" name="id" id="id" value="<?=$_SESSION['client_pid'];?>">
                  <input type="hidden" name="password" id="password" value="<?=$_SESSION['client_password'];?>">
                  <input type="hidden" name="phone" id="phone" value="<?=$_SESSION['client_mobile'];?>">
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
      <script src="js/jobseeker-main.js"></script>  
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



