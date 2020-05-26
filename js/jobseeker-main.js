function modify()
{
	var client_name = $("#client_name").val();	
	var client_address = $("#client_address").val();
	var client_pincode = $("#client_pincode").val();
	var client_mobile = $("#client_mobile").val();
	var client_email = $("#client_email").val();
	
			$.ajax({

                url:"jobseeker-main.php",
                type:"POST",
                data:{
					client_name:client_name,
			  		client_address:client_address,
			  		client_pincode:client_pincode,			  		
			  		client_mobile:client_mobile,
			  		client_email:client_email
                },
                success:function(data)
                {
           		       swal({
							  title: "Modified",
							  text: "Modified Details Successfully",
							  icon: "success"
							});
           		       
                }
              });                  

	
}
function reset_password()
{
	var current_password = $("#current_password").val();
	var new_password = $("#new_password").val();
	var id = $("#id").val();
	var to = $("#email_id").val();
	var phone = $("#phone").val();
	var password = $("#password").val();
	var message = " NIKOR  JOBZ \nNew Password : " + new_password;
	var subject ="Your password has been reset";
	if(password == current_password)
	{
				//modify password
				$.ajax({

                url:"jobseeker-main.php",
                type:"POST",
                data:{
					   new_password : new_password
                },
                success:function(data)
                {
           		       swal({
							  title: "Success",
							  text: "Password Reset Successfully..!",
							  icon: "success"
							});

           		     
                }
              }); 
				//email
                $.ajax({

                url:"mail.php",
                type:"POST",
                data:{
					   message : message,
					   to : to,
					   subject : subject
                },
                success:function(data)
                {
                }
              });   

                //sms
                $.ajax({

                url:"sms.php",
                type:"POST",
                data:{
					   msg : message,
					   phone : phone
					  
                },
                success:function(data)
                {
                }
              });                          
	}
	else
	{
		//if current password doesn't match
		swal({
		  title: "Error",
		  text: "Invalid Current Password..!",
		  icon: "error"
		});
	}


	
}