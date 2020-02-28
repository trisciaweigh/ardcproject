<?php
session_start();
include 'connect.php';


$empno = $_POST["id"];
$serdate = $_POST["serdate"];
$basic = $_POST["basic"];
$rate = $_POST["rate"];
$allowance = $_POST["allowance"];
$gross = $_POST["gross"];
$yrsOfService = $_POST["yrsOfService"];
$position = mysqli_real_escape_string($con,$_POST["position"]);
$info = mysqli_real_escape_string($con,$_POST["info"]);
$deployed = mysqli_real_escape_string($con,$_POST["deployed"]);


$insert = "INSERT INTO `servicerecord` (`serrec_no`, `emp_no`, `serrec_date`, `serrec_position`, `serrec_info`, `serrec_yrsOfService`, `serrec_deployed`, `serrec_basic`, `serrec_rate`, `serrec_allowance`, `serrec_gross`) VALUES (NULL, '$empno', '$serdate', '$position', '$info', '$yrsOfService', '$deployed', '$basic', '$rate', '$allowance', '$gross')";      
if (mysqli_query($con,$insert))
{            
    echo 'added';
}
else{
     echo  mysqli_error($con);
}

?>