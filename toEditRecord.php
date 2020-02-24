<?php
session_start();
include 'connect.php';

$serrecno =$_POST["serrecno"];
$curSerDate = "";
$curSerPosition = "";
$curSerInfo = "";

$select = mysqli_query($con,"SELECT * FROM `servicerecord` where `serrec_no` = '$serrecno'");
while($row = mysqli_fetch_array($select))  
{  
    $curSerDate = $row["serrec_date"];
    $curSerPosition = $row["serrec_position"];
    $curSerInfo = $row["serrec_info"];

}

if ($_POST["serdateEdit"] == ""){
    $serdate = $curSerDate;
}else{
    $serdate = $_POST["serdateEdit"];
}

if ($_POST["positionEdit"] == ""){
    $position = $curSerPosition;
}else{
    $position = mysqli_real_escape_string($con,$_POST["positionEdit"]);
}

if ($_POST["infoEdit"] == ""){
    $info = $curSerInfo;
}else{
    $info = mysqli_real_escape_string($con,$_POST["infoEdit"]);
}



 $update = "UPDATE `servicerecord` SET `serrec_date` = '$serdate' , `serrec_position` = '$position' , `serrec_info` = '$info' WHERE `serrec_no` = '$serrecno'";

if (mysqli_query($con,$update))
{
    echo 'saved';
}
else{
    echo("Error description: " . mysqli_error($con));
}
?>