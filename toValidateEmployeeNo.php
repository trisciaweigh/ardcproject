<?php

include 'connect.php';

$empno = $_POST["e"];

$select = "SELECT * FROM employeeinfo WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);

if(mysqli_num_rows($result)>0)
{
    echo 'e';

}

mysqli_close($con);
?>