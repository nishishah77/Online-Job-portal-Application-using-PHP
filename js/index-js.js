function login_nav_click()
{
	 $(".form-popup").css("display", "inline");
    $("#myForm").modal("show");


}
function loginalertbox()
{
					          swal({
							  title: "Login Failed",
							  text: "Invalid Email Or Password..!",
							  icon: "error",
							});
           		       
}
function search()
{

	var city =  $("#search_city"). children("option:selected"). val();
	var designation =  $("#search_designation"). children("option:selected"). val();
	if(city != "")
	{
		if(designation == "")
		{
			$(location).attr('href', 'jobposts.php?city='+city);			

		}
		else
		{
			$(location).attr('href', 'jobposts.php?city='+city+'&designation='+designation);
		}
	
	}
	else
	{      	
       swal({
		  title: "Invalid Request",
		  text: "Please Select City",
		  icon: "error",
		});
                               
	}

}
