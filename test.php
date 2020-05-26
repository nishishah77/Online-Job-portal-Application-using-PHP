<?php
include "db.php";

if(isset($_POST) && isset($_POST['tsid']) )
  {
       $tsid = $_POST['tsid'];
       $correct = 0;
       $answer1 = $_POST['answer1'];
       $selected1 = $_POST['selected1'];
      
      if($answer1 == $selected1)
      {
        $correct = $correct + 1;
      }
      $answer2 = $_POST['answer2'];
      $selected2 = $_POST['selected2'];
      if($answer2 == $selected2)
      {
        $correct = $correct + 1;
      }

      $answer3 = $_POST['answer3'];
      $selected3 = $_POST['selected3'];
        if($answer3 == $selected3)
      {
        $correct = $correct + 1;
      }
      $answer4 = $_POST['answer4'];
      $selected4 = $_POST['selected4'];
        if($answer4 == $selected4)
      {
        $correct = $correct + 1;
      }
      $answer5 = $_POST['answer5'];
      $selected5 = $_POST['selected5'];
        if($answer5 == $selected5)
      {
        $correct = $correct + 1;
      }
      $answer6 = $_POST['answer6'];
      $selected6 = $_POST['selected6'];
        if($answer6 == $selected6)
      {
        $correct = $correct + 1;
      }
      $answer7= $_POST['answer7'];
      $selected7 = $_POST['selected7'];
        if($answer7 == $selected7)
      {
        $correct = $correct + 1;
      }
      $answer8 = $_POST['answer8'];
      $selected8 = $_POST['selected8'];
        if($answer8 == $selected8)
      {
        $correct = $correct + 1;
      }
      $answer9 = $_POST['answer9'];
      $selected9 = $_POST['selected9'];
      if($answer9 == $selected9)
      {
        $correct = $correct + 1;
      }
      $answer10 = $_POST['answer10'];
      $selected10 = $_POST['selected10'];
       if($answer10 == $selected10)
      {
        $correct = $correct + 1;
      }
      
      
             if($correct > 5 )
             {
              $result = "PASS";
             }
             else
             {
              $result = "FAIL";
             }
             echo "CORRECT -->" . $correct;


      $date = date("Y-m-d");
      
      //insert in Test Conducted Table

      $insert = "insert into test_conducted (tsid,test_date,test_obtain_marks,test_total_marks,test_result) values(".$tsid.",'".$date."',".$correct.",10,'".$result."')";

      echo $insert;    
      if(mysqli_query($conn,$insert))
      {
        echo " Test Conducted...!";
        $subject = "Completed Test";
 
        $message = "NIKOR JOBZ\nYou have Successfully completed Test.\nMarks Obtained : ".$correct." /10";
   
        $to = $_SESSION['client_email'];
   
        mail($to,$subject,$message);
      }
      else
      {
        echo " Failed To Conduct Test...!";
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
    <title>NIKOR JOBZ - Test</title>

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
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> 
    </head>
    <body>
    <!-- start banner Area -->
      <section class="banner-area relative" id="home">  
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row search-page-top d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
              <h1 class="text-white">
              Test      
              </h1>
              <p class="text-white link-nav">
                <a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>Test
              </p>  
            </div>                      
          </div>
        </div>
      </section>
      <!-- End banner Area -->  
      <!-- Test Area -->
     <section class="post-area section-gap" id="test">
        <div class="container">
          <div class="row d-flex justify-content-center">

            <!--Grid column-->
              <div class="col-md-6">
                 <div id="countdown" style="  font-size: 2.5em;text-align: center; color: black;font-weight: bold;">

              </div>

            </div>
          </div>
          <div class="clearfix"></div>
          <br>
          <br>


        		<?php
        		$tsid=0;
				if(isset($_REQUEST) && isset($_REQUEST['tsid']))
				{
					$tsid = $_REQUEST['tsid'];

				}
          ?>
            <input type="hidden" id="tsid" value="<?php echo $tsid;?>">
          <?php

        
                      $counter=0;
                      while($counter < 10)
                      {
                      $rand = rand(1,30);
                      $counter = $counter + 1;
                 	    $getTestData = mysqli_query($conn,"select * from question_answers qa,technical_skills ts where qa.skill_id = ts.skill_id  and qa.is_delete = 0 and qa.is_active = 1 and qa.qid = ".$rand);
                 	 
                      	while($result = mysqli_fetch_array($getTestData))
                      {
                      	
                      	
                      	?>
                          <div class="row">
                      	<table>
                      		<tr>
                      			<td><h1 class="question"><?php echo $counter;?>. <?php echo $result['question'];?></h1></td>
                      		</tr>
                      	</table>
                      	<div class="clearfix"></div>
                      </div>
                        <div class="row">
                      	<table>

                      		<tr>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' style="margin-bottom: 2px;" name='options<?php echo $counter;?>' id='1' value=" <?php echo $result['option1'];?>">  <?php echo $result['option1'];?>
                                    </label>
                                  </div>
                                </row>
                              </div>
                                  </td>
                          
                      			<td>
                               <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                                 <row>
                                   <div class="col-lg-6">
                                    <label class="btn btn-primary"> 
                                      <input type='radio' style="margin-bottom: 2px;" name='options<?php echo $counter;?>' id='2' value=" <?php echo $result['option2'];?>">  <?php echo $result['option2'];?>
                                    </label>
                                  </div>
                                </row>
                              </div>
                          </td>
                      		</tr>
                      		<tr>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons" style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio'  name='options<?php echo $counter;?>' id='3' value = " <?php echo $result['option3'];?>">  <?php echo $result['option3'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' style="margin-bottom: 2px;" name='options<?php echo $counter;?>' id='4' value = " <?php echo $result['option4'];?>">  <?php echo $result['option4'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                             <input type="hidden" id="answer<?php echo $counter;?>" value="<?php echo $result['answer'];?>" >
                      		</tr>
                      	</table>
                      </div>
                        <div class="clearfix"></div>
                      	<?php 

                      }
                  }
                
                      ?>

                      <center>
                          <input type="button" class="genric-btn danger circle" id="Submit" value="Submit" onclick="testsubmit();">
                      </center>

        </div>
    </section>
      <!-- /Test Area -->

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
      <script src="js/test.js"></script>  
      <script type="text/javascript">
      </script>
    </body>
  </html>
