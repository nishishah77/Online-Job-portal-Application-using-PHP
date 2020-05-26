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
function skip()
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

	//Personal
	var client_name = $("#client_name").val();
	var client_dob = $("#client_dateofbirth").val();
	var client_address = $("#address").val();
	var client_pincode = $("#client_pincode").val();
	var client_city = $("#client_city"). children("option:selected"). val();
	
	var client_mobile = $("#client_mobile").val();
	var client_email = $("#client_email").val();
	var client_password = $("#client_password").val();
	var client_confirm_password = $("#client_confirmpassword").val();

	//Educational
	var percentage10 = $("#10percentage").val();
	var board10 = $("#10board").val();
	var percentage12 = $("#12percentage").val();
	var board12 = $("#12board").val();
	var ugdegree = $("#ugdegree").val();
	var uguniversity = $("#uguniversity").val();	
	var percentageug = $("#ugpercentage").val();	
	var pgdegree = $("#pgdegree").val();
	var pguniversity = $("#pguniversity").val();	
	var percentagepg = $("#pgpercentage").val();	


	//Work Experience
	var companyname = $("#companyname").val();	
	var companyaddress = $("#company_address").val();
	var companypincode = $("#company_pincode").val();
	var companycity = $("#company_city"). children("option:selected"). val();
	var companymobile = $("#company_mobile").val();
	var experience = $("#experience").val();
	var companyemail = $("#company_email").val();
	var designation = $("#designation"). children("option:selected"). val();
	
	//Technical Skills
	var count_skills = 0;
	var skills = [];
            $.each($("input[name='skills']:checked"), function(){
                skills.push($(this).val());
                count_skills = count_skills + 1;
            });            
	var skills_str = skills.join(", ");

	//email variables
	var subject = "Registered Successfully";
	var message = "NIKOR JOBZ \nWelcome to NIKOR JOBZ  family\nEmail ID : "+client_email+"\nPassword : "+client_password;

	var client_name_err = $("#client_name_err").text();
	var client_dateofbirth_err = $("#client_dateofbirth_err").text();
	var client_address_err = $("#client_address_err").text();
	var client_pincode_err = $("#client_pincode_err").text();
	var client_country_err = $("#client_country_err").text();
	var client_state_err = $("#client_state_err").text();
	var client_city_err = $("#client_city_err").text();
	var client_mobile_err = $("#client_mobile_err").text();
	var client_eamil_err = $("#client_email_err").text();
	var client_password_err = $("#client_password_err").text();
	var client_cpassword_err = $("#client_cpassword_err").text();
	var percentage10_err = $("#10percentage_err").text();
	var percentage12_err = $("#12percentage_err").text();
	var board10_err = $("#10board_err").text();
	var board12_err = $("#12board_err").text();
	var ugpercentage_err = $("#ugpercentage_err").text();
	var ugdegree_err = $("#ugdegree_err").text();
	var uguniversity_err = $("#uguniversity_err").text();
	var pgpercentage_err = $("#pgpercentage_err").text();
	var pgdegree_err = $("#pgdegree_err").text();
	var pguniversity_err = $("#pguniversity_err").text();


	if( client_name_err == "" && client_dateofbirth_err == "" && client_address_err=="" 
		&& client_pincode_err=="" && client_country_err=="" && client_state_err=="" &&
		 client_city_err == "" && client_mobile_err == "" && client_eamil_err == "" && 
		 client_password_err == "" &&  client_cpassword_err == "" && percentage10_err == "" && 
		 percentage12_err == "" && board10_err == "" && board12_err == "" && ugpercentage_err == "" 
		 && pgpercentage_err == "" && uguniversity_err == "" && pguniversity_err == "" &&
		 ugdegree_err == "" && pgdegree_err == "" && count_skills >= 2 )
	{
			$.ajax({

                url:"jobseeker-registration.php",
                type:"POST",
                data:{
					client_name:client_name,
			  		client_dob:client_dob,
			  		client_address:client_address,
			  		client_pincode:client_pincode,			  		
			  		client_city:client_city,
			  		client_mobile:client_mobile,
			  		client_email:client_email,
			  		client_password:client_password ,
			  		percentage10:percentage10,
					board10:board10,
					percentage12:percentage12,
					board12:board12,
					ugdegree:ugdegree,
					uguniversity:uguniversity,
					percentageug:percentageug,
					pgdegree:pgdegree,
					pguniversity:pguniversity,
					percentagepg:percentagepg,
					companyname:companyname,
					companyaddress:companyaddress,
					companypincode:companypincode,
					companycity:companycity,
					companymobile:companymobile,
					experience:experience,
					companyemail:companyemail,                   	
                    designation:designation,
                    skills:skills_str

                },
                success:function(data)
                {
                	if(client_name != "" && client_dateofbirth != "" && client_address != "" &&
                	  client_city != "" && client_pincode != "" && client_email != "" && 
                	  client_password != "" && client_confirmpassword !="" && percentage10 != "" && 
                	  percentage12 != ""  && percentageug != "" && board10 != "" && board12 != "" && 
                	  uguniversity != "" && ugdegree != "")
           		       {
           		       swal({
							  title: "Registered",
							  text: "Registered Successfully",
							  icon: "success",
							});
           		       
	           		       $.ajax({

		                url:"mail.php",
		                type:"POST",
		                data:{
							   message : message,
							   to : client_email,
							   subject : subject
		                },
		                success:function(data)
		                {}
		              });   
	           		  $(location).attr('href', 'index.php');
	           	  } 
	           	  else
	           	  {
	           	  	swal({
					  title: "Error",
					  text: "Something Went Wrong",
					  icon: "error",
					});
	           	  }      
                }
              }); 


	}
	else
	{
		swal({
		  title: "Error",
		  text: "Something Went Wrong",
		  icon: "error",
		});

	}

}

$(document).ready(function(){

	$("#client_name").blur(function(){

		var client_name = $("#client_name").val();
		var regex = client_name.match("^[a-zA-Z ]{5,25}$");
	    if (regex) 
	    {
	    	$("#client_name").css("border","");
	    	$("#client_name_err").text("");

	    }
	    else
	    {
	    	$("#client_name").css("border","5px solid #c0392b");
	    	$("#client_name_err").text("Client Name should have minimum 5 characters..!");
	    	
	    }

	});

		$("#client_dateofbirth").click(function(){

		var client_dateofbirth = $("#client_dateofbirth").val();
		
	    if (client_dateofbirth != "") 
	    {
	    	$("#client_dateofbirth").css("border","");
	    	$("#client_dateofbirth_err").text("");

	    }
	    else
	    {
	    	$("#client_dateofbirth").css("border","5px solid #c0392b");
	    	$("#client_dateofbirth_err").text("Invalid Client Date Of Birth..!");
	    	
	    }

	});


	$("#address").blur(function(){
	
	var client_address = $("#address").val();
	
    if (client_address != "") 
    {
    	$("#address").css("border","");
    	$("#client_address_err").text("");

    }
    else
    {
    	$("#address").css("border","5px solid #c0392b");
    	$("#client_address_err").text("Client Address is required..!");

    	
    }
   

});



$("#client_pincode").blur(function(){
	
	var client_pincode = $("#client_pincode").val();
	var regex = client_pincode.match("^[0-9]{6}$");
    if (regex) 
    {
    	$("#client_pincode").css("border","");
    	$("#client_pincode_err").text("");

    }
    else
    {
    	$("#client_pincode").css("border","5px solid #c0392b");
    	$("#client_pincode_err").text("Client Pincode is Invalid..!");

    	
    }

});


$("#client_country").change(function(){
	
	var client_country = $("#client_country").children("option:selected"). val();
	
    if (client_country != "") 
    {
    	$("#client_country").css("border","");
    	$("#client_country_err").text("");

    }
    else
    {
    	$("#client_country").css("border","5px solid #c0392b");
    	$("#client_country_err").text("Please Choose Client Country..!");

    	
    }


});

$("#client_state").change(function(){
	
	var client_state = $("#client_state").children("option:selected"). val();
	
    if (client_state != "") 
    {
    	$("#client_state").css("border","");
    	$("#client_state_err").text("");

    }
    else
    {
    	$("#client_state").css("border","5px solid #c0392b");
    	$("#client_state_err").text("Please Choose Client State..!");

    	
    }
    

});

$("#client_city").change(function(){
	
	var client_city = $("#client_city").children("option:selected"). val();
	
    if (client_city != "") 
    {
    	$("#client_city").css("border","");
    	$("#client_city_err").text("");

    }
    else
    {
    	$("#client_city").css("border","5px solid #c0392b");
    	$("#client_city_err").text("Please Choose Client City..!");

    	
    }
    

});

$("#client_mobile").blur(function(){
	
	var client_mobile = $("#client_mobile").val();
	var regex = client_mobile.match("^[6789]{1}[0-9]{9}$");
    if (regex) 
    {
    	$("#client_mobile").css("border","");
    	$("#client_mobile_err").text("");

    }
    else
    {
    	$("#client_mobile").css("border","5px solid #c0392b");
    	$("#client_mobile_err").text("Client Mobile is Invalid..!");

    	
    }

});

$("#client_email").blur(function(){
	
	var client_email = $("#client_email").val();
	var regex = client_email.match("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if (regex) 
    {
    	$("#client_email").css("border","");
    	$("#client_email_err").text("");

    }
    else
    {
    	$("#client_email").css("border","5px solid #c0392b");
    	$("#client_email_err").text("Client Email is Invalid..!");

    	
    }

});


$("#client_password").blur(function(){
	
	var client_password = $("#client_password").val();
	var regex = client_password.match("^[a-zA-z0-9]{5,10}$");
    if (regex) 
    {
    	$("#client_password").css("border","");
    	$("#client_password_err").text("");

    }
    else
    {
    	$("#client_password").css("border","5px solid #c0392b");
    	$("#client_password_err").text("Password should be alphanumeric characters (minimum 5 maximum 10)..!");

    	
    }

});


$("#client_confirmpassword").blur(function(){
	
	var client_password = $("#client_password").val();
	var client_confirmpassword = $("#client_confirmpassword").val();
	
    if (client_password == client_confirmpassword) 
    {
    	$("#client_confirmpassword").css("border","");
    	$("#client_cpassword_err").text("");

    }
    else
    {
    	$("#client_confirmpassword").css("border","5px solid #c0392b");
    	$("#client_cpassword_err").text("Password Not Matched..!");
    }

});

$("#10percentage").blur(function(){
	
	var percentage10 = $("#10percentage").val();
	
    if (percentage10 >= 35 && percentage10 <= 100) 
    {
    	$("#10percentage").css("border","");
    	$("#10percentage_err").text("");

    }
    else
    {
    	$("#10percentage").css("border","5px solid #c0392b");
    	$("#10percentage_err").text("Invalid 10th Percentage..!");
    }

});

$("#10board").blur(function(){
	
	var board10 = $("#10board").val();
	
    var regex = board10.match("^[a-zA-Z ]{4,25}$");
	if (regex) 
	{
    	$("#10board").css("border","");
    	$("#10board_err").text("");

    }
    else
    {
    	$("#10board").css("border","5px solid #c0392b");
    	$("#10board_err").text("Invalid 10th Board Name..!");
    }

});

$("#12percentage").blur(function(){
	
	var percentage12 = $("#12percentage").val();
	
    if (percentage12 >= 35 && percentage12 <= 100) 
    {
    	$("#12percentage").css("border","");
    	$("#12percentage_err").text("");

    }
    else
    {
    	$("#12percentage").css("border","5px solid #c0392b");
    	$("#12percentage_err").text("Invalid 12th Percentage..!");
    }

});

$("#12board").blur(function(){
	
	var board12 = $("#12board").val();
	
    var regex = board12.match("^[a-zA-Z ]{4,25}$");
	if (regex) 
	{
    	$("#12board").css("border","");
    	$("#12board_err").text("");

    }
    else
    {
    	$("#12board").css("border","5px solid #c0392b");
    	$("#12board_err").text("Invalid 12th Board Name..!");
    }

});

$("#ugdegree").blur(function(){
	
	var ugdegree = $("#ugdegree").val();
	
    var regex = ugdegree.match("^[a-zA-Z ]{2,25}$");
	if (regex) 
	{
    	$("#ugdegree").css("border","");
    	$("#ugdegree_err").text("");

    }
    else
    {
    	$("#ugdegree").css("border","5px solid #c0392b");
    	$("#ugdegree_err").text("Invalid UG Degree..!");
    }

});

$("#pgdegree").blur(function(){
	
	var pgdegree = $("#pgdegree").val();
	if(pgdegree != "")
	{
	    var regex = pgdegree.match("^[a-zA-Z ]{2,25}$");
		if (regex) 
		{
	    	$("#pgdegree").css("border","");
	    	$("#pgdegree_err").text("");

	    }
	    else
	    {
	    	$("#pgdegree").css("border","5px solid #c0392b");
	    	$("#pgdegree_err").text("Invalid PG Degree..!");
	    }
	}
	else
	{
		$("#pgdegree").css("border","");
	    $("#pgdegree_err").text("");
	}

});

$("#uguniversity").blur(function(){
	
	var uguniversity = $("#uguniversity").val();
	
    var regex = uguniversity.match("^[a-zA-Z ]{3,25}$");
	if (regex) 
	{
    	$("#uguniversity").css("border","");
    	$("#uguniversity_err").text("");

    }
    else
    {
    	$("#uguniversity").css("border","5px solid #c0392b");
    	$("#uguniversity_err").text("Invalid UG University..!");
    }

});

$("#pguniversity").blur(function(){
	
	var pguniversity = $("#pguniversity").val();
	if(pguniversity != "" )
	{
	    var regex = pguniversity.match("^[a-zA-Z ]{3,25}$");
		if (regex) 
		{
	    	$("#pguniversity").css("border","");
	    	$("#pguniversity_err").text("");

	    }
	    else
	    {
	    	$("#pguniversity").css("border","5px solid #c0392b");
	    	$("#pguniversity_err").text("Invalid PG University..!");
	    }
	}
	else
	{
		$("#pguniversity").css("border","");
	    $("#pguniversity_err").text("");
	}

});

$("#ugpercentage").blur(function(){
	
	var ugpercentage = $("#ugpercentage").val();
	
    if (ugpercentage >= 35 && ugpercentage <= 100) 
    {
    	$("#ugpercentage").css("border","");
    	$("#ugpercentage_err").text("");

    }
    else
    {
    	$("#ugpercentage").css("border","5px solid #c0392b");
    	$("#ugpercentage_err").text("Invalid UG Percentage..!");
    }

});

$("#pgpercentage").blur(function(){
	
	var pgpercentage = $("#pgpercentage").val();
	if(pgpercentage != "")
	{
	    if (pgpercentage >= 35 && pgpercentage <= 100) 
	    {
	    	$("#pgpercentage").css("border","");
	    	$("#pgpercentage_err").text("");

	    }
	    else
	    {
	    	$("#pgpercentage").css("border","5px solid #c0392b");
	    	$("#pgpercentage_err").text("Invalid PG Percentage..!");
	    }
	}
	else
	{
		$("#pgpercentage").css("border","");
	    $("#pgpercentage_err").text("");
	}

});

$("#companyname").blur(function(){

	var company_name = $("#companyname").val();
		if(company_name != "")
		{
	
		var regex = company_name.match("^[a-zA-Z ]{5,25}$");
	    if (regex) 
	    {
	    	$("#companyname").css("border","");
	    	$("#companyname_err").text("");

	    }
	    else
	    {
	    	$("#companyname").css("border","5px solid #c0392b");
	    	$("#companyname_err").text("Company Name should have minimum 5 characters..!");
	    	
	    }
	}
	else
	{
		$("#companyname").css("border","");
	    $("#companyname_err").text("");
	}	   

});

$("#company_pincode").blur(function(){
	
	var company_pincode = $("#company_pincode").val();
	if(company_pincode != "")
	{
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
	}
	else
	{
		$("#company_pincode").css("border","");
	    $("#company_pincode_err").text("");
	}

});



$("#company_mobile").blur(function(){
	
	var company_mobile = $("#company_mobile").val();
	if(company_mobile != "")
	{
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
	}
	else
	{
		$("#company_mobile").css("border","");
	    $("#company_mobile_err").text("");

	}

});

$("#company_email").blur(function(){
	
	var company_email = $("#company_email").val();
	if( company_email != "")
	{
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
	}
	else
	{

    	$("#company_email").css("border","");
    	$("#company_email_err").text("");
	}

});

$("#experience").blur(function(){
	
	var experience = $("#experience").val();
	
	if( experience != "")
	{
	    if (experience >= 0 && experience <= 30) 
	    {
	    	$("#experience").css("border","");
	    	$("#experience_err").text("");

	    }
	    else
	    {
	    	$("#experience").css("border","5px solid #c0392b");
	    	$("#experience_err").text("Experience is Invalid..!");

	    	
	    }
	}
	else
	{
		$("#experience").css("border","");
	    $("#experience_err").text("");

	}

});

});
