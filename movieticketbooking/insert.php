<?php
$name=$_POST['name'];
$username=$_POST['user'];
$email=$_POST['email'];
$pwd=$_POST['cpwd'];
$phone=$_POST['phone'];

if(!empty($name)||!empty($username)||!empty($email)||!empty($pwd)||!empty($cpwd)||!empty($phone))
{
$ser="localhost";
$user="root";
$pass="";
$db="booking";



$con= mysqli_connect($ser, $user, $pass, $db);
echo "Connected Successfully";
if(mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
} else {
    $SELECT = "SELECT email From users where email = ? Limit 1";
    $INSERT = "INSERT into user (name,username,password,email,contact) values (?,?,?,?,?)";
    
    $STMT = $con->prepare($SELECT);
    $STMT->bind_param("s",$email);
    $STMT->execute();
    $STMT->bind_result($email);
    $STMT->store_result();
    $rnum =$STMT->num_rows;
    
    if($rnum==0) {
        $STMT->close();
        $STMT=$con->prepare($INSERT);
        $STMT->bind_param("ssssi",$name,$username,$pwd,$email,$phone);
        $STMT->execute();
        echo "New record inserted successfully";
    } else {
        echo "Someone already registered using this email";
    }
    $STMT->close();
    $con->close();
} 
}else {
    echo "All fields are required";
    die();
    
}


    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
