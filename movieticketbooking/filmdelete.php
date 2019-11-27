<?php
require("common.php");
if (!isset($_SESSION['username'])) {
    header('location: admin.php');
}


$id=$_GET['id'];
$result = mysqli_query($con,"DELETE FROM movie WHERE movie_id=$id")
or die(mysqli_error($conn));
header('location:addmovie.php');


?>

