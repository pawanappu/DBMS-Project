<?php
require("common.php");
if (!isset($_SESSION['username'])) {
    header('location: admin.php');
}
$count= "select * from users";
        $result= mysqli_query($con, $count);
        $num = mysqli_num_rows($result);
     
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONLINE TICKET COUNTER ADMIN LOGIN</title>
    </head>
    <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bungee Inline' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cabin Sketch' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
    <body>
        <nav class="navbar"  style="background-color:#f7cf59;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:#333231">
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
          <span class="icon-bar" style="background-color:#f2d2d2;"></span>
        </button>
          <a class="navbar-brand" href="admin_home.php">MOVIE BOOKING</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
           
          <ul class="nav navbar-nav" style="font-size: 20px;">
             
              <li><a href="addmovie.php">MOVIE MANAGE</a> </li>
          
        </ul>
        <ul class="nav navbar-nav navbar-right" style="font-size: 20px;">
            
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
       
        </ul>
      </div>
    </div>
  </nav>
       <div class="row container-fluid">
        <div class="" id="custpan" style="background:linear-gradient(rgba(255, 165, 165,0.8),rgba(255, 226, 124,0.8))">
            <center> <h2 id="adminpan" style="font-family:  'Bungee Inline';">
                USERS
                </h2>
            <p><b style="color: white; font-size: 100px"><?php echo $num;
            ?></b></p>
            <span style="font-family:'Cabin Sketch';color:red;font-size: 35px;">NUMBER OF USERS HERE</span></center>
        </div>
       </div>
        <br><br>
        <div class="row container-fluid">
        <div class="" id="custpan" style="background:linear-gradient(rgba(255, 165, 165,0.8),rgba(255, 226, 124,0.8))">
            <center><a href="userlog.php"> <h2 id="adminpan" style="font-family:  'Bungee Inline';">
                USER LOG
                    </h2></a>
            <p><b style="color: white; font-size: 100px">
            </b></p>
            <span style="font-family:'Cabin Sketch';color:red;font-size: 35px;">SEE USER ACTIVITIES</span></center>
        </div>
       </div>
        <br><br>
        <div class="row container-fluid">
        <div class="" id="custpan" style="background:linear-gradient(rgba(255, 165, 165,0.8),rgba(255, 226, 124,0.8))">
            <center><a href="reservation_history.php"> <h2 id="adminpan" style="font-family:  'Bungee Inline';">
                RESERVATION HISTORY
                    </h2></a>
            <p><b style="color: white; font-size: 100px">
            </b></p>
            <span style="font-family:'Cabin Sketch';color:red;font-size: 35px;">SEE RESERVATION DETAILS</span></center>
        </div>
       </div>
    </body>
</html>