<?php
include 'connect.php';
$empno = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style.css" />
    
    <link rel="stylesheet" href="stylesheets/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="stylesheets/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="stylesheets/jquery/3.4.1/jquery.min.js"></script>
    <script src="stylesheets/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="stylesheets/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="stylesheets/_code.scss">
    <link rel="stylesheet" href="stylesheets/_grid.scss">
    <link rel="stylesheet" href="stylesheets/_reboot.scss">
    <link rel="stylesheet" href="stylesheets/_root.scss">
    <link rel="stylesheet" href="stylesheets/bootstrap.scss">
    <link rel="stylesheet" href="stylesheets/bs.css">
    <link rel="stylesheet" href="stylesheets/grid-framework.less">
    <link rel="stylesheet" href="stylesheets/grid.less">
    <link rel="stylesheet" href="stylesheets/grid2.less">
    
    <link href="stylesheets/font.css" rel="stylesheet"> 
    
    <script type="text/javascript" src="fontawesome-free-5.11.2-web/js/all.min.js"></script>

    <title>EMPLOYEE'S Details</title>
</head>
    <body>
        <div id="headerCompanyName">
          <img src="logo.jpg" id="logo"/>
		</div>
        
        
        <div class="container">
            <a href="index.php" class="btn" id="backBtn">Back</a>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#empInfo">Employee's Information</a></li>
                <li><a href="#serviceRec">Service Record</a></li>
                <li><a href="#memo">Memo</a></li>
            </ul>

            <div class="tab-content">
               
<!--                EMPLOYEE'S INFORMATION TAB-->
                <div id="empInfo" class="tab-pane fade in active">
                    <?php
                        $empid=""; $fname = ""; $mname = "";   $lname = "";    $suffix = "";   $bdate = "";    $sex = "";  $civilStatus = "";  $nationality = "";
                        $religion = ""; $placeOfBirth = ""; $homeProvCode = ""; $homeCityMunCode = "";  $homeBrgyCode= "";  $homeDetailedAdd = "";
                        $perProvCode = "";  $perCityMunCode= "";    $perBrgyCode = "";  $perDetailedAdd = "";   $mobileNo = ""; $telNo = "";    $emailAdd = "";
                        $educBg = "";   $fathersName = "";  $mothersName = "";  $spouseName = "";   $spouseBdate = "";  $height = "";   $weight = "";   $bloodType = "";
                        $sssNo = "";    $philNo = "";   $hdmfNo = "";   $tinNo = "";    $atmNo = "";
                        
                    
                        $select = "SELECT * FROM `employeeinfo` WHERE `emp_no` = '$empno'";
                        $result = mysqli_query($con,$select);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array($result))  
                            { 
                                $empid= $row["emp_id"];
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
                                echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname) .' '.ucwords($suffix).'</h2>';
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
                                $homeProvDesc = strtolower($row["provDesc"]);
                            }
                        }

                        $select = "SELECT * FROM `refcitymun` WHERE `citymunCode` = '$homeCityMunCode'";
                        $result = mysqli_query($con,$select);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array($result))  
                            { 
                                $homeCityMunDesc = strtolower($row["citymunDesc"]);
                            }
                        }                       


                        // PERMANENT ADDRESS
                        $select = "SELECT * FROM `refprovince` WHERE `provcode` = '$perProvCode'";
                        $result = mysqli_query($con,$select);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array($result))  
                            { 
                                $perProvDesc = strtolower($row["provDesc"]);
                            }
                        }

                        $select = "SELECT * FROM `refcitymun` WHERE `citymunCode` = '$perCityMunCode'";
                        $result = mysqli_query($con,$select);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array($result))  
                            { 
                                $perCityMunDesc = strtolower($row["citymunDesc"]);
                            }
                        }

                


                        if($spouseBdate=="0000-00-00"){
                            $spouseBdate="";
                        }

                        if($bdate=="0000-00-00"){
                            $bdate="";
                        }

                        
                    ?>
                    
                    
                    
                    <div id="infoDetails">
                        <br><br>
                            <input type="text" value="<?php echo $empno?>" name="empno" id="empno" style="display:none;">
                        
                        <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Employee ID No.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $empid;?></label>
                                </div> 
                        </div>

                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">First Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($fname);?></label>
                                </div> 

                                <div class="col-2">
                                    <label class="detailLabel">Middle Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($mname);?></label>
                                </div> 
                            </div>
                            
                            <div class="row">                            
                                <div class="col-2">
                                    <label class="detailLabel">Last Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($lname);?></label>
                                </div> 
                                <div class="col-2">
                                    <label class="detailLabel">Suffix</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($suffix);?></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Birthday</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $bdate;?></label>
                                </div>  
                                <div class="col-2">
                                    <label class="detailLabel">Place of Birth</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($placeOfBirth)?></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Sex</label>
                                </div> 
                                <div class="col-4">                                    
                                    <label class="detailInfo"><?php echo ucfirst($sex);?></label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Civil Status</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($civilStatus)?></label>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Nationality</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($nationality)?></label>
                                </div> 
                                <div class="col-2">
                                    <label class="detailLabel">Religion</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucfirst($religion)?></label>
                                </div>                                      
                            </div>
                            <hr id="line2">
                            <div class="row">
                                <div class="col-4">
                                    <label class="detailLabel">Home Address</label>
                                </div> 
                                <div class="col-8">
                                    <label class="detailInfo">
                                    <?php 

                                        $select = "SELECT * FROM `refbrgy` WHERE `brgyCode` = '$homeBrgyCode'";
                                        $result = mysqli_query($con,$select);
                                        if(mysqli_num_rows($result)>0)
                                        {
                                            while($row = mysqli_fetch_array($result))  
                                            { 
                                                $homeBrgyDesc =  ucfirst($row["brgyDesc"]);
                                            }
                                        }        
                                        
                                        echo $homeDetailedAdd . ' ';
                                        if ($homeBrgyCode==""){
                                            $homeBrgyDesc="";
                                        }else{
                                            echo ucfirst($homeBrgyDesc) .', ';
                                        }
                                        
                                        if ($homeCityMunCode==""){
                                            $homeCityMunDesc="";
                                        }else{
                                            echo ucfirst($homeCityMunDesc) .', ';
                                        }
                                        
                                        if ($homeProvCode==""){
                                            $homeProvDesc="";
                                        }else{
                                            echo ucfirst($homeProvDesc);
                                        }
                                     ?>
                                     </label>
                                </div>      
                            </div>                 
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <label class="detailLabel">Permanent Address</label>
                                </div> 
                                <div class="col-8">
                                    <label class="detailInfo">
                                    <?php

                                        $select = "SELECT * FROM `refbrgy` WHERE `brgyCode` = '$perBrgyCode'";
                                        $result = mysqli_query($con,$select);
                                        if(mysqli_num_rows($result)>0)
                                        {
                                            while($row = mysqli_fetch_array($result))  
                                            { 
                                                $perBrgyDesc =  ucfirst($row["brgyDesc"]);
                                            }
                                        }           
                                        
                                        echo $perDetailedAdd . ' ';
                                        if ($perBrgyCode==""){
                                            $perBrgyDesc="";
                                        }else{
                                            echo ucfirst($perBrgyDesc) .', ';
                                        }
                                        
                                        if ($perCityMunCode==""){
                                            $perCityMunDesc="";
                                        }else{
                                            echo ucfirst($perCityMunDesc) .', ';
                                        }
                                        
                                        if ($perProvCode==""){
                                            $perProvDesc="";
                                        }else{
                                            echo ucfirst($perProvDesc);
                                        }
                                     ?>
                                     </label>
                                </div>   
                            </div>
                            
                            <hr id="line2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Mobile no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo">
                                        <?php 
                                            if ($mobileNo!=0){
                                                echo $mobileNo;
                                            }
                                        ?>
                                    </label>
                                </div>   
                                <div class="col-2">
                                    <label class="detailLabel">Telephone no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo">
                                        <?php
                                            if ($telNo!=0){
                                                echo $telNo;
                                            }
                                        ?>
                                    </label>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Email Address</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $emailAdd?></label>
                                </div>         
                                <div class="col-3">
                                    <label class="detailLabel">Educational Background (Highest Attainment)</label>
                                </div> 
                                <div class="col-3">
                                    <label class="detailInfo"><?php echo $educBg?></label>
                                </div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Father's Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucwords($fathersName)?></label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Mother's Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucwords($mothersName)?></label>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Spouse Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo ucwords($spouseName)?></label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Spouse Birthday</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $spouseBdate?></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <?php
                                            
                                            
                                     
                                            
                                             
                                            
                                ?>
                                <div class="col-2">
                                    <label class="detailLabel">Child's Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo">
                                        <?php
                                            $select = "SELECT * FROM `employeechildren` WHERE `emp_no` = '$empno'";
                                            $result = mysqli_query($con,$select);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                while($row = mysqli_fetch_array($result))  
                                                {
                                                    echo $row["empChild_name"]."<br>";
                                                }
                                            }  
                                        ?>
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Child's Birthday</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo">
                                        <?php
                                        $select = "SELECT * FROM `employeechildren` WHERE `emp_no` = '$empno'";
                                            $result = mysqli_query($con,$select);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                while($row = mysqli_fetch_array($result))  
                                                {
                                                    if($row["empChild_bday"]=="0000-00-00"){
                                                        $childsBday="";
                                                    }else{
                                                        $childsBday=$row["empChild_bday"];
                                                    }
                                                    echo $childsBday."<br>";
                                                }
                                            }
                                            
                                          
                                        ?>
                                    </label>
                                </div>
                            </div>
                            <hr id="line2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Height</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $height?></label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Weight</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $weight?></label>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">Blood Type</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $bloodType?></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">SSS no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $sssNo?></label>
                                </div>
                                <div class="col-2">
                                    <label class="detailLabel">Philhealth no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $philNo?></label>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">HDMF no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $hdmfNo?></label>
                                </div>                                
                                <div class="col-2">
                                    <label class="detailLabel">Tin no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $tinNo?></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-2">
                                    <label class="detailLabel">ATM no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $atmNo?></label>
                                </div>
                            </div>
                            <button type="button" id="btnEdit" onclick="editInfo()">Edit</button>
 
                    </div>
                </div>
                
                
<!--                SERVICE RECORD TAB-->
                <div id="serviceRec" class="tab-pane fade">
                  <?php
                    echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname).' '.ucwords($suffix).'</h2>';
                    
                    ?>
                    <div id = "tableEmployeeDiv2">     
                        <button id = "addRecordButton" type="button" class="btn" data-toggle="modal" data-target="#addRecordModal" onclick="addRecord()">Add Record</button>
                        <br><br>
                        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                            <thead>  
                                  <tr>    
                                      <th>DATE</th> 
                                      <th>POSITION</th>
                                      <th>DEPLOYED</th>
                                      <th>BASIC</th>
                                      <th>RATE</th>
                                      <th>ALLOWANCE</th>
                                      <th>GROSS</th>
                                      <th>INFORMATION</th>
                                      <th>YEARS OF SERVICE</th>
                                      <th>ACTION</th>
                                  </tr>  
                            </thead>
                            <?php
                                $serrecno = 0;
                                echo '<td id="empnoSer" style="display:none;">'. $empno .'</td>';
                                $select = mysqli_query($con,"SELECT * FROM `servicerecord` where `emp_no` = '$empno' order by `serrec_date` desc");
                                while($row = mysqli_fetch_array($select))  
                                {  
                                    $serrecno = $row["serrec_no"];
                                    echo '<tr>';
                                    echo '<td>'. $row["serrec_date"] .'</td>';
                                    echo '<td>'. $row["serrec_position"] .'</td>';
                                    echo '<td>'. $row["serrec_deployed"] .'</td>';
                                    
                                    if($row["serrec_basic"]==0){
                                        echo '<td></td>';
                                    }else{
                                        echo '<td>₱ '. number_format($row["serrec_basic"],2) .'</td>';
                                    }
                                    
                                    if($row["serrec_rate"]==0){
                                        echo '<td></td>';
                                    }else{
                                        echo '<td>'.$row["serrec_rate"] .'</td>';
                                    }
                                    
                                    if($row["serrec_allowance"]==0){
                                        echo '<td></td>';
                                    }else{
                                        echo '<td>₱ '. number_format($row["serrec_allowance"],2) .'</td>';
                                    }
                                    
                                    if($row["serrec_gross"]==0){
                                        echo '<td></td>';
                                    }else{
                                        echo '<td>'. $row["serrec_gross"] .'</td>';
                                    }
                                    echo '<td>'. $row["serrec_info"] .'</td>';
                                    
                                    if($row["serrec_yrsOfService"]==0){
                                        echo '<td></td>';
                                    }else{
                                        echo '<td>'. $row["serrec_yrsOfService"] .'</td>';
                                    }
                                    echo '<td><button type="button" id="editRecBtn" data-toggle="modal" data-target="#editRecordModal" class="btnsSerRec" onclick="editRecord('.$serrecno.')">Edit</button>
                                        <button type="button" class="btnsSerRec" id="delRecBtn" onclick="deleteRecord('.$serrecno.')">Delete</button></td>';
                                    echo '</tr>';
                                }
                            ?>

                            </table>  
                    </div>
                </div>
                
                
                
<!--                MEMO TAB-->
                <div id="memo" class="tab-pane fade">
                  <?php
                    echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname) .' '.ucwords($suffix).'</h2>';                    
                    ?>
                    
                    <div id = "tableEmployeeDiv3">  
                        <button id = "addMemoButton" type="button" class="btn" data-toggle="modal" data-target="#addMemoModal" onclick="addMemo()">Add Memo</button>
                        <br><br>
                        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                            <thead>  
                                  <tr>    
                                      <th>DATE</th> 
                                      <th>MEMO</th>
                                      <th>MEMO FROM</th>
                                      <th>ACTION</th>
                                  </tr>  
                            </thead>
                            <?php
                                $memo_no = 0;
                                echo '<td id="empnoMemo" style="display:none;">'. $empno .'</td>';
                                $select = mysqli_query($con,"SELECT * FROM `memo` where `emp_no` = '$empno' order by `memo_date` desc");
                                while($row = mysqli_fetch_array($select))  
                                {  
                                    $memo_no = $row["memo_no"];
                                    echo '<tr>';
                                    echo '<td>'. $row["memo_date"] .'</td>';
                                    echo '<td>'. $row["memo_details"] .'</td>';
                                    echo '<td>'. $row["memo_from"] .'</td>';
                                    echo '<td><button type="button" id="delRecBtn" onclick="deleteMemo('.$memo_no.')">Delete</button></td>';
                                    echo '</tr>';
                                }
                            ?>

                            </table>  
                    </div>
                </div>
                

            </div>
        </div>

        
        
<!--        MODALLLLLL-->
        <!-- Modal add record-->
        <div class="modal fade" id="addRecordModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Record</h4>
                  <button type="button" class="close" id="closeAdd" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div id="addRecordDisp"></div>
                </div>
              </div>

            </div>
        </div>
        
        
<!--        modal edit record-->
        
        <div class="modal fade" id="editRecordModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Record</h4>
                  <button type="button" class="close" id="closeEdit" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <div id="editRecordDisp"></div>
                </div>
              </div>

            </div>
        </div>
        
                <div class="modal fade" id="addMemoModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Memo</h4>
                  <button type="button" class="close" id="closeAddM" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <div id="addMemoDisp"></div>
                </div>
              </div>

            </div>
        </div>
        
        
<!--        SCRIPTS-->
        <script>
            
//            EMPLOYEE INFORMATION CRIPTS
            function isString(name) {
                var regex = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
                if (!regex.test(name)) {
                    return false;
                } else {
                    return true;
                }
            }
            
            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                    return false;
                }else{
                    return true;
                }
            }

            function isNumber(num){
                var regex = /^[0-9]+$/;
                if(!regex.test(num)) {
                    return false;
                }else{
                    return true;
                }
            }

        
            var validFName = true;
            var validMName = true;
            var validLName = true;
            var validcivStatus = true;
            var validNationality = true;
            var validReligion = true;
            var validPlaceOfBirth = true;
            var validemail = true;
            var validnumber = true;
            var validChild = true;

            $(document).ready(function(){
                $(".nav-tabs a").click(function(){
                    $(this).tab("show")
                });

                $("input").focus(function(){
                    $(this).css("border-bottom", "3px solid #0762f5");
                });
                $("input").blur(function(){
                    $(this).css("border-bottom", "2px solid dimgray");
                });        
            })
            
            function fnameValidation(v){
                if(isString(v) == true){                                          
                    document.getElementById("fnameError").style.display = "none";
                    validFName = true;
                }else{                                     
                    document.getElementById("fnameError").style.display = "inline-block";
                    validFName = false;
                }
            }
            
            function mnameValidation(v){
                if(v!=""){
                    if(isString(v) == true){                                          
                        document.getElementById("mnameError").style.display = "none";
                        validMName = true;
                    }else{                                     
                        document.getElementById("mnameError").style.display = "inline-block";
                        validMName = false;
                    }
                }else{
                    validMName = true;
                }                
            }
            
            function lnameValidation(v){
                if(isString(v) == true){                                          
                    document.getElementById("lnameError").style.display = "none";
                    validLName = true;
                }else{                                     
                    document.getElementById("lnameError").style.display = "inline-block";
                    validLName = false;
                }
            }
            
            function civilStatusValidation(v){
                if(isString(v) == true){              
                    document.getElementById("civilStatusError").style.display = "none";
                    validcivStatus = true;
                }else{                           
                    document.getElementById("civilStatusError").style.display = "inline-block";   
                    validcivStatus = false;
                }
            }
            
            function nationalityValidation(v){
                if(isString(v) == true){                                 
                    document.getElementById("nationalityError").style.display = "none";
                    validNationality = true;
                }else{                           
                    document.getElementById("nationalityError").style.display = "inline-block";     
                    validNationality = false;
                }
            }
            
            function religionValidation(v){
                if (v!=""){
                    if(isString(v) == true){                              
                    document.getElementById("religionError").style.display = "none";
                    validReligion = true;
                    }else{                                    
                        document.getElementById("religionError").style.display = "inline-block";
                        validReligion = false;
                    }
                }
                
            }
            
            function placeOfBirthValidation(v){
                if(isString(v) == true){                               
                    document.getElementById("placeOfBirthError").style.display = "none";
                    validPlaceOfBirth = true;
                }else{                              
                    document.getElementById("placeOfBirthError").style.display = "inline-block";
                    validPlaceOfBirth = false;
                }
            }
            
            function emailValidation(v){
                if(isEmail(v) == true){                                           
                     document.getElementById("emailError").style.display = "none";
                     validemail = true;
                }else{                                 
                     document.getElementById("emailError").style.display = "inline-block";
                     validemail = false;
                }
            }
            
            function mobNoValidation(v){
                if(isNumber(v) == true){                                           
                    document.getElementById("mobNoError").style.display = "none";
                    if((v.length)==10){        
                        document.getElementById("mobNoError").style.display = "none";
                        validnumber = true;
                    }else{
                        document.getElementById("mobNoError").style.display = "inline-block";
                        validnumber = false;
                    }

                }else{                           
                    document.getElementById("mobNoError").style.display = "inline-block";
                    validnumber = false;
                }
        }


            // HOME ADDRESS
            var prv="";
            function chooseCMHome(p) {
                prv = p;
                document.getElementById("selectCMHome").disabled = false;
                $.post("toDisplayCityMunicipality.php", {   
                    p:p,
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectCMHome');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectCMHome').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                        
                });
            }
 
            function chooseBrgyHome(c){

                document.getElementById("selectBrgyHome").disabled = false;
                $.post("toDisplayBarangay.php", {   
                    p:prv,
                    cm:c
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectBrgyHome');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectBrgyHome').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                });
            }

            // PERMANENT ADDRESS
            var prv="";
            function chooseCMPerm(p) {
                prv = p;
                document.getElementById("selectCMPer").disabled = false;
                $.post("toDisplayCityMunicipality.php", {   
                    p:p,
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectCMPer');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectCMPer').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                        
                });
            }

            function chooseBrgyPerm(cm){

                document.getElementById("selectBrgyPer").disabled = false;
                $.post("toDisplayBarangay.php", {   
                    p:prv,
                    cm:cm
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectBrgyPer');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectBrgyPer').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                });
            }

            var cnt = 0;
            function addChild(){
                var a = parseInt(document.getElementById("childCount").value);  
                
                cnt++; 
                var c = cnt+a;
                var table = document.getElementById("childTable");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = '<input type="text" name="childsName'+c+'" id="childsName'+c+'" class="detailInfoEdit actived cname" placeholder="" autocomplete="off" >';
                cell2.innerHTML = '<td><input type="date" name="childsBday'+c+'" id="childsBday'+c+'" class="detailInfoEdit actived" placeholder="" autocomplete="off" ></td>';
                
            }
            
            function editInfo(){
                var e = document.getElementById("empno").value;
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("infoDetails").innerHTML = this.responseText;
                    }
                };
                xml.open("get", "editEmployeeDisplay.php?e="+e, true);
                xml.send();
               return false;
            }
            
            function editCancel(){
                $( "#empInfo" ).load(window.location.href + " #empInfo" );
            }
            
            function editEmployeeSubmit(event){
                var childLength = document.querySelectorAll("input.cname").length;
                document.getElementById("childLength").value=childLength;
                
                for(var i=1; i<=childLength;i++){
                    if(document.getElementById("childsName"+i).value!=""){
                        if(document.getElementById("childsBday"+i).value==""){
                            validChild=false;
                        }else{
                            validChild=true;
                        }
                    }
                }
                
                if(validFName==false || validMName==false || validLName==false || validcivStatus==false || validNationality==false  || validReligion==false  || validPlaceOfBirth==false  || validnumber==false || validemail==false){
                    
                        event.preventDefault();
                        alert("Please check all your inputs");
                }
                else{
                    if(validChild==true){
                        document.getElementById("selectCMHome").disabled = false;
                        document.getElementById("selectBrgyHome").disabled = false;
                        document.getElementById("selectCMPer").disabled = false;
                        document.getElementById("selectBrgyPer").disabled = false;
                        if (confirm("Are you sure you want to save changes?")) {
                            event.preventDefault();
                            var form = document.forms.editInfoForm;
                            var dataInputted = new FormData(form);

                                 $.ajax({
                                    url:"toEditEmployee.php",
                                    type:"POST",
                                    enctype: "multipart/form-data",
                                    data: dataInputted,
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success:function(data)
                                    {
//                                        alert("Changes Saved.");
                                        alert(data);
                                        event.preventDefault();
//                                        $( "#empInfo" ).load(window.location.href + " #empInfo" );
                                    }
                                });
                        }

                    }else{
                        alert("Please check inputs on child's name and birthday");
                        event.preventDefault();
                    }
                }
            }
            
            
//           SERVICE RECORD SCRIPTS       
            
            function addRecord(){
                var empno = document.getElementById("empnoSer").innerHTML;
                xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if(xml.readyState==4 && xml.status==200) {
                        document.getElementById("addRecordDisp").innerHTML = xml.responseText;
                    }
                };

                xml.open("GET","modalAddRecord.php?id="+empno,true);
                xml.send();
//                alert(empno);
            }
            
            
            function addRecordSubmit(event){
                let serDateInput = document.getElementById("serdate").value;
                let serPosInput = document.getElementById("position").value;
                let serDeployedInput = document.getElementById("deployed").value;
                
                if (serDateInput == "" || serDeployedInput == "" || serPosInput == "" ){
                    alert("Please complete the fields");
                    event.preventDefault();
                }else{
                    if (confirm("Are you sure you want to add this record?")) {
                        event.preventDefault();
                        var form = document.forms.addRecForm;
                        var dataInputted = new FormData(form);
                        $.ajax({
                            url:"toAddRecord.php",
                            type:"POST",
                            enctype: "multipart/form-data",
                            data: dataInputted,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success:function(data)
                            {
                                alert("Record added into the database.")
                                document.getElementById("closeAdd").click();                                
                                $( "#tableEmployeeDiv2" ).load(window.location.href + " #tableEmployeeDiv2" );
//                                alert (data);

                            }
                        });
                    }                    
                }
            }
            
            function deleteRecord(id) {
                 if (confirm("Do you want to delete this record?")) {
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                        if (xml.readyState == 4 && xml.status == 200) {
                            alert("Record sucessfully deleted.");
                            $( "#tableEmployeeDiv2" ).load(window.location.href + " #tableEmployeeDiv2" );
                        }
                    };
                    xml.open("get", "toRemoveRecord.php?i=" + id, true);
                    xml.send();
                    return false;
                  }
            }
                    
            function editRecord(no){
                xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if(xml.readyState==4 && xml.status==200) {
                        document.getElementById("editRecordDisp").innerHTML = xml.responseText;
                    }
                };

                xml.open("GET","modalEditRecord.php?id="+no,true);
                xml.send();
            }
            
            function editRecordSubmit(event){
                if (confirm("Are you sure you want to save changes?")) {
                    event.preventDefault();
                    var form = document.forms.editRecForm;
                    var dataInputted = new FormData(form);

                     $.ajax({
                        url:"toEditRecord.php",
                        type:"POST",
                        enctype: "multipart/form-data",
                        data: dataInputted,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                            alert("Changes Saved.");
                            document.getElementById("closeEdit").click();                                
                            $( "#tableEmployeeDiv2" ).load(window.location.href + " #tableEmployeeDiv2" );

                        }
                    });
                }
            }
            
//            MEMO
            
            function addMemo(){
                var empno = document.getElementById("empnoMemo").innerHTML;
                xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if(xml.readyState==4 && xml.status==200) {
                        document.getElementById("addMemoDisp").innerHTML = xml.responseText;
                    }
                };

                xml.open("GET","modalAddMemo.php?id="+empno,true);
                xml.send();
//                alert(empno);
            }
            
            function addMemoSubmit(event){
                var memodate = document.getElementById("memodate").value;
                var memo = document.getElementsByTagName("textarea")[0].value;
//                
                if (memodate == "" || memo == "" ){
                    alert("Please complete the fields");
                    event.preventDefault();
                }else{
                    
                    if (confirm("Are you sure you want to add this memo?")) {
                        event.preventDefault();
                        var form = document.forms.addMemoForm;
                        var dataInputted = new FormData(form);
                        $.ajax({
                            url:"toAddMemo.php",
                            type:"POST",
                            enctype: "multipart/form-data",
                            data: dataInputted,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success:function(data)
                            {
                                alert("Memo added into the database.");
                                document.getElementById("closeAddM").click();                                
                                $( "#tableEmployeeDiv3" ).load(window.location.href + " #tableEmployeeDiv3" );

                            }
                        });
                    }                    
                }
            }
            
            function deleteMemo(id) {
                 if (confirm("Do you want to delete this memo?")) {
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                        if (xml.readyState == 4 && xml.status == 200) {
                            alert("Memo sucessfully deleted.");
                            $( "#tableEmployeeDiv3" ).load(window.location.href + " #tableEmployeeDiv3" );
                        }
                    };
                    xml.open("get", "toRemoveMemo.php?i=" + id, true);
                    xml.send();
                    return false;
                  }
            }
        </script>
        <div class="socials">
            <footer class="footer">
                © 2020 Copyright: Developer 
                <a href="https://www.facebook.com/triscia.ayescia215"> Triscia Weigh</a>
            </footer>
        </div>
    </body>
</html>