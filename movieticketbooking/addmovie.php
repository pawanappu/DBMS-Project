 <?php
require("common.php");
if (!isset($_SESSION['username'])) {
    header('location: admin.php');
}
$msg2=' ';
if(isset($_POST['submit'])) {
  $movies=$_POST['name'];
  $screen=$_POST['screen'];
  $time=$_POST['time'];
  $price=$_POST['price'];
  $image= addslashes($_FILES['image']['tmp_name']);
$names= addslashes($_FILES['image']['name']);
$image= file_get_contents($image);
$image= base64_encode($image);

  

  
    $query = "INSERT INTO movie(movie_name,movie_poster,screen_no,show_time,price)VALUES('$movies','" . $image . "','$screen','$time','$price')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $msg2 =" UPDATED SUCCESSFULLY";
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


       
      
            <div class="col-lg-4">
                  <div class="panel panel-primary">
             <div class="panel-heading">ADD MOVIES</div>
             <div class="panel-body" style="background:linear-gradient(rgba(47, 145, 181,0.8),rgba(183, 237, 68,0.8));margin:5px;">
                 <form class="" action=" " method="post" enctype="multipart/form-data" >
              <div class="form-group">
    <label for="name">MOVIE NAME:</label>
   <input type="text" name="name" id="name" required>
    </div>
 
 
              <div class="form-group">
    <label for="image">MOVIE POSTER:</label>
    
    <input type="file" id="image" class=" "  name="image"   style="width: 250px;" required>
    </div>
 
            <div class="form-group">
                <label for="screen">SELECT SCREEN:</label>
                <select name="screen" style="color:black;" id="screen" >
                    <option value="1">screen 1</option>
                    <option value="2">screen 2</option>
                    <option value="3">screen 3</option>
                    <option value="4">screen 4</option>
                </select>
  </div>
                     <div class="form-group">
                <label for="time">SHOW TIME:</label>
                <input type="time" name="time" id="time" required>
  </div>
                     
            <div class="form-group">
    <label for="price">PRICE:</label>
    <input type="number" name="price" id="price" required>
    </div>
   
   
  <div class="form-group"> 
   
        <input type="submit" class="btn btn-warning btn-lg" name="submit" value="SUBMIT">
   
  </div>
              </form>
                 <div class="form-group">
    <?php if($msg2 != ' '): ?>
                   <div style="color:green;font-family:Audiowide;font-size: 2em;background-color:#e6ccff"><?php echo $msg2; ?></div>
                   <?php endif; ?>
            </div>
             </div>  
             <div class="panel-footer" style="background-color:#6666ff">adding movies to screen</div>
        </div>
       
        </div> 
        
            <div class="col-lg-8">
                 <div class="panel panel-primary">
             <div class="panel-heading">DELETE MOVIES</div>
             <div class="panel-body">
                <section>
        <div class="container-fluid " style="background:linear-gradient(#2f91b5,#caf700)">
  <!--for demo wrap-->
        <h1  class="col-sm-offset-1" id="editpro">MOVIE MANAGE</h1></div>
  
  <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>SL.NO</th>
          <th>poster</th>
          <th>movie</th>
          <th>SCREEN</th>
          <th>PRICE</th>
          <th>delete</th>
          
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
                echo '<img height="100" width="95" src="data:image;base64,'.$row['movie_poster'].'" />';
                echo "</td><td>";
                
                echo $row['movie_name'];
                echo '</td><td>';
                
                echo $row['screen_no'];
                echo '</td><td>';
                
                echo $row['price'];
                echo '</td><td>';
                ?><a href="filmdelete.php?id=<?= $row['movie_id'] ?>"><button type="button"><span class="glyphicon glyphicon-trash"></span></button></a>
         <?php
            echo '</td></tr>';     
            }
            ?>
         
            </tbody>
    </table>
  </div>
</section>
       
             </div>
                 </div>
            </div>
        
    </body>
</html>