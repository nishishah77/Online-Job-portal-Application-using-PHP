<?php

	
if(isset($_POST) && isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['message']) )
{
   $subject = $_POST['subject'];
   //the message
   $message = $_POST['message'];
   //recipient email here
   $to = $_POST['to'];
   //send email
   mail($to,$subject,$message);
}


?>