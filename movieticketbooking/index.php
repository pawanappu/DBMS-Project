<?php
require("common.php");

$msg= ' ';



       if(isset($_POST['submit'])) {
            $username = $_POST['uname'];
            $username = mysqli_real_escape_string($con, $username);
            $password = $_POST['psw'];
            $password = mysqli_real_escape_string($con, $password);
            $query = "SELECT user_id, username FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
 $msg = "Invalid username id or Password";
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['username'] = $row['username'];
  $_SESSION['user_id'] = $row['user_id'];
  header('location: booking.php');
}
       }

$msg1=' ';       
 $msg2=' ';
if(isset($_POST['sunmit'])) {
  $name=$_POST['name'];
  $usernames=$_POST['user'];
  $email=$_POST['email'];
  $pwd=$_POST['cpwd'];
  $phone=$_POST['phone'];
  
$queryy = "SELECT * FROM users WHERE username='$usernames'";
  $results = mysqli_query($con, $queryy)or die($mysqli_error($con));
  $nums = mysqli_num_rows($results);
  
 
  if ($nums != 0) {
    $msg1 = "Username Already Exists";
    echo $msg1;
    
  }
   else {
    $queryyy = "INSERT INTO users(name,username,password,email,contact)VALUES('$name','$usernames','$pwd','$email','$phone')";
    mysqli_query($con, $queryyy) or die(mysqli_error($con));
    $msg2 =" SIGNED-UP SUCCESSFULLY";
   }
}   
// Query checks if the email and password are present in the database.
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ONLINE TICKET BOOKING</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
   
  <nav class="navbar" style="background-color: #f9ea84">    
      
        <button onclick="document.getElementById('id01').style.display='block'" style="width:7em; float: right;height:4.5em;">Login</button>

<div id="id01" class="modal">
  
    <form class="modal-content animate" action=" " method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" width="10%" height="10%" alt="Avatar" class="avatar">
    </div>

    <div class="container">
         <?php if($msg != ' '): ?>
                   <div id="demo" style="color: red;"><?php echo $msg; ?></div>
                   <?php endif; ?>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="myInput" placeholder="Enter Password" name="psw" required>
      <input type="checkbox" onclick="myFunction()">Show Password<br>
        
      <button type="submit" name="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <center>  <h1>ONLINE TICKET COUNTER</h1><br>
        <caption>Now book your tickets from anywhere</caption></center>
    
      
  </nav>
    <marquee behaviour="slide" scrollamount="10" style="background-color: #f7612e;font-size: 20px;"><b> NOW SHOWING...! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NOW SHOWING...! &nbsp;&nbsp;&nbsp; NOW SHOWING...! </b></marquee>
    <marquee scrollamount="16">
        <div style="float: left;" class="row">
             <?php
               $query = "SELECT * FROM movie ";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
     <?php 
    $projects = array();
    while ($project =  mysqli_fetch_assoc($result))
    {
        $projects[] = $project;
    }
    foreach ($projects as $project)
    {
?>
    <tr>
        <td><?php echo '<img height="500em" src="data:image;base64,'.$project['movie_poster'].'" />'; ?></td>
        
    </tr>
<?php
    }
?>       
       
    </div></marquee>
        
        <div style="background-color:rgb(225, 237, 97); display: inline; font-size: 20px">
            New User?<a href="signup.php" style="width:7em;height:4.5em;">Sign Up</a>
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

      </script>

   
       
        <div style="float: right;"  id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>


<?php

?>
