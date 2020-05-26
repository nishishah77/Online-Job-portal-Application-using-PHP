function contact()
{
	var name = $("#name").val();
	var email = $("#email").val();
	var message = $("#message").val();
	$.ajax({

                url:"contact.php",
                type:"POST",
                data:{
					name:name,
					email:email,
					message:message
                },
                success:function(data)
                {
           		       swal({
							  title: "Thank You",
							  text: "Our Executive will shrotly contact you..!",
							  icon: "success"
							});
           		       
                }
              });                  
}

$(document).ready(function(){

	$("#name").blur(function(){

		var name = $("#name").val();
		var regex = name.match("^[a-zA-Z ]{3,25}$");
	    if (regex) 
	    {
	    	$("#name").css("border","");
	    	$("#name_err").text("");

	    }
	    else
	    {
	    	$("#name").css("border","5px solid #c0392b");
	    	$("#name_err").text("Name should have minimum 3 characters..!");
	    	
	    }
	});

	$("#message").blur(function(){
	
	var message = $("#message").val();
	
    if (message != "") 
    {
    	$("#message").css("border","");
    	$("#message_err").text("");

    }
    else
    {
    	$("#message").css("border","5px solid #c0392b");
    	$("#message_err").text("Message is required..!");

    	
    }
   

});

	$("#email").blur(function(){
	
	var email = $("#email").val();
	var regex = email.match("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if (regex) 
    {
    	$("#email").css("border","");
    	$("#email_err").text("");

    }
    else
    {
    	$("#email").css("border","5px solid #c0392b");
    	$("#email_err").text("Email is Invalid..!");

    	
    }

});
});