function prevstep2()
{
	$("#1step1").attr('class', 'active');	
	$("#1step2").attr('class', 'disabled');
	$("#1step3").attr('class', 'disabled');
	$("#1step4").attr('class', 'disabled');
	$("#2step1").attr('class', 'tab-pane active');	
	$("#2step2").attr('class', 'tab-pane');
	$("#2step3").attr('class', 'tab-pane');
	$("#2step4").attr('class', 'tab-pane');

}
function prevstep3()
{
	$("#1step1").attr('class', 'active');	
	$("#1step2").attr('class', 'active');
	$("#1step3").attr('class', 'disabled');
	$("#1step4").attr('class', 'disabled');
	$("#2step1").attr('class', 'tab-pane');	
	$("#2step2").attr('class', 'tab-pane active');
	$("#2step3").attr('class', 'tab-pane');
	$("#2step4").attr('class', 'tab-pane');

}
function prevstep4()
{
	$("#1step1").attr('class', 'active');	
	$("#1step2").attr('class', 'active');
	$("#1step3").attr('class', 'active');
	$("#1step4").attr('class', 'disabled');
	$("#2step1").attr('class', 'tab-pane');	
	$("#2step2").attr('class', 'tab-pane');
	$("#2step3").attr('class', 'tab-pane active');
	$("#2step4").attr('class', 'tab-pane');

}

function nextstep1()
{
	$("#1step1").attr('class', 'active');	
	$("#1step2").attr('class', 'active');
	$("#1step3").attr('class', 'disabled');
	$("#1step4").attr('class', 'disabled');
	$("#2step1").attr('class', 'tab-pane');	
	$("#2step2").attr('class', 'tab-pane active');
	$("#2step3").attr('class', 'tab-pane');
	$("#2step4").attr('class', 'tab-pane');
	
}

function nextstep2()
{
	$("#1step1").attr('class', 'active');
	$("#1step2").attr('class', 'active');	
	$("#1step4").attr('class', 'disabled');
	$("#1step3").attr('class', 'active');
	$("#2step1").attr('class', 'tab-pane');	
	$("#2step2").attr('class', 'tab-pane');
	$("#2step3").attr('class', 'tab-pane active');
	$("#2step4").attr('class', 'tab-pane');

}
function nextstep3()
{ 
	$("#1step1").attr('class', 'active');
	$("#1step2").attr('class', 'active');
	$("#1step3").attr('class', 'active');
	$("#1step4").attr('class', 'active');
	$("#2step1").attr('class', 'tab-pane');	
	$("#2step2").attr('class', 'tab-pane');
	$("#2step3").attr('class', 'tab-pane');
	$("#2step4").attr('class', 'tab-pane active');

}

function formsubmit()
{
	$("#1step1").attr('class', 'disabled');
	$("#1step2").attr('class', 'disabled');
	$("#1step3").attr('class', 'disabled');
	$("#1step4").attr('class', 'disabled');

     //Company Information
	var company_name = $("#company_name").val();
	var company_address = $("#address").val();
	var company_pincode = $("#company_pincode").val();
	var company_city = $("#company_city"). children("option:selected"). val();
	
   //Company contact Information
	var company_mobile = $("#company_mobile").val();
	var company_email = $("#company_email").val();
	var company_password = $("#company_password").val();
	var company_confirmpassword = $("#company_confirmpassword").val();

	
   	//email variables
	var subject = "Registered Successfully";
	var message = "NIKOR JOBZ \nWelcome to NIKOR JOBZ  family\nEmail ID : "+company_email+"\nPassword : "+company_password;

	var company_name_err = $("#company_name_err").text();
	var company_address_err = $("#address_err").text();
	var company_pincode_err = $("#company_pincode_err").text();
	var company_country_err = $("#company_country_err").text();
	var company_state_err = $("#company_state_err").text();
	var company_city_err = $("#company_city_err").text();
	var company_mobile_err =  $("#company_mobile_err").text();
	var company_email_err =   $("#company_email_err").text();
	var company_password_err =  $("#company_password_err").text();
	var company_cpassword_err =  $("#company_cpassword_err").text();
	if(company_name_err == "" && company_address_err== "" && company_pincode_err=="" && company_country_err == "" && company_state_err == "" && company_city_err == "" && company_email_err == "" && company_mobile_err == "" && company_password_err == "" && company_cpassword_err == "")
	{
	
   $.ajax({

                url:"company-registration.php",
                type:"POST",
                data:{
					company_name:company_name,
			  		company_address:company_address,
			  		company_pincode:company_pincode,
			  		company_city:company_city,
			  		company_mobile:company_mobile,
			  		company_email:company_email,
			  		company_password:company_password,
				
                },
                success:function(data)
                {
                	
                	if(company_name != "" && company_address != "" && company_pincode != "" && company_country != "" && company_state != "" && company_city != "" && company_email != "" && company_mobile != "" && company_password != "" )
                	{
           		       swal({
							  title: "Registered",
							  text: "Registered Successfully",							  
							  icon: "success",
							});
           		       $(location).attr('href', 'index.php');
           		      }
           		      else
           		      {
           		      	swal({
							  title: "Not Registered",
							  text: "Something Went Wrong",
							  icon: "error",
							});
           		      }
           		       
           		       $.ajax({

	                url:"mail.php",
	                type:"POST",
	                data:{
						   message : message,
						   to : company_email,
						   subject : subject
	                },
	                success:function(data)
	                {
	                }
	              });   
                }
              });      

              }
              else
              {
              	 swal({
							  title: "Not Registered",
							  text: "Something Went Wrong",
							  icon: "error",
							});
              }            


}

$(document).ready(function(){

$("#company_name").blur(function(){

	var company_name = $("#company_name").val();
	var regex = company_name.match("^[a-zA-Z ]{5,25}$");
    if (regex) 
    {
    	$("#company_name").css("border","");
    	$("#company_name_err").text("");

    }
    else
    {
    	$("#company_name").css("border","5px solid #c0392b");
    	$("#company_name_err").text("Company Name should have minimum 5 characters..!");
    	
    }
   

});

$("#address").blur(function(){
	
	var company_address = $("#address").val();
	
    if (company_address != "") 
    {
    	$("#address").css("border","");
    	$("#address_err").text("");

    }
    else
    {
    	$("#address").css("border","5px solid #c0392b");
    	$("#address_err").text("Company Address is required..!");

    	
    }
   

});



$("#company_pincode").blur(function(){
	
	var company_pincode = $("#company_pincode").val();
	var regex = company_pincode.match("^[0-9]{6}$");
    if (regex) 
    {
    	$("#company_pincode").css("border","");
    	$("#company_pincode_err").text("");

    }
    else
    {
    	$("#company_pincode").css("border","5px solid #c0392b");
    	$("#company_pincode_err").text("Company Pincode is Invalid..!");

    	
    }

});


$("#company_country").change(function(){
	
	var company_country = $("#company_country").children("option:selected"). val();
	
    if (company_country != "") 
    {
    	$("#company_country").css("border","");
    	$("#company_country_err").text("");

    }
    else
    {
    	$("#company_country").css("border","5px solid #c0392b");
    	$("#company_country_err").text("Please Choose Company Country..!");

    	
    }


});

$("#company_state").change(function(){
	
	var company_state = $("#company_state").children("option:selected"). val();
	
    if (company_state != "") 
    {
    	$("#company_state").css("border","");
    	$("#company_state_err").text("");

    }
    else
    {
    	$("#company_state").css("border","5px solid #c0392b");
    	$("#company_state_err").text("Please Choose Company State..!");

    	
    }
    

});

$("#company_city").change(function(){
	
	var company_city = $("#company_city").children("option:selected"). val();
	
    if (company_city != "") 
    {
    	$("#company_city").css("border","");
    	$("#company_city_err").text("");

    }
    else
    {
    	$("#company_city").css("border","5px solid #c0392b");
    	$("#company_city_err").text("Please Choose Company City..!");

    	
    }
    

});

$("#company_mobile").blur(function(){
	
	var company_mobile = $("#company_mobile").val();
	var regex = company_mobile.match("^[6789]{1}[0-9]{9}$");
    if (regex) 
    {
    	$("#company_mobile").css("border","");
    	$("#company_mobile_err").text("");

    }
    else
    {
    	$("#company_mobile").css("border","5px solid #c0392b");
    	$("#company_mobile_err").text("Company Mobile is Invalid..!");

    	
    }

});

$("#company_email").blur(function(){
	
	var company_email = $("#company_email").val();
	var regex = company_email.match("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if (regex) 
    {
    	$("#company_email").css("border","");
    	$("#company_email_err").text("");

    }
    else
    {
    	$("#company_email").css("border","5px solid #c0392b");
    	$("#company_email_err").text("Company Email is Invalid..!");

    	
    }

});


$("#company_password").blur(function(){
	
	var company_password = $("#company_password").val();
	var regex = company_password.match("^[a-zA-z0-9]{5,10}$");
    if (regex) 
    {
    	$("#company_password").css("border","");
    	$("#company_password_err").text("");

    }
    else
    {
    	$("#company_password").css("border","5px solid #c0392b");
    	$("#company_password_err").text("Company Password should be alphanumeric characters (minimum 5 maximum 10)..!");

    	
    }

});


$("#company_confirmpassword").blur(function(){
	
	var company_password = $("#company_password").val();
	var company_confirmpassword = $("#company_confirmpassword").val();
	
    if (company_password == company_confirmpassword) 
    {
    	$("#company_confirmpassword").css("border","");
    	$("#company_cpassword_err").text("");

    }
    else
    {
    	$("#company_confirmpassword").css("border","5px solid #c0392b");
    	$("#company_cpassword_err").text("Password Not Matched..!");
    }

});

});