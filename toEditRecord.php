<?php
session_start();
include 'connect.php';

$serrecno =$_POST["serrecno"];
$curSerDate = "";
$curSerPosition = "";
$curSerInfo = "";
$curSerYrs = "";
$curSerDeployed = "";
$curSerBasic = "";
$curSerRate = "";
$curSerAllowance = "";
$curSerGross = "";

$select = mysqli_query($con,"SELECT * FROM `servicerecord` where `serrec_no` = '$serrecno'");
while($row = mysqli_fetch_array($select))  
{  
    $curSerDate = $row["serrec_date"];
    $curSerPosition = $row["serrec_position"];
    $curSerInfo = $row["serrec_info"];
    $curSerYrs = $row["serrec_yrsOfService"];
    $curSerDeployed = $row["serrec_deployed"];
    $curSerBasic= $row["serrec_basic"];
    $curSerRate = $row["serrec_rate"];
    $curSerAllowance = $row["serrec_allowance"];
    $curSerGross = $row["serrec_gross"];

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

if ($_POST["deployedEdit"] == ""){
    $deployed = $curSerDeployed;
}else{
    $deployed = mysqli_real_escape_string($con,$_POST["deployedEdit"]);
}

if ($_POST["yrsOfServiceEdit"] == ""){
    $yrs = $curSerYrs;
}else{
    $yrs = $_POST["yrsOfServiceEdit"];
}


if ($_POST["basicEdit"] == ""){
    $basic = $curSerBasic;
}else{
    $basic = $_POST["basicEdit"];
}

if ($_POST["rateEdit"] == ""){
    $rate = $curSerRate;
}else{
    $rate = $_POST["rateEdit"];
}

if ($_POST["allowanceEdit"] == ""){
    $allowance = $curSerAllowance;
}else{
    $allowance = $_POST["allowanceEdit"];
}

if ($_POST["grossEdit"] == ""){
    $gross = $curSerGross;
}else{
    $gross = $_POST["grossEdit"];
}



 $update = "UPDATE `servicerecord` SET `serrec_date` = '$serdate', `serrec_position` = '$position', `serrec_info` = '$info', `serrec_yrsOfService` = '$yrs', `serrec_deployed` = '$deployed', `serrec_basic` = '$basic', `serrec_rate` = '$rate', `serrec_allowance` = '$allowance', `serrec_gross` = '$gross' WHERE `serrec_no` = $serrecno";

if (mysqli_query($con,$update))
{
    echo 'saved';
}
else{
    echo("Error description: " . mysqli_error($con));
}
?>