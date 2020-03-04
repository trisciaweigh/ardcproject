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


$serdate = $_POST["serdateEdit"];
$position = mysqli_real_escape_string($con,$_POST["positionEdit"]);
$info = mysqli_real_escape_string($con,$_POST["infoEdit"]);
$deployed = mysqli_real_escape_string($con,$_POST["deployedEdit"]);
$yrs = $_POST["yrsOfServiceEdit"];
$basic = $_POST["basicEdit"];
$rate = $_POST["rateEdit"];
$allowance = $_POST["allowanceEdit"];
$gross = $_POST["grossEdit"];


 $update = "UPDATE `servicerecord` SET `serrec_date` = '$serdate', `serrec_position` = '$position', `serrec_info` = '$info', `serrec_yrsOfService` = '$yrs', `serrec_deployed` = '$deployed', `serrec_basic` = '$basic', `serrec_rate` = '$rate', `serrec_allowance` = '$allowance', `serrec_gross` = '$gross' WHERE `serrec_no` = $serrecno";

if (mysqli_query($con,$update))
{
    echo 'saved';
}
else{
    echo("Error description: " . mysqli_error($con));
}
?>