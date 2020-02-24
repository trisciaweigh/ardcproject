<?php
session_start();
include 'connect.php';


$empno = $_POST["id"];
$serdate = $_POST["serdate"];
$position = mysqli_real_escape_string($con,$_POST["position"]);
$info = mysqli_real_escape_string($con,$_POST["info"]);


$insert = "INSERT INTO `servicerecord` (`serrec_no`, `emp_no`, `serrec_date`, `serrec_position`, `serrec_info`) VALUES (NULL, '$empno', '$serdate', '$position', '$info')";      
if (mysqli_query($con,$insert))
{            
    echo 'added';
}
else{
     echo  mysqli_error($con);
}

?>