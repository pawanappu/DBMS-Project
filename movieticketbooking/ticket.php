<?php
require 'common.php';
$user_id=$_SESSION['user_id'];
$msgout=' ';
?>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTRICITY BOARD| HOME PAGE</title>
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
      
   


<section>
        <div class="container-fluid " style="background:linear-gradient(#2f91b5,#caf700)">
  <!--for demo wrap-->
        <h1  class="col-sm-offset-1" id="editpro">TICKET</h1></div>
  
     <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
         <tbody>
      <?php
        $sqldata= mysqli_query($con,"select * from movie m,reservation r where r.screen_no=m.screen_no and r.user_id=$user_id");
          $num = mysqli_num_rows($sqldata);
if ($num == 0) {
   $msgout='NO TICKET BOOKED YET';
}
            while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                
                echo '<tr><th>NAME</th><td>';
                echo $row['name'];
                echo '</td></tr><tr><th>MOVIE</th><td>';
                echo $row['movie_name'];
                echo '</td></tr><tr><th>SCREEEN_NO</th><td>';
                
                echo $row['screen_no'];
                echo '</td></tr><tr><th>SHOW TIME</th><td>';
                
                echo $row['show_time'];
                echo '</td></tr><tr> <th>NUMBER OF SEATS</th><td>';
              
                echo $row['number'];
                echo '</td></tr><tr> <th>Seat number</th><td>';
                echo $row['seats'];
                echo '</td></tr>';
                echo '<tr><th>TOTAL PRICE</th><td>';
                echo $row['number']*$row['price'];
                echo '</td></tr>';

                
            }
           
                    
        ?>
            </tbody>
             <?php if($msgout != ' '): ?>
                   <div style="background: white;color:red;font-size: 20px;font-weight: bolder;margin: 8px; "><?php echo $msgout; ?></div>
                   <?php endif; ?>
    </table>
  </div>
</section>