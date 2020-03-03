<?php
session_start();
include 'connect.php';

$childLength = $_POST["childLength"];
$empno = $_POST["empno"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$suffix = $_POST["suffix"];
$bdate = $_POST["bdate"];
$sex = $_POST["sex"];
$civStatus = $_POST["civStatus"];
$nationality = $_POST["nationality"];
$religion = $_POST["religion"];
$placeOfBirth = $_POST["placeOfBirth"];
$selectProvHome = $_POST["selectProvHome"];
$selectCMHome = $_POST["selectCMHome"];
$selectBrgyHome = $_POST["selectBrgyHome"];
$detailedAddHome = $_POST["detailedAddHome"];
$selectProvPerm = $_POST["selectProvPerm"];
$selectCMPerm = $_POST["selectCMPerm"];
$selectBrgyPerm = $_POST["selectBrgyPerm"];
$detailedAddPerm = $_POST["detailedAddPerm"];
$mobNo = $_POST["mobNo"];
$telNo = $_POST["telNo"];
$email = $_POST["email"];
$educ = $_POST["educ"];
$father = $_POST["father"];
$mother = $_POST["mother"];
$spouseName = $_POST["spouseName"];
$spouseBday = $_POST["spouseBday"];
$childsName = "";
$childsBday = "";
$height = $_POST["height"];
$weight = $_POST["weight"];
$blood = $_POST["blood"];
$sss = $_POST["sss"];
$philhealth = $_POST["philhealth"];
$hdmf = $_POST["hdmf"];
$tin = $_POST["tin"];
$atm = $_POST["atm"];


$cmCodeHome = "";
$brgyCodeHome = "";
$cmCodePerm = "";
$brgyCodePerm = "";


// HOME ADDRESS
$x=0;
$select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectProvHome'");
while($row = mysqli_fetch_array($select))  
{       
    if ($x == $selectCMHome){
    $cmCodeHome = $row["citymunCode"];
    }
    $x++;
}


$x=0;
$select = mysqli_query($con,"SELECT * FROM `refbrgy` where `provCode` = '$selectProvHome' and `citymunCode` = '$cmCodeHome'" );
while($row = mysqli_fetch_array($select))  
{       
    if ($x == $selectBrgyHome){
    $brgyCodeHome = $row["brgyCode"];
    }
    $x++;
}

// PERMANENT ADDRESS
$x=0;
$select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectProvPerm'");
while($row = mysqli_fetch_array($select))  
{       
    if ($x == $selectCMPerm){
    $cmCodePerm = $row["citymunCode"];
    }
    $x++;
}

$x=0;
$select = mysqli_query($con,"SELECT * FROM `refbrgy` where `provCode` = '$selectProvPerm' and `citymunCode` = '$cmCodePerm'" );
while($row = mysqli_fetch_array($select))  
{       
    if ($x == $selectBrgyPerm){
    $brgyCodePerm = $row["brgyCode"];
    }
    $x++;
}

// INSERT
$insert = "INSERT INTO `employeeinfo` VALUES ('$empno','$fname','$mname','$lname','$suffix','$bdate','$sex','$civStatus','$nationality','$religion','$placeOfBirth','$selectProvHome','$cmCodeHome','$brgyCodeHome','$detailedAddHome','$selectProvPerm','$cmCodePerm','$brgyCodePerm','$detailedAddPerm','$mobNo','$telNo','$email','$educ','$father','$mother','$spouseName','$spouseBday','$height','$weight','$blood','$sss','$philhealth','$hdmf','$tin','$atm')";      
if (mysqli_query($con,$insert))
{            
    for($x=1; $x <= $childLength; $x++){
        if($_POST["childsName".$x]!=""){
            $insert2 = "INSERT INTO `employeechildren` (`emp_no`, `empChild_name`, `empChild_bday`) VALUES ('$empno', '".$_POST["childsName".$x]."', '".$_POST["childsBday".$x]."')";      
            if (mysqli_query($con,$insert2))
            {            
                echo 'added';
            }
            else{
                echo  mysqli_error($con);
            }
        }
    }

    
}
else{
     echo  mysqli_error($con);
}

?>