 function CountDown(duration) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $('#countdown').html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#countdown').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
$(document).ready(function() {
          CountDown(600);
          setTimeout(function(){

             var tsid = $("#tsid").val();
             var answer1 = $("#answer1").attr('value');
             var selected1 = $("input[name='options1']:checked").attr('id');
             var answer2 = $("#answer2").val();
             var selected2 = $("input[name='options2']:checked").attr('id');
             var answer3 = $("#answer3").val();
             var selected3 = $("input[name='options3']:checked").attr('id');
             var answer4 = $("#answer4").val();
             var selected4 = $("input[name='options4']:checked").attr('id');
             var answer5 = $("#answer5").val();
             var selected5 = $("input[name='options5']:checked").attr('id');
             var answer6 = $("#answer6").val();
             var selected6 = $("input[name='options6']:checked").attr('id');
             var answer7 = $("#answer7").val();
             var selected7 = $("input[name='options7']:checked").attr('id');
             var answer8 = $("#answer8").val();
             var selected8 = $("input[name='options8']:checked").attr('id');
             var answer9 = $("#answer9").val();
             var selected9 = $("input[name='options9']:checked").attr('id');
             var answer10 = $("#answer10").val();
             var selected10 = $("input[name='options10']:checked").attr('id');

              $.ajax({

                url:"test.php",
                type:"POST",
                data:{
                    tsid:tsid,
                    answer1 : answer1,
                    selected1 : selected1,
                     answer2 : answer2,
                    selected2 : selected2,
                     answer3 : answer3,
                    selected3 : selected3,
                     answer4: answer4,
                    selected4 : selected4,
                     answer5 : answer5,
                    selected5 : selected5,
                     answer6 : answer6,
                    selected6 : selected6,
                     answer7 : answer7,
                    selected7 : selected7,
                     answer8 : answer8,
                    selected8 : selected8,
                     answer9 : answer9,
                    selected9 : selected9,
                     answer10 : answer10,
                    selected10 : selected10

                },
                success:function(data)
                {
                  window.location.href = 'jobseeker-main.php';
                      swal({
                    title: "Test Submited Succesfully",
                    text: "Kindly please check your mail to get your result..!",
                    icon: "success",
                  });

                     
                }
              });                  
             

            },600000);

            $(window).blur(function() {
              
                    swal({
                    title: "Test Failed",
                    text: "You Navigated so test will be ended in 10 seconds..!",
                    icon: "error",
                  });

                    setTimeout(function(){ window.location.href = 'jobseeker-main.php'; },10000);

          });
        });

function testsubmit()
{
             var tsid = $("#tsid").val();
             var answer1 = $("#answer1").attr('value');
             var selected1 = $("input[name='options1']:checked").attr('id');
             var answer2 = $("#answer2").val();
             var selected2 = $("input[name='options2']:checked").attr('id');
             var answer3 = $("#answer3").val();
             var selected3 = $("input[name='options3']:checked").attr('id');
             var answer4 = $("#answer4").val();
             var selected4 = $("input[name='options4']:checked").attr('id');
             var answer5 = $("#answer5").val();
             var selected5 = $("input[name='options5']:checked").attr('id');
             var answer6 = $("#answer6").val();
             var selected6 = $("input[name='options6']:checked").attr('id');
             var answer7 = $("#answer7").val();
             var selected7 = $("input[name='options7']:checked").attr('id');
             var answer8 = $("#answer8").val();
             var selected8 = $("input[name='options8']:checked").attr('id');
             var answer9 = $("#answer9").val();
             var selected9 = $("input[name='options9']:checked").attr('id');
             var answer10 = $("#answer10").val();
             var selected10 = $("input[name='options10']:checked").attr('id');

              $.ajax({

                url:"test.php",
                type:"POST",
                data:{                    
                    tsid:tsid,
                    answer1 : answer1,
                    selected1 : selected1,
                     answer2 : answer2,
                    selected2 : selected2,
                     answer3 : answer3,
                    selected3 : selected3,
                     answer4: answer4,
                    selected4 : selected4,
                     answer5 : answer5,
                    selected5 : selected5,
                     answer6 : answer6,
                    selected6 : selected6,
                     answer7 : answer7,
                    selected7 : selected7,
                     answer8 : answer8,
                    selected8 : selected8,
                     answer9 : answer9,
                    selected9 : selected9,
                     answer10 : answer10,
                    selected10 : selected10

                },
                success:function(data)
                {
                  
                  window.location.href = 'jobseeker-main.php';


                        swal({
                    title: "Test Submited Succesfully",
                    text: "Kindly please check your mail to get your result..!",
                    icon: "success",
                  });
                     
                }
              });                  
}