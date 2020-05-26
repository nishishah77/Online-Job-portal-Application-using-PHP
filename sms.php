<?php

if(isset($_POST) && isset($_POST['msg']) && isset($_POST['phone']))
{
	$phone = $_POST['phone'];
	$msg = $_POST['msg'];
	//post
	$url="https://www.sms4india.com/api/v1/sendCampaign";
	$message = urlencode($msg);// urlencode your message
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
	curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=E064DXDD4PJW022I4W76ZADWCNQB4KDZ&secret=ZILQXD9RE30NYDH9&usetype=stage&phone=".$phone."&senderid=NIKORJOBZ&message=".$message);// post data
	// query parameter values must be given without squarebrackets.
	 // Optional Authentication:
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);
	echo $result;
}
else
{
	header("location:index.php");
}

?>