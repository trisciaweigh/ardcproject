<?php
session_start();
include 'connect.php';



$empno = $_POST["id"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$bdate = $_POST["bday"];


 $update = "UPDATE `employeeinfo` SET `emp_fname` = '$fname' , `emp_mname` = '$mname' , `emp_lname` = '$lname' , `emp_bday` = '$bdate' WHERE `emp_no` = '$empno'";

if (mysqli_query($con,$update))
{
    echo'saved';
}
else{
    echo("Error description: " . mysqli_error($con));
}
?>