
<?php
require("common.php");
if(!isset($_SESSION['username'])) {
    header('location: index.php');
}
$msg=' ';
  $result = mysqli_query($con, "SELECT * from users WHERE user_id='" .$_SESSION['user_id'] . "'");
    $row = mysqli_fetch_array($result);      
       
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);
  
  $username = $_POST['username'];
  $username = mysqli_real_escape_string($con, $username);

   $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $email);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);
  
  mysqli_query($con, "UPDATE `users` SET `name`='$name' ,`username`='$username',`email`='$email',`contact`='$contact' WHERE user_id='".$_SESSION['user_id']. "'")or die($mysqli_error($con));
        $msg= "UPDATED";
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
        <h1  class="col-sm-offset-1" id="editpro">EDIT PROFILE</h1></div>
        <div class="editprofile">
        <form class="container form-horizontal" action=" " method="post">
            
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">NAME :</label>
    <div class="col-sm-6">
        <input type="text" class="col-sm-10" id="name" name="name" value="<?php echo $row["name"]; ?>" required>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="username">USERNAME:</label>
    <div class="col-sm-6">
        <input type="text" class="col-sm-10" id="address" name="username"  value="<?php echo $row["username"]; ?>" required>
    </div>
  </div>
  </div>
        <div class="form-group">
    <label class="control-label col-sm-2" for="email">EMAIL :</label>
    <div class="col-sm-6">
        <input type="email" class="col-sm-10" id="email" name="email"  value="<?php echo $row["email"]; ?>" required>
    </div>
  </div>
  
            <div class="form-group">
    <label class="control-label col-sm-2" for="contact">CONTACT :</label>
    <div class="col-sm-6">
        <input type="text" class="col-sm-10" id="contact" name="contact"  value="<?php echo $row["contact"]; ?>" required>
    </div>
  </div>
           
 
  
            
            
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
        <input type="submit" class="btn btn-success btn-lg" name="submit" value="SUBMIT">
        
    </div>
  </div>
             <?php if($msg != ' '): ?>
                   <div style="color: green;font-size: 50px;font-family:'Baloo Thambi'; "><?php echo $msg; ?></div>
                   <?php endif; ?>
                 
</form>
           
        </div>
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
