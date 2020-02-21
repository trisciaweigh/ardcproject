<?php
session_start();
include 'connect.php';



$empno = $_POST["empno"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$bdate = $_POST["bdate"];


$insert = "INSERT INTO `employeeinfo` VALUES ('$empno','$fname','$mname','$lname','$bdate')";      
if (mysqli_query($con,$insert))
{            
    echo 'added';
}
else{
     echo  mysqli_error($con);
}

?>