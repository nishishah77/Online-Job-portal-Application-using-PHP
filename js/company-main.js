function delete_post(id)
{
	$.ajax({

                url:"company-main.php",
                type:"POST",
                data:{
						post_id:id
			  		},
                success:function(data)
                {

                	 swal({
							  title: "Deleted",
							  text: "Deleted Post Successfully",
							  icon: "success"
							});

							
           		       
                }
          });

}
function modify()
{
	var company_name = $("#company_name").val();	
	var company_address = $("#company_address").val();
	var company_pincode = $("#company_pincode").val();
	var company_mobile = $("#company_mobile").val();
	var company_email = $("#company_email").val();
	
			$.ajax({

                url:"company-main.php",
                type:"POST",
                data:{
					company_name:company_name,
			  		company_address:company_address,
			  		company_pincode:company_pincode,			  		
			  		company_mobile:company_mobile,
			  		company_email:company_email
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
	var phone = $("#phone").val();
	var id = $("#id").val();
	var to = $("#email_id").val();
	var password = $("#password").val();
	var message = " NIKOR  JOBZ \nNew Password : " + new_password;
	var subject ="Your password has been reset";
	if(password == current_password)
	{			
				//reset password
				$.ajax({

                url:"company-main.php",
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

function addpost()
{
	var city = $("#company_city"). children("option:selected"). val();
	var percentage10 = $("#10thpercentage").val();
	var percentage12 = $("#12thpercentage").val();
	var percentageug = $("#ugpercentage").val();
	var percentagepg = $("#pgpercentage").val();
	var designation = $("#designation"). children("option:selected"). val();
	var description = $("#description").val();
	var vacancy = $("#vacancy").val();

	//Technical Skills
	var skills = [];
            $.each($("input[name='skills']:checked"), function(){
                skills.push($(this).val());
            });            
	var skills_str = skills.join(", ");

	//reset password
				$.ajax({

                url:"company-main.php",
                type:"POST",
                data:{
					   city : city,
					   percentage10 : percentage10,
					   percentage12 : percentage12,
					   percentageug : percentageug,
					   percentagepg : percentagepg,
					   description : description,
					   designation : designation,
					   vacancy : vacancy,
					   skills : skills_str
					  },
                success:function(data)
                {
                	
		           	swal({
				  title: "Success",
				  text: "Post added Successfully..!",
				  icon: "success"
				});

           		     
                }
              }); 


}