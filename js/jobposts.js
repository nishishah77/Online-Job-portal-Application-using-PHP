function pleaselogin()
{
	  swal({
		  title: "Please Login",
		  text: "Login First",
		  icon: "error",
		});
}
function schedule_test()
{
	var test_date = $("#test_date").val();
	var client_pid = $('#client_pid').val();
	var jobpost_id = $("#jobpost_id").val();
	if(test_date == "" || client_pid == 0 || jobpost_id == "")
	{
		 swal({
		  title: "Error",
		  text: "Something Went Wrong",
		  icon: "error",
		});
	}
	else
	{
		$(location).attr('href', 'jobposts.php?client_pid='+client_pid+'&test_date='+test_date+"&jobpost_id="+jobpost_id);
	}
}