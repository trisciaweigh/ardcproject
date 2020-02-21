<?php

include 'connect.php';

$empno = $_REQUEST["i"];

$select = "SELECT * FROM employeeinfo WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);

if(mysqli_num_rows($result)>0)
{
    echo 'existing';

}

mysqli_close($con);
?>