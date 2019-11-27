<?php
require("common.php");
if(!isset($_SESSION['username'])) {
    header('location: index.php');
}
$msg= ' ';
if(isset($_POST['submit'])) { 
    $new=$_POST['new'];
    $cnm=$_POST['cnm'];
    if($new == $cnm)
    {
    $result = mysqli_query($con, "SELECT * from users WHERE user_id='" .$_SESSION['user_id'] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["old"] == $row["password"]) {
        mysqli_query($con, "UPDATE users set password='" . $_POST["new"] . "' WHERE user_id='" . $_SESSION['user_id'] . "'");
        $msg= "Password Changed";
    } else
        $msg = "Current Password is not correct";
    }else
        $msg="enter correct passwords"; 
        

}
?>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TICKET BOOKING</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Chau Philomene One' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar"  style="background-color:#f7cf59;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:#333231">
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
        </button>
          <a class="navbar-brand" href="booking.php">ONLINE TICKET BOOKING</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
           
          <ul class="nav navbar-nav" style="font-size: 20px;">
            
            <li><a href="ticket.php">TICKETS</a> </li>
            
           
          
          
        </ul>
        <ul class="nav navbar-nav navbar-right" style="font-size: 20px;">
            
 <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user"></span> SETTINGS<span class="fa fa-caret-down"></span></a>
            <ul class="dropdown-menu">
                <li><a href="editprofileuser.php">Edit profile</a></li>
                <li><a href="changepassworduser.php">Change password</a></li>
               
            </ul>
 </li>               <li><a href="logoutuser.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
       
        </ul>
      </div>
    </div>
  </nav>
       <div class="container-fluid " style="background:linear-gradient(#2f91b5,#caf700)">
        <h1  class="col-sm-offset-1" id="editpro">CHANGE PASSWORD</h1></div>
        <div class="changepass">
        <form class="container form-horizontal" action=" " method="post">
            
            <div class="form-group"><br>
    <label class="control-label col-sm-2" for="old">CURRENT PASSWORD:</label>
    <div class="col-sm-6">
        <input type="password" class="col-sm-10"  name="old" placeholder="enter current password" required>
    </div>
  </div>
           <div class="form-group">
    <label class="control-label col-sm-2" for="new">NEW PASSWORD:</label>
    <div class="col-sm-6">
        <input type="password" class="col-sm-10"  name="new" placeholder="enter new password" required>
    </div>
  </div>    
                <div class="form-group">
    <label class="control-label col-sm-2" for="cnm">RE-ENTER PASSWORD:</label>
    <div class="col-sm-6">
        <input type="password" class="col-sm-10"  name="cnm" placeholder="re-enter new password" required>
    </div>
  </div>
                <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
        <input type="submit" class="btn btn-success btn-lg" name="submit" value="change password">
        
    </div>
  </div>
               
                 <?php if($msg != ' '): ?>
                   <div id="demo" style="color: red;"><?php echo $msg; ?></div>
                   <?php endif; ?></div>
            </form>
        </div>
        
         <div style="float: right;" align="right" class="col-sm-4 container" id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>
