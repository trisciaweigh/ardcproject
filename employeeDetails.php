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
<!--
    <script src="bootstrap-4.0.0-dist/css/bootstrap-grid.css"></script>
    <script src="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css"></script>
    <script src="bootstrap-4.0.0-dist/css/bootstrap-reboot.css"></script>
    <script src="bootstrap-4.0.0-dist/css/bootstrap-reboot.min.css"></script>
    <script src="bootstrap-4.0.0-dist/css/bootstrap.css"></script>
    <script src="bootstrap-4.0.0-dist/css/bootstrap.min.css"></script>
-->
    
<!--    <script src="bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet"> 

        <!-- <link href="stylesheets/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="stylesheets/bootstrap.css">

    <link href="stylesheets/jquery.growl.css" rel="stylesheet" />
    <link href="stylesheets/jquery-confirm.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <!-- Material Design Bootstrap -->
    <!-- <link href="mdbootstrap/css/mdb.css" rel="stylesheet">
    <link href="stylesheets/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.min.css">
    <link href="stylesheets/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap-datepicker.css"> -->

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
                        $fname = ""; $mname = "";   $lname = "";    $suffix = "";   $bdate = "";    $sex = "";  $civilStatus = "";  $nationality = "";
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


                        if($spouseBdate=="0000-00-00"){
                            $spouseBdate="";
                        }

                        if($bdate=="0000-00-00"){
                            $bdate="";
                        }

                        if($childsBday=="0000-00-00"){
                            $childsBday="";
                        }
                    ?>
                    
                    
                    
                    <div id="infoDetails">
                        <br><br>
                            <input type="text" value="<?php echo $empno?>" name="empno" id="empno" style="display:none;">

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
                                        
                                        echo $homeDetailedAdd . ' '. $homeBrgyDesc .', '. ucfirst($homeCityMunDesc). ', ' .ucfirst($homeProvDesc)
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
                                        
                                        echo $perDetailedAdd . ' '. $perBrgyDesc .', '. ucfirst($perCityMunDesc). ', ' .ucfirst($perProvDesc)
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
                                    <label class="detailInfo"><?php echo $mobileNo?></label>
                                </div>   
                                <div class="col-2">
                                    <label class="detailLabel">Telephone no.</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo"><?php echo $telNo?></label>
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
                                <div class="col-2">
                                    <label class="detailLabel">Child's Name</label>
                                </div> 
                                <div class="col-4">
                                    <label class="detailInfo">
                                        <?php
                                            $childArr = explode ("/", $childsName); 
                                            for ($x=0; $x<count($childArr); $x++){
                                                echo $childArr[$x] ."<br>";
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
                                            $childBdayArr = explode ("/", $childsBday); 
                                            for ($x=0; $x<count($childBdayArr); $x++){
                                                echo $childBdayArr[$x] ."<br>";
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
                                    echo '<td>'. $row["serrec_basic"] .'</td>';
                                    echo '<td>'. $row["serrec_rate"] .'</td>';
                                    echo '<td>'. $row["serrec_allowance"] .'</td>';
                                    echo '<td>'. $row["serrec_gross"] .'</td>';
                                    echo '<td>'. $row["serrec_info"] .'</td>';
                                    echo '<td>'. $row["serrec_yrsOfService"] .'</td>';
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
                    
                    <div id = "tableEmployeeDiv">     
                        <br><br>
                        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                            <thead>  
                                  <tr>    
                                      <th>DATE</th> 
                                      <th>MEMO</th>
                                      <th>SENT BY</th>
                                      <th>ACTION</th>
                                  </tr>  
                            </thead>
                            <?php
                                $memo_no = 0;
                                echo '<td id="empno" style="display:none;">'. $empno .'</td>';
                                $select = mysqli_query($con,"SELECT * FROM `memo` where `emp_no` = '$empno' order by `memo_date` desc");
                                while($row = mysqli_fetch_array($select))  
                                {  
                                    $memo_no = $row["memo_no"];
                                    echo '<tr>';
                                    echo '<td>'. $row["memo_date"] .'</td>';
                                    echo '<td>'. $row["memo_details"] .'</td>';
                                    echo '<td>'. $row["memo_from"] .'</td>';
                                    echo '<td><button type="button" id="delRecBtn" onclick="deleteRecord('.$memo_no.')">Delete</button></td>';
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
            
            var editErr = 0;
            $(document).ready(function(){
                $(".nav-tabs a").click(function(){
                    $(this).tab("show")
                });

                $("input").focus(function(){
                    $(this).css("border-bottom", "2px solid #2074fa");
                });
                $("input").blur(function(){
                    $(this).css("border-bottom", "2px solid dimgray");
                });
                
                $("#fname").on("change",function(){
                    if(isString($(this).val()) == true){
                        document.getElementById("fnameError").style.display = "none";
                        editErr = 0;
                    }
                    else{
                        document.getElementById("fnameError").style.display = "inline-block";
                        $(this).focusin();
                        editErr++;
                    }
                })
                
                $("#mname").on("change",function(){
                    if(isString($(this).val()) == true){
                        document.getElementById("mnameError").style.display = "none";
                        editErr = 0;
                    }
                    else{
                        document.getElementById("mnameError").style.display = "inline-block";
                        $(this).focusin();
                        editErr++;
                    }
                })
                
                $("#lname").on("change",function(){
                    if(isString($(this).val()) == true){
                        document.getElementById("lnameError").style.display = "none";
                        editErr = 0;
                    }
                    else{
                        editErr++;
                        document.getElementById("lnameError").style.display = "inline-block";
                        $(this).focusin();
                    }
                })

            })


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
                alert(childLength);
                
//                if(editErr == 0){
//                    document.getElementById("selectCMHome").disabled = false;                    
//                    document.getElementById("selectBrgyHome").disabled = false;
//                    document.getElementById("selectCMPer").disabled = false;
//                    document.getElementById("selectBrgyPer").disabled = false;
//                    if (confirm("Are you sure you want to save changes?")) {
//                        event.preventDefault();
//                        var form = document.forms.editInfoForm;
//                        var dataInputted = new FormData(form);
//    
//                             $.ajax({
//                                url:"toEditEmployee.php",
//                                type:"POST",
//                                enctype: "multipart/form-data",
//                                data: dataInputted,
//                                contentType: false,
//                                cache: false,
//                                processData: false,
//                                success:function(data)
//                                {
//                                    alert("Changes Saved.");
//                                    $( "#empInfo" ).load(window.location.href + " #empInfo" );
////                                    alert(data);
//                                }
//                            });
//                    }
//                    
//                }
//                else{
//                    event.preventDefault();
//                    alert("Check your inputs");
//                }
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
                var err = 0;
                let serDateInput = document.getElementById("serdate").value;
                let serPosInput = document.getElementById("position").value;
                let serInfoInput = document.getElementById("info").value;
                
                if (serDateInput == "" || serPosInput == "" || serInfoInput == "" ){
                    err++;
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
        </script>
    </body>
</html>