<?php
require("common.php");

$msg= ' ';


$msg1=' ';       
 $msg2=' ';
 $msgwrng=' ';
if(isset($_POST['sunmit'])) {
  $name=$_POST['name'];
  $usernames=$_POST['user'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
    $cpwd=$_POST['cpwd'];

  $phone=$_POST['phone'];
  
   if ($pwd == $cpwd){
$queryy = "SELECT * FROM users WHERE username='$usernames'";
  $results = mysqli_query($con, $queryy)or die($mysqli_error($con));
  $nums = mysqli_num_rows($results);
  
 
  if ($nums != 0) {
    $msg1 = "Username Already Exists";
    
    
  }
   else {
    $queryyy = "INSERT INTO users(name,username,password,email,contact)VALUES('$name','$usernames','$cpwd','$email','$phone')";
    mysqli_query($con, $queryyy) or die(mysqli_error($con));
    $msg2 =" SIGNED-UP SUCCESSFULLY";
   }
}
 else {
    $msgwrng='enter correct passwords';
}
}
// Query checks if the email and password are present in the database.
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
    <nav class="navbar" style="background-color: #f9ea84">    
        <a href="index.php" >   <button  style="width:7em; float:left;height:4.5em;font-size: 15px;"><span class="glyphicon glyphicon-circle-arrow-left"></span>BACK</button></a>
         <center>  <h1>ONLINE TICKET COUNTER</h1><br>
        <caption>Now book your tickets from anywhere</caption></center>
    
      
  </nav>
        <div>
        <form  class="container" action=" " method="post">
    <div class="imgcontainer">
      
      <img src="img_avatar2.png" width="10%" height="15%" alt="Avatar" class="avatar">
    </div>

            <div class="container" style="color:black">
         
        <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter name" name="name" required>

      <label for="user"><b>User Name</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>
      <label for="email"><b>email ID</b></label>
      <input type="email" placeholder="Enter email" name="email" required>
      <label for="pwd"><b>New Password</b></label>
      <input type="password" id="myInput" placeholder="Enter New Password" name="pwd" required hidden>
      <input type="checkbox" onclick="myFunction()">Show Password<br>
      <label for="cpwd" ><b>Confirm Password</b></label>
      <input type="password" id="myInputs" placeholder="Re-Enter Password" name="cpwd" required hidden>
      <input type="checkbox" onclick="myFunctions()">Show Password<br>
      <label for="phone"><b>Phone Number</b></label>
      <input type="number" placeholder="Enter Phone Number" name="phone" required>
      
        
      <input type="submit" value="Sign Up" name="sunmit" style="background-color: black;color: white"> 
          <?php if($msg2 != ' '): ?>
                   <div style="color:green;font-family:Audiowide;font-size: 2em;background-color:#e6ccff"><?php echo $msg2; ?></div>
                   <?php endif; ?>
                    <?php if($msg1 != ' '): ?>
                   <div style="color:green;font-family:Audiowide;font-size: 2em;background-color:#e6ccff"><?php echo $msg1; ?></div>
                   <?php endif; ?>
                    <?php if($msgwrng != ' '): ?>
                   <div style="color:green;font-family:Audiowide;font-size: 2em;background-color:#e6ccff"><?php echo $msgwrng; ?></div>
                   <?php endif; ?>
    </div>
        </form>
        </div>
          <script>
      function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

 function myFunctions() {
    var x = document.getElementById("myInputs");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

      </script>
