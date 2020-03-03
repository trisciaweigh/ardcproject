<?php

include 'connect.php';

$id = $_REQUEST["i"];


$del2 = "DELETE FROM `memo` WHERE `memo_no` = $id";
if (mysqli_query($con,$del2))
{
    echo'deleted';
}
else{
    echo  mysqli_error($con);
}


mysqli_close($con);
?>