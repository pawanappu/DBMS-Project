<?php
require("common.php");
if (isset($_SESSION['username'])) {
    header('location: admin_home.php');
}

$msg= ' ';



       if(isset($_POST['submit'])) {
            $user = $_POST['user'];
            $user = mysqli_real_escape_string($con, $user);
            $password = $_POST['password'];
            $password = mysqli_real_escape_string($con, $password);
            $query = "SELECT id,username FROM admin WHERE username='" . $user . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
 $msg = "Invalid E-mail id or Password";
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['username'] = $row['username'];
  $_SESSION['id'] = $row['id'];
  header('location: admin_home.php');
}
       }
        
// Query checks if the email and password are present in the database.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONLINE TICKET COUNTER ADMIN LOGIN</title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
    <body>
       
        
       <div class="container">
           <div class="loginbox">
               <img src='img_avatar2.png' class="login">
               <h2 id="abc">LOGIN AS ADMIN</h2>
               <form action=" " method="post">
                   
                   <?php if($msg != ' '): ?>
                   <div id="demo" style="color: red;"><?php echo $msg; ?></div>
                   <?php endif; ?>
                   <p>USERNAME</p>
                   <input type="text" name="user" placeholder="enter username">
                   <p>Password</p>
                   <input type="password" name="password" placeholder="password" >  
                   <input type="submit" name="submit" value="signin">
                   
               </form>
           </div>
            
        </div>
        
        <div style="float: right;"  id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </body>
</html>
