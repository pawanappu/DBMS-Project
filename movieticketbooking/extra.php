<?php
require 'common.php';
$quer = "SELECT seats FROM reservation";
  $results= mysqli_query($con, $quer)or die($mysqli_error($con));
 while( $num = mysqli_fetch_array($results))
 {
 $var= $num['seats'];
 echo $var;
 
 }
 
  $seats=array('A1','A2');
  echo sizeof($seats);
  for($i=0; $i<sizeof($seats);$i++){
      for($j=0;$j<sizeof($var);$j++){
          if($seats[$i]==$var[$j]){
              $x=1;
              goto statement;
          }
          
          }
      }
  
  statement: echo 'The selected seats are already booked';
  if($x=1){
      echo 'x=1';
  }
  else{
      echo 'working';     
 }
  ?>