<?php
include 'connect.php';

?>
<html>
  <body>
  <br><br>

  EDITTT
                        <form id="editInfoForm"  method="post"  enctype="multipart/form-data" onsubmit="editEmployeeSubmit(event)">
                            <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">

                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">First Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $fname;?>" value="<?php echo $fname;?>" name="fname" id="fname" autocomplete="off" disabled>
                                    <span class="error" id="fnameError">Letters and white spaces only!</span>
                                </div> 
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Middle Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $mname;?>" value="<?php echo $mname;?>" name="mname" id="mname" autocomplete="off" disabled>
                                    <span class="error"  id="mnameError">Letters and white spaces only!</span>
                                </div> 
                            </div>
                            
                            <div class="row">                            
                                <div class="col-5">
                                    <label class="detailLabel">Last Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $lname;?>" value="<?php echo $lname;?>" name="lname" id="lname" autocomplete="off" disabled>
                                    <span class="error"  id="lnameError">Letters and white spaces only!</span>
                                </div> 
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Suffix</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $suffix;?>" value="<?php echo $suffix;?>" name="suffix" id="suffix" autocomplete="off" disabled>
                                    <span class="error"  id="suffixError">Letters and white spaces only!</span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Birthday</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="date" placeholder="<?php echo $bdate;?>" value="<?php echo $bdate;?>" name="bday" id="bday" disabled>
                                </div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Sex</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $sex;?>" value="<?php echo $sex;?>" name="sex" id="sex" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Civil Status</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $civilStatus;?>" value="<?php echo $civilStatus;?>" name="civilStatus" id="civilStatus" autocomplete="off" disabled>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Nationality</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $nationality;?>" value="<?php echo $nationality;?>" name="nationality" id="nationality" autocomplete="off" disabled>
                                </div>                                
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Religion</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $religion;?>" value="<?php echo $religion;?>" name="religion" id="religion" autocomplete="off" disabled>
                                </div>                                
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Place of Birth</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $placeOfBirth;?>" value="<?php echo $placeOfBirth;?>" name="placeOfBirth" id="placeOfBirth" autocomplete="off" disabled>
                                </div>                                
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Home Address</label>
                                </div> 
                                <div class="col-7">
                                    <select id="selectProvHome" name="selectProvHome" placeholder="<?php echo $homeProvDesc;?>" class="custom-select detailInfo dark-grey-text selEdit" disabled>
                                        <option selected><?php echo $homeProvDesc; ?> </option>
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
                                    <select id="selectCMHome" name="selectCMHome" class="custom-select detailInfo dark-grey-text">
                                        <option selected><?php echo $homeCityMunDesc; ?>  </option>
                                    </select>
                                    <select id="selectBrgyHome" name="selectBrgyHome" class="custom-select detailInfo dark-grey-text">
                                        <option selected><?php echo $homeBrgyDesc; ?>  </option>
                                    </select>

                                    <label class="detailLabel">Detailed Address</label>
                                    <input class="detailInfo" type="text" placeholder="<?php echo $homeDetailedAdd;?>" value="<?php echo $homeDetailedAdd;?>" name="homeDetailedAdd" id="homeDetailedAdd" autocomplete="off" disabled>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Permanent Address</label>
                                </div> 
                                <div class="col-7">
                                    <select id="selectProvPer" name="selectProvPer" placeholder="<?php echo $perProvDesc;?>" class="custom-select detailInfo dark-grey-text">
                                        <option selected><?php echo $perProvDesc; ?> </option>
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
                                    <select id="selectCMPer" name="selectCMPer" class="custom-select detailInfo dark-grey-text">
                                        <option selected><?php echo $perCityMunDesc; ?>  </option>
                                    </select>
                                    <select id="selectBrgyPer" name="selectBrgyPer" class="custom-select detailInfo dark-grey-text">
                                        <option selected><?php echo $perBrgyDesc; ?>  </option>
                                    </select>

                                    <label class="detailLabel">Detailed Address</label>
                                    <input class="detailInfo" type="text" placeholder="<?php echo $perDetailedAdd;?>" value="<?php echo $perDetailedAdd;?>" name="perDetailedAdd" id="perDetailedAdd" autocomplete="off" disabled>
                                </div> 
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Mobile no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $mobileNo;?>" value="<?php echo $mobileNo;?>" name="mobileNo" id="mobileNo" autocomplete="off" disabled>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Telephone no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $telNo;?>" value="<?php echo $telNo;?>" name="telNo" id="telNo" autocomplete="off" disabled>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Email Address</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $emailAdd;?>" value="<?php echo $emailAdd;?>" name="emailAdd" id="emailAdd" autocomplete="off" disabled>
                                </div>                               
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Educational Background (Highest Attainment)</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $educBg;?>" value="<?php echo $educBg;?>" name="educBg" id="educBg" autocomplete="off" disabled>
                                </div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Father's Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $fathersName;?>" value="<?php echo $fathersName;?>" name="fathersName" id="fathersName" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Mother's Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $mothersName;?>" value="<?php echo $mothersName;?>" name="mothersName" id="mothersName" autocomplete="off" disabled>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Spouse Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $spouseName;?>" value="<?php echo $spouseName;?>" name="spouseName" id="spouseName" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Spouse Birthday</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="date" placeholder="<?php echo $spouseBdate;?>" value="<?php echo $spouseBdate;?>" name="spouseBdate" id="spouseBdate" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Child's Name</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $childsName;?>" value="<?php echo $childsName;?>" name="childsName" id="childsName" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Child's Birthday</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="date" placeholder="<?php echo $childsBday;?>" value="<?php echo $childsBday;?>" name="childsBday" id="childsBday" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Height</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $height;?>" value="<?php echo $height;?>" name="height" id="height" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Weight</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $weight;?>" value="<?php echo $weight;?>" name="weight" id="weight" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Blood Type</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $bloodType;?>" value="<?php echo $bloodType;?>" name="bloodType" id="bloodType" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">SSS no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $sssNo;?>" value="<?php echo $sssNo;?>" name="sssNo" id="sssNo" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Philhealth no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $philNo;?>" value="<?php echo $philNo;?>" name="philNo" id="philNo" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">HDMF no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $hdmfNo;?>" value="<?php echo $hdmfNo;?>" name="hdmfNo" id="hdmfNo" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Tin no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $tinNo;?>" value="<?php echo $tinNo;?>" name="tinNo" id="tinNo" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">ATM no.</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $atmNo;?>" value="<?php echo $atmNo;?>" name="atmNo" id="atmNo" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Deployed</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $deployed;?>" value="<?php echo $deployed;?>" name="deployed" id="deployed" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Basic</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $basic;?>" value="<?php echo $basic;?>" name="basic" id="basic" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Rate</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $rate;?>" value="<?php echo $rate;?>" name="rate" id="rate" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Allowance</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $allowance;?>" value="<?php echo $allowance;?>" name="allowance" id="allowance" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <label class="detailLabel">Gross</label>
                                </div> 
                                <div class="col-7">
                                    <input class="detailInfo" type="text" placeholder="<?php echo $gross;?>" value="<?php echo $gross;?>" name="gross" id="gross" autocomplete="off" disabled>
                                </div>
                            </div>


                            <button type="button" id="btnEdit">Edit</button>
                            <input type="submit" value="Save" id="btnSave">
                            <button type="button" id="btnCancel" onclick="editCancel()">Cancel</button>
  </body>
</html>