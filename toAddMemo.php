<?php
session_start();
include 'connect.php';


$empno = $_POST["id"];
$memodate = $_POST["memodate"];
$memoFrom = $_POST["memoFrom"];
$memo = mysqli_real_escape_string($con,$_POST["memo"]);


$insert = "INSERT INTO `memo` (`emp_no`, `memo_date`, `memo_details`, `memo_from`) VALUES ( '$empno', '$memodate', '$memo', '$memoFrom')";      
if (mysqli_query($con,$insert))
{            
    echo 'added';
}
else{
     echo  mysqli_error($con);
}

?>