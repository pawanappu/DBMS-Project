<?php
require("common.php");
if (!isset($_SESSION['username'])) {
    header('location: admin.php');
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONLINE TICKET COUNTER ADMIN LOGIN</title>
    </head>
    <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>

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
<section>
        <div class="container-fluid " style="background:linear-gradient(#2f91b5,#caf700)">
            <div class="panel-heading">DELETE MOVIES</div>
  <!--for demo wrap-->
        <h1  class="col-sm-offset-1" id="editpro">MOVIE MANAGE</h1></div>
  
  <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>SL.NO</th>
          <th>MOVIES</th>
          <th>POSTER</th>
          <th>SCREEN_NO</th>
          <th>PRICE</th>
          
        </tr>
      </thead>
    </table>
  </div>
    <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
         <tbody>
     <?php
            $sqldata= mysqli_query($con,"select * from movie");
            while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                echo '<tr><td>';
                echo $row['movie_id'];
                echo '</td>';
                
                echo "<td>";
                echo '<img height="100" width="100" src="data:image;base64,'.$row['movie_poster'].'" />';
                echo "</td><td>";
                
                echo $row['movie_name'];
                echo '</td><td>';
                
                echo $row['screen_no'];
                echo '</td><td>';
                
                echo $row['price'];
                echo '</td><tr>';
              
               
            }
         
                    
            ?>
            </tbody>
    </table>
  </div>
</section>
    </body>
</html>