<?php
session_start();
include 'connect.php';


$empno = $_POST["id"];
$curfname = ""; $mcurname = "";   $curlname = "";    $cursuffix = "";   $curbdate = "";    $cursex = "";  $curcivilStatus = "";  $curnationality = "";
$curreligion = ""; $curplaceOfBirth = ""; $curhomeProvCode = ""; $curhomeCityMunCode = "";  $curhomeBrgyCode= "";  $curhomeDetailedAdd = "";
$curperProvCode = "";  $curperCityMunCode= "";    $curperBrgyCode = "";  $curperDetailedAdd = "";   $curmobileNo = ""; $curtelNo = "";    $curemailAdd = "";
$cureducBg = "";   $curfathersName = "";  $curmothersName = "";  $curspouseName = "";   $curspouseBdate = "";  $curheight = "";   $curweight = "";   $curbloodType = "";
$cursssNo = "";    $curphilNo = "";   $curhdmfNo = "";   $curtinNo = "";    $curatmNo = "";    $curdeployed = ""; $curbasic = "";    $currate = ""; $curallowance = "";    $curgross = "";
$cmCodeHome = "";
$brgyCodeHome = "";
$cmCodePer= "";
$brgyCodePer = "";


$select = "SELECT * FROM `employeeinfo` WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $curfname = $row["emp_fname"];
        $curmname = $row["emp_mname"];
        $curlname = $row["emp_lname"];
        $cursuffix = $row["emp_suffix"];
        $curbdate = $row["emp_bday"];
        $cursex = $row["emp_sex"];
        $curcivilStatus = $row["emp_civilStatus"];
        $curnationality = $row["emp_nationality"];
        $curreligion = $row["emp_religion"];
        $curplaceOfBirth = $row["emp_placeOfBirth"];
        $curhomeProvCode = $row["emp_homeProvCode"];
        $curhomeCityMunCode = $row["emp_homeCityMunCode"];
        $curhomeBrgyCode= $row["emp_homeBrgyCode"];
        $curhomeDetailedAdd = $row["emp_homeDetailedAdd"];
        $curperProvCode = $row["emp_perProvCode"];
        $curperCityMunCode= $row["emp_perCityMunCode"];
        $curperBrgyCode = $row["emp_perBrgyCode"];
        $curperDetailedAdd = $row["emp_perDetailedAdd"];
        $curmobileNo = $row["emp_mobileNo"];
        $curtelNo = $row["emp_telNo"];
        $curemailAdd = $row["emp_emailAdd"];
        $cureducBg = $row["emp_educBg"];
        $curfathersName = $row["emp_fathersName"];
        $curmothersName = $row["emp_mothersName"];
        $curspouseName = $row["emp_spouseName"];
        $curspouseBdate = $row["emp_spouseBdate"];
        $curheight = $row["emp_height"];
        $curweight = $row["emp_weight"];
        $curbloodType = $row["emp_bloodType"];
        $cursssNo = $row["emp_sssNo"];
        $curphilNo = $row["emp_philNo"];
        $curhdmfNo = $row["emp_hdmfNo"];
        $curtinNo = $row["emp_tinNo"];
        $curatmNo = $row["emp_atmNo"];
        $curdeployed = $row["emp_deployed"];
        $curbasic = $row["emp_basic"];
        $currate = $row["emp_rate"];
        $curallowance = $row["emp_allowance"];
        $curgross = $row["emp_gross"];
    }
}
else{
    echo mysqli_error($con);
}

$select = "SELECT * FROM `employeechildren` WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $curchildsName = $row["empChild_name"];
        $curchildsBday = $row["empChild_bday"];
    }
}


$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$suffix = $_POST["suffix"];
$bdate = $_POST["bday"];
$civilStatus = $_POST["civilStatus"];
$nationality = $_POST["nationality"];
$religion = $_POST["religion"];
$placeOfBirth = $_POST["placeOfBirth"];
$homeDetailedAdd = $_POST["homeDetailedAdd"];
$perDetailedAdd = $_POST["perDetailedAdd"];
$mobileNo = $_POST["mobileNo"];
$telNo = $_POST["telNo"];
$emailAdd = $_POST["emailAdd"];
$educBg = $_POST["educBg"];
$fathersName = $_POST["fathersName"];
$mothersName = $_POST["mothersName"];
$spouseName = $_POST["spouseName"];
$spouseBdate = $_POST["spouseBdate"];
$childsName = $_POST["childsName"];
$childsBdate = $_POST["childsBday"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$bloodType = $_POST["bloodType"];
$sssNo = $_POST["sssNo"];
$philNo = $_POST["philNo"];
$hdmfNo = $_POST["hdmfNo"];
$tinNo = $_POST["tinNo"];
$atmNo = $_POST["atmNo"];
$deployed = $_POST["deployed"];
$basic = $_POST["basic"];
$rate = $_POST["rate"];
$allowance = $_POST["allowance"];
$gross = $_POST["gross"];

if($fname==""){
    $fname = $curfname;
}
if($mname==""){
    $mname = $curmname;
}
if($lname==""){
    $lname = $curlname;
}
if($suffix==""){
    $suffix = $cursuffix;
}
if($bdate==""){
    $bdate = $curbdate;
}
if($_POST["sex"]==""){
    $sex = $cursex;
}else{
    $sex = $_POST["sex"];
}
if($civilStatus==""){
    $civilStatus = $curcivilStatus;
}
if($nationality==""){
    $nationality = $curnationality;
}
if($religion==""){
    $religion = $curreligion;
}
if($placeOfBirth==""){
    $placeOfBirth = $curplaceOfBirth;
}

//HOME
if($_POST["selectProvHome"]==$curhomeProvCode){
    $selectProvHome = $curhomeProvCode;
}else{
    $selectProvHome = $_POST["selectProvHome"];
}

if($_POST["selectCMHome"]==$curhomeCityMunCode){
    $cmCodeHome = $curhomeCityMunCode;
}else{
    $selectCMHome = $_POST["selectCMHome"];
    $x=0;
    $select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectProvHome'");
    while($row = mysqli_fetch_array($select))  
    {       
        if ($x == $selectCMHome){
            $cmCodeHome = $row["citymunCode"];
            
        }
        $x++;
    }
}

if($_POST["selectBrgyHome"]==$curhomeBrgyCode){
    $brgyCodeHome = $curhomeBrgyCode;
}else{
    $selectBrgyHome = $_POST["selectBrgyHome"];
    $x=0;
    $select = mysqli_query($con,"SELECT * FROM `refbrgy` where `provCode` = '$selectProvHome' and `citymunCode` = '$cmCodeHome'" );
    while($row = mysqli_fetch_array($select))  
    {       
        if ($x == $selectBrgyHome){
            $brgyCodeHome = $row["brgyCode"];
        }
        $x++;
    }
}

if($homeDetailedAdd==""){
    $homeDetailedAdd = $curhomeDetailedAdd;
}


//echo "home".$_POST["selectCMHome"];
//PERMANENT
if($perDetailedAdd==""){
    $perDetailedAdd = $curperDetailedAdd;
}
if($_POST["selectProvPer"]==$curperProvCode){
    $selectProvPer = $curperProvCode;
}else{
    $selectProvPer = $_POST["selectProvPer"];
}
if($_POST["selectCMPer"]==$curperCityMunCode){
    $cmCodePer = $curperCityMunCode;    
}else{
    $selectCMPer = $_POST["selectCMPer"];
    $x=0;
    $select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectProvPer'");
    while($row = mysqli_fetch_array($select))  
    {       
        if ($x == $selectCMPer){
            $cmCodePer = $row["citymunCode"];
        }
        $x++;
    }
}



if($_POST["selectBrgyPer"]==$curperBrgyCode){
    $brgyCodePer = $curperBrgyCode;
}else{
    $selectBrgyPer = $_POST["selectBrgyPer"];
    $x=0;
    $select = mysqli_query($con,"SELECT * FROM `refbrgy` where `provCode` = '$selectProvPer' and `citymunCode` = '$cmCodePer'" );
    while($row = mysqli_fetch_array($select))  
    {       
        if ($x == $selectBrgyPer){
        $brgyCodePer = $row["brgyCode"];
        }
        $x++;
    }
}

if($mobileNo==""){
    $mobileNo = $curmobileNo;
}
if($telNo==""){
    $telNo = $telNo;
}
if($emailAdd==""){
    $emailAdd = $curemailAdd;
}
if($educBg==""){
    $educBg = $cureducBg;
}
if($fathersName==""){
    $fathersName = $curfathersName;
}
if($mothersName==""){
    $mothersName = $curmothersName;
}
if($spouseName==""){
    $spouseName = $curspouseName;
}
if($spouseBdate==""){
    $spouseBdate = $curspouseBdate;
}
if($childsName==""){
    $childsName = $curchildsName;
}
if($childsBdate==""){
    $childsBdate = $curchildsBday;
}
if($weight==""){
    $weight = $curweight;
}
if($height==""){
    $height = $curheight;
}
if($bloodType==""){
    $bloodType = $curbloodType;
}
if($sssNo==""){
    $sssNo = $cursssNo;
}
if($philNo==""){
    $philNo = $curphilNo;
}
if($hdmfNo==""){
    $hdmfNo = $curhdmfNo;
}
if($tinNo==""){
    $tinNo = $curtinNo;
}
if($atmNo==""){
    $atmNo = $curatmNo;
}


$update = "UPDATE `employeeinfo` SET `emp_fname` = '$fname', `emp_mname` = '$mname', `emp_lname` = '$lname', `emp_suffix` = '$suffix', `emp_bday` = '$bdate', `emp_sex` = '$sex', `emp_civilStatus` = '$civilStatus', `emp_nationality` = '$nationality', `emp_religion` = '$religion', `emp_placeOfBirth` = '$placeOfBirth', `emp_homeProvCode` = '$selectProvHome', `emp_homeCityMunCode` = '$cmCodeHome', `emp_homeBrgyCode` = '$brgyCodeHome', `emp_homeDetailedAdd` = '$homeDetailedAdd', `emp_perProvCode` = '$selectProvPer', `emp_perCityMunCode` = '$cmCodePer', `emp_perBrgyCode` = '$brgyCodePer', `emp_perDetailedAdd` = '$perDetailedAdd', `emp_mobileNo` = '$mobileNo', `emp_telNo` = '$telNo', `emp_emailAdd` = '$emailAdd', `emp_educBg` = '$educBg', `emp_fathersName` = '$fathersName', `emp_mothersName` = '$mothersName', `emp_spouseName` = '$spouseName', `emp_spouseBdate` = '$spouseBdate', `emp_height` = '$height', `emp_weight` = '$weight', `emp_bloodType` = '$bloodType', `emp_sssNo` = '$sssNo', `emp_philNo` = '$philNo', `emp_hdmfNo` = '$hdmfNo', `emp_tinNo` = '$tinNo', `emp_atmNo` = '$atmNo' WHERE `emp_no` = '$empno' ";

if (mysqli_query($con,$update))
{
    echo'saved';
}
else{
    echo("Error description: " . mysqli_error($con));
}




?>