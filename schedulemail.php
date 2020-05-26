<?php
   include "db.php";
   
    $tomorrow = date("Y-m-d", strtotime('tomorrow'));
    
   $reminder_date = mysqli_query($conn,"select cp.client_email,c.company_name from company_job_post j,company c, test_scheduled ts,clientpersonal cp where cp.client_pid = ts.client_pid and j.company_post_id = ts.company_post_id and c.company_id = j.company_id and ts.test_date = '".$tomorrow."'");
   
   while($result = mysqli_fetch_array($reminder_date))
   {
			$to = $result['client_email'];
			$subject = "Reminder: TEST";
  			$message = "NIKOR JOBZ \nYou have scheduled your test for ".$result['company_name']." on tomrrow. Link of test will be expired at 11:59 pm on ".$tomorrow;
  			mail($to,$subject,$message);
  			
        
   }

	


?>