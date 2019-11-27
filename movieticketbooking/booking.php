
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
      
   
                 <div class="panel panel-primary">
             <div class="panel-heading">BOOK MOVIES</div>
             <div class="panel-body" style="height:100%">
                <section>
        <div class="container-fluid " style="background:linear-gradient(#2f91b5,#caf700)">
  <!--for demo wrap-->
        <h1  class="col-sm-offset-1" id="editpro">MOVIES AVAILABLE</h1></div>
        <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>SL.NO</th>
          <th>poster</th>
          <th>movie</th>
          <th>SCREEN</th>
          <th>PRICE</th>
          <th>SHOW TIME</th>
          
          
        </tr>
      </thead>
    </table>
  </div>
        <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
         <tbody>
     <?php
            require 'common.php';
            if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
            $sqldata= mysqli_query($con,"select * from movie ");
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
                echo '</td><td>';
                ?><a href="layout.php?id=<?= $row['screen_no'] ?>"><button type="button"><?php echo $row['show_time'];?></button></a>
       
         <?php
            echo '</td></tr>';
            
            }
            ?>
         
            </tbody>
    </table>
  </div>
                </section>
    </body>
</html>