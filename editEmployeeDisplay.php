<html>
<head>
    <style>
        th{
/*            text-align: center;*/
            font-size: 16px
        }
        table{
            width: 80%
        }
        
        .fa-check-circle{
            font-size: 18px;
            color: limegreen;
            display: none
        }
    </style></head>
<?php
include 'connect.php';

$empno = $_GET["e"];
$fname = ""; $mname = "";   $lname = "";    $suffix = "";   $bdate = "";    $sex = "";  $civilStatus = "";  $nationality = "";
$religion = ""; $placeOfBirth = ""; $homeProvCode = ""; $homeCityMunCode = "";  $homeBrgyCode= "";  $homeDetailedAdd = "";
$perProvCode = "";  $perCityMunCode= "";    $perBrgyCode = "";  $perDetailedAdd = "";   $mobileNo = ""; $telNo = "";    $emailAdd = "";
$educBg = "";   $fathersName = "";  $mothersName = "";  $spouseName = "";   $spouseBdate = "";  $height = "";   $weight = "";   $bloodType = "";
$sssNo = "";    $philNo = "";   $hdmfNo = "";   $tinNo = "";    $atmNo = "";    
//$deployed = ""; $basic = "";    $rate = ""; $allowance = "";    $gross = "";


$select = "SELECT * FROM `employeeinfo` WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $fname = $row["emp_fname"];
        $mname = $row["emp_mname"];
        $lname = $row["emp_lname"];
        $suffix = $row["emp_suffix"];
        $bdate = $row["emp_bday"];
        $sex = $row["emp_sex"];
        $civilStatus = $row["emp_civilStatus"];
        $nationality = $row["emp_nationality"];
        $religion = $row["emp_religion"];
        $placeOfBirth = $row["emp_placeOfBirth"];
        $homeProvCode = $row["emp_homeProvCode"];
        $homeCityMunCode = $row["emp_homeCityMunCode"];
        $homeBrgyCode= $row["emp_homeBrgyCode"];
        $homeDetailedAdd = $row["emp_homeDetailedAdd"];
        $perProvCode = $row["emp_perProvCode"];
        $perCityMunCode= $row["emp_perCityMunCode"];
        $perBrgyCode = $row["emp_perBrgyCode"];
        $perDetailedAdd = $row["emp_perDetailedAdd"];
        $mobileNo = $row["emp_mobileNo"];
        $telNo = $row["emp_telNo"];
        $emailAdd = $row["emp_emailAdd"];
        $educBg = $row["emp_educBg"];
        $fathersName = $row["emp_fathersName"];
        $mothersName = $row["emp_mothersName"];
        $spouseName = $row["emp_spouseName"];
        $spouseBdate = $row["emp_spouseBdate"];
        $height = $row["emp_height"];
        $weight = $row["emp_weight"];
        $bloodType = $row["emp_bloodType"];
        $sssNo = $row["emp_sssNo"];
        $philNo = $row["emp_philNo"];
        $hdmfNo = $row["emp_hdmfNo"];
        $tinNo = $row["emp_tinNo"];
        $atmNo = $row["emp_atmNo"];
//        $deployed = $row["emp_deployed"];
//        $basic = $row["emp_basic"];
//        $rate = $row["emp_rate"];
//        $allowance = $row["emp_allowance"];
//        $gross = $row["emp_gross"];
    }
}
else{
    echo mysqli_error($con);
}
// HOME ADDRESS
$select = "SELECT * FROM `refprovince` WHERE `provcode` = '$homeProvCode'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $homeProvDesc = $row["provDesc"];
    }
}

$select = "SELECT * FROM `refcitymun` WHERE `citymunCode` = '$homeCityMunCode'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $homeCityMunDesc = $row["citymunDesc"];
    }
}                       


// PERMANENT ADDRESS
$select = "SELECT * FROM `refprovince` WHERE `provcode` = '$perProvCode'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $perProvDesc = $row["provDesc"];
    }
}

$select = "SELECT * FROM `refcitymun` WHERE `citymunCode` = '$perCityMunCode'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $perCityMunDesc = $row["citymunDesc"];
    }
}

$select = "SELECT * FROM `employeechildren` WHERE `emp_no` = '$empno'";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))  
    { 
        $childsName = $row["empChild_name"];
        $childsBday = $row["empChild_bday"];
    }
}
?>
  <body>
        <form id="editInfoForm"  method="post"  enctype="multipart/form-data" onsubmit="editEmployeeSubmit(event)">
            <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">

            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">First Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $fname;?>" value="<?php echo $fname;?>" name="fname" id="fname" autocomplete="off" >
                    <span class="error" id="fnameError">Letters and white spaces only!</span>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Middle Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $mname;?>" value="<?php echo $mname;?>" name="mname" id="mname" autocomplete="off" >
                    <span class="error"  id="mnameError">Letters and white spaces only!</span>
                </div> 
            </div>
            
            <div class="row">                            
                <div class="col-5">
                    <label class="detailLabel">Last Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $lname;?>" value="<?php echo $lname;?>" name="lname" id="lname" autocomplete="off" >
                    <span class="error"  id="lnameError">Letters and white spaces only!</span>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Suffix</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $suffix;?>" value="<?php echo $suffix;?>" name="suffix" id="suffix" autocomplete="off" >
                    <span class="error"  id="suffixError">Letters and white spaces only!</span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Birthday</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="date" placeholder="<?php echo $bdate;?>" value="<?php echo $bdate;?>" name="bday" id="bday" >
                </div>  
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Sex</label>
                </div> 
                <div class="col-7">
                    <select id="sex" name="sex" class="custom-select detailInfoEdit actived dark-grey-text">
                        <?php 
                        echo $sex;
                            if($sex=="Male"){
                                echo '<option selected>Male</option>
                                        <option>Female</option>';
                            }
                            else{
                                echo '<option>Male</option>
                                        <option selected>Female</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Civil Status</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $civilStatus;?>" value="<?php echo $civilStatus;?>" name="civilStatus" id="civilStatus" autocomplete="off" >
                </div>   
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Nationality</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $nationality;?>" value="<?php echo $nationality;?>" name="nationality" id="nationality" autocomplete="off" >
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Religion</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $religion;?>" value="<?php echo $religion;?>" name="religion" id="religion" autocomplete="off" >
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Place of Birth</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $placeOfBirth;?>" value="<?php echo $placeOfBirth;?>" name="placeOfBirth" id="placeOfBirth" autocomplete="off" >
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-12">
                    <label class="detailLabel">Home Address</label>
                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Province</label>
                </div>
                <div class="col-7">
                    <select id="selectProvHome" name="selectProvHome" onchange="chooseCMHome(this.value)" placeholder="<?php echo $homeProvDesc;?>" class="custom-select detailInfoEdit actived dark-grey-text">
                        <option value="<?php echo $homeProvCode ?>" selected><?php echo $homeProvDesc; ?> </option>
                        <?php
                            $provCode = "";
                            $select = mysqli_query($con,"SELECT * FROM `refprovince` ");
                            while($row = mysqli_fetch_array($select))  
                            {  
                                $provCode=$row["provCode"];
                                echo "<option value='".$provCode."'>".$row["provDesc"]."</option>";
                            }
                        ?>
                    </select>

                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">City/Municipality</label>
                </div>
                <div class="col-7">
                    <select id="selectCMHome" name="selectCMHome" onchange="chooseBrgyHome(this.value)" class="custom-select detailInfoEdit actived dark-grey-text" disabled>
                        <option value="<?php echo $homeCityMunCode ?>" selected><?php echo $homeCityMunDesc; ?>  </option>
                    </select>
                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Barangay</label>
                </div>
                <div class="col-7">
                    <select id="selectBrgyHome" name="selectBrgyHome" class="custom-select detailInfoEdit actived dark-grey-text" disabled>
                        <?php
                            $select = "SELECT * FROM `refbrgy` WHERE `brgyCode` = '$homeBrgyCode'";
                            $result = mysqli_query($con,$select);
                            if(mysqli_num_rows($result)>0)
                            {
                                while($row = mysqli_fetch_array($result))  
                                { 
                                    echo '<option value="'.$homeBrgyCode.'" selected>'.ucfirst($row["brgyDesc"]).'</option>';
                                }
                            }                                        
                        ?>
                    </select>
                    </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Detailed Address</label>
                </div>
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $homeDetailedAdd;?>" value="<?php echo $homeDetailedAdd;?>" name="homeDetailedAdd" id="homeDetailedAdd" autocomplete="off" >
                </div> 
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="detailLabel">Permanent Address</label>
                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Province</label>
                </div>
                <div class="col-7">
                    <select id="selectProvPer" name="selectProvPer" onchange="chooseCMPerm(this.value)" placeholder="<?php echo $perProvDesc;?>" class="custom-select detailInfoEdit actived dark-grey-text">
                        <option value="<?php echo $perProvCode ?>" selected><?php echo $perProvDesc; ?> </option>
                        <?php
                            $provCode = "";
                            $select = mysqli_query($con,"SELECT * FROM `refprovince` ");
                            while($row = mysqli_fetch_array($select))  
                            {  
                                $provCode=$row["provCode"];
                                echo "<option value='".$provCode."'>".$row["provDesc"]."</option>";
                            }
                        ?>
                    </select>

                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">City/Municipality</label>
                </div>
                <div class="col-7">
                    <select id="selectCMPer" name="selectCMPer" onchange="chooseBrgyPerm(this.value)"class="custom-select detailInfoEdit actived dark-grey-text" disabled>
                        <option value="<?php echo $perCityMunCode ?>" selected><?php echo $perCityMunDesc; ?>  </option>
                    </select>
                </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Barangay</label>
                </div>
                <div class="col-7">
                    <select id="selectBrgyPer" name="selectBrgyPer" class="custom-select detailInfoEdit actived dark-grey-text" disabled>
                        <option value="<?php echo $perBrgyCode ?>" selected>
                        <?php
                            $select = "SELECT * FROM `refbrgy` WHERE `brgyCode` = '$perBrgyCode'";
                            $result = mysqli_query($con,$select);
                            if(mysqli_num_rows($result)>0)
                            {
                                while($row = mysqli_fetch_array($result))  
                                { 
                                    echo $row["brgyDesc"];
                                }
                            }                                        
                        ?>
                        </option>
                    </select>
                    </div> 
                <div class="col-3">
                </div>
                <div class="col-2">
                    <label class="detailLabel address">Detailed Address</label>
                </div>
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $perDetailedAdd;?>" value="<?php echo $perDetailedAdd;?>" name="perDetailedAdd" id="perDetailedAdd" autocomplete="off" >
                </div> 
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Mobile no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $mobileNo;?>" value="<?php echo $mobileNo;?>" name="mobileNo" id="mobileNo" autocomplete="off" >
                </div>   
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Telephone no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $telNo;?>" value="<?php echo $telNo;?>" name="telNo" id="telNo" autocomplete="off" >
                </div>   
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Email Address</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $emailAdd;?>" value="<?php echo $emailAdd;?>" name="emailAdd" id="emailAdd" autocomplete="off" >
                </div>                               
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Educational Background (Highest Attainment)</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $educBg;?>" value="<?php echo $educBg;?>" name="educBg" id="educBg" autocomplete="off" >
                </div>  
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Father's Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $fathersName;?>" value="<?php echo $fathersName;?>" name="fathersName" id="fathersName" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Mother's Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $mothersName;?>" value="<?php echo $mothersName;?>" name="mothersName" id="mothersName" autocomplete="off" >
                </div>   
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Spouse Name</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $spouseName;?>" value="<?php echo $spouseName;?>" name="spouseName" id="spouseName" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Spouse Birthday</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="date" placeholder="<?php echo $spouseBdate;?>" value="<?php echo $spouseBdate;?>" name="spouseBdate" id="spouseBdate" >
                </div>
            </div>
            
            
            <div>
                <?php
                    
                    $childArr = explode ("/", $childsName); 
                    $childBdayArr = explode ("/", $childsBday); 
                    $childLength = count($childArr)-1;
                ?>
                
                <table id="childTable">
                    <thead>
                        <tr>
                            <th><label>Child's Name</label></th>
                            <th><label>Child's Birthday</label></th>
                        </tr>
                    </thead>
                    <tbody id="childsbody">
                        <?php
                        $i=1;
                            for($x=0; $x<$childLength; $x++){
                                echo ' <tr>
                                        <td><input type="text" name="childsName'.$i.'" id="childsName'.$i.'" class="detailInfoEdit actived cname" placeholder="'.$childArr[$x].'" autocomplete="off" ></td>
                                        <td><input type="date" name="childsBday'.$i.'" id="childsBday'.$i.'" class="detailInfoEdit actived" value="'.$childBdayArr[$x].'" autocomplete="off" ></td>
                                    </tr>';
                                $i++;
                            }
                        echo '<input type="text" id="childCount" value='.$childLength.' style="display:none">';
                        ?>
                    </tbody>
                    
                </table>
                <button type="button" onclick="addChild()">add</button>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Height</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $height;?>" value="<?php echo $height;?>" name="height" id="height" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Weight</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $weight;?>" value="<?php echo $weight;?>" name="weight" id="weight" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Blood Type</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $bloodType;?>" value="<?php echo $bloodType;?>" name="bloodType" id="bloodType" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">SSS no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $sssNo;?>" value="<?php echo $sssNo;?>" name="sssNo" id="sssNo" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Philhealth no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $philNo;?>" value="<?php echo $philNo;?>" name="philNo" id="philNo" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">HDMF no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $hdmfNo;?>" value="<?php echo $hdmfNo;?>" name="hdmfNo" id="hdmfNo" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">Tin no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $tinNo;?>" value="<?php echo $tinNo;?>" name="tinNo" id="tinNo" autocomplete="off" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5">
                    <label class="detailLabel">ATM no.</label>
                </div> 
                <div class="col-7">
                    <input class="detailInfoEdit actived" type="text" placeholder="<?php echo $atmNo;?>" value="<?php echo $atmNo;?>" name="atmNo" id="atmNo" autocomplete="off" >
                </div>
            </div>
            <input type="text" id="childLength" style="display:none">
            <input type="submit" value="Save" id="btnSave">
            <button type="button" id="btnCancel" onclick="editCancel()">Cancel</button>
        </form>

  </body>
</html>