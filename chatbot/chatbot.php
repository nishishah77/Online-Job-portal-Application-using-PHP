<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

/*
.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.container1 img {
  float: left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

div.sticky {
  position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  margin-top: 200px;
  background-color: #ddd;
  padding: 10px 0 0 10px;
  font-size: 20px;
}
/*.square {
  float: bottom;
  height: auto;
  width: 810px;
  padding: 8px;
  background-color: #fff;
  border: 2px solid #dedede;
 
}*/

.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
  
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;

}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;

}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  height: 50px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<button class="open-button" onclick="openForm()">Chat</button>

<span id="ref">
<!-- <div class="square"> -->
  <div class="chat-popup" id="chatbot">
    <form action="/chatbot/chatbot.php" class="form-container">
<center><h2>Chat Messages</h2></center>
<br/>
  <?php
    $query="select * from chats ORDER by datetime = CAST(CURRENT_TIMESTAMP AS DATE) ";
    $res=mysqli_query($conn,$query);

    while($data=mysqli_fetch_array($res)){
      $user=$data['user'];
      $chatbot=$data['chatbot'];
      $datetime=$data['datetime'];
  ?>

  <div class="chat-popup">
    <img src="user.jpg" alt="Avatar">
    <p id="message"><?php echo $user;?></p>
    <span class="time-right"><?php echo $datetime;?></span>
  </div>

  <div class="form-container textarea">
    <img src="chatbot.png" alt="Avatar" class="right">
    <p><?php echo $chatbot;?></p>
    <span class="time-left"><?php echo $datetime;?></span>
  </div>

<?php } ?>
<div class="sticky">
  <div class="row">
     <div class="col-md-12">
       <div class="input-group mb-3">
          <input type="text" class="form-container" id="msg">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
                 <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </div>
        </div>
   </div>
  </div>
</div>
</div>
</span>
<br/>

<script type="text/javascript">
  function send(){
    var text=$('#msg').val().toLowerCase();
     alert(text);
     $.ajax({
                type:"post",
                url:"mysearch.php",
                data:{text:text},
                success:function(data){
                    alert(data);
                    $('#ref').load('#ref');
                }
      });
  }

  function openForm() {
  document.getElementById("chatbot").style.display = "block";
}

function closeForm() {
  document.getElementById("chatbot").style.display = "none";
}
</script>

</body>
</html>




