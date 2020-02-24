<?php
include 'connect.php';
$empno = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet"> 
    
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
                        $fname = "";
                        $mname = "";
                        $lname = "";
                        $bdate = "";
                    
                    
                     $select = "SELECT * FROM `employeeinfo` WHERE `emp_no` = '$empno'";
                     $result = mysqli_query($con,$select);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_array($result))  
                        { 
                            $fname = $row["emp_fname"];
                            $mname = $row["emp_mname"];
                            $lname = $row["emp_lname"];
                            $bdate = $row["emp_bday"];
                            echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname).'</h2>';
                        }
                    }
                    else{
                        echo mysqli_error($con);
                    }
                    ?>
                    
                    
                    
                    <div>
                        <br><br>
                        <form id="editInfoForm"  method="post"  enctype="multipart/form-data" onsubmit="editEmployeeSubmit(event)">
                            <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">
                            <div class="col-4 col-sm-4 col-md-3">
                                <label class="detailLabel">First Name</label>
                            </div> 
                             <div class="col-8 col-sm-8 col-md-9">
                                 <input class="detailInfo" type="text" placeholder="<?php echo $fname;?>" value="<?php echo $fname;?>" name="fname" id="fname" autocomplete="off" disabled>
                                 <span class="error" id="fnameError">Letters and white spaces only!</span>
                            </div> 
                            
                            <div class="col-4 col-sm-4 col-md-3">
                                <label class="detailLabel">Middle Name</label>
                            </div> 
                             <div class="col-8 col-sm-8 col-md-9">
                                 <input class="detailInfo" type="text" placeholder="<?php echo $mname;?>" value="<?php echo $mname;?>" name="mname" id="mname" autocomplete="off" disabled>
                                 <span class="error"  id="mnameError">Letters and white spaces only!</span>
                            </div> 
                            
                            <div class="col-4 col-sm-4 col-md-3">
                                <label class="detailLabel">Last Name</label>
                            </div> 
                             <div class="col-8 col-sm-8 col-md-9">
                                 <input class="detailInfo" type="text" placeholder="<?php echo $lname;?>" value="<?php echo $lname;?>" name="lname" id="lname" autocomplete="off" disabled>
                                 <span class="error"  id="lnameError">Letters and white spaces only!</span>
                            </div> 
                            
                            <div class="col-4 col-sm-4 col-md-3">
                                <label class="detailLabel">Birthday</label>
                            </div> 
                             <div class="col-8 col-sm-8 col-md-9">
                                 <input class="detailInfo" type="date" placeholder="<?php echo $bdate;?>" value="<?php echo $bdate;?>" name="bday" id="bday" disabled>
                            </div> 
                            
                            <button type="button" id="btnEdit" onclick="editInfo()">Edit</button>
                            <input type="submit" value="Save" id="btnSave">
                            <button type="button" id="btnCancel" onclick="editCancel()">Cancel</button>
                        </form>
 
                    </div>
                </div>
                
                
<!--                SERVICE RECORD TAB-->
                <div id="serviceRec" class="tab-pane fade">
                  <?php
                    echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname).'</h2>';
                    
                    ?>
                    <div id = "tableEmployeeDiv">     
                        <button id = "addRecordButton" type="button" class="btn" data-toggle="modal" data-target="#addRecordModal" onclick="addRecord()">Add Record</button>
                        <br><br>
                        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                            <thead>  
                                  <tr>    
                                      <th>DATE</th> 
                                      <th>POSITION</th>
                                      <th>INFORMATION</th>
                                      <th>YEARS OF SERVICE</th>
                                      <th>ACTION</th>
                                  </tr>  
                            </thead>
                            <?php
                                $serrecno = 0;
                                echo '<td id="empno" style="display:none;">'. $empno .'</td>';
                                $select = mysqli_query($con,"SELECT * FROM `servicerecord` where `emp_no` = '$empno' order by `serrec_date` desc");
                                while($row = mysqli_fetch_array($select))  
                                {  
                                    $serrecno = $row["serrec_no"];
                                    echo '<tr>';
                                    echo '<td>'. $row["serrec_date"] .'</td>';
                                    echo '<td>'. $row["serrec_position"] .'</td>';
                                    echo '<td>'. $row["serrec_info"] .'</td>';
                                    echo '<td>'. $row["serrec_yrsOfService"] .'</td>';
                                    echo '<td><button type="button" id="editRecBtn" data-toggle="modal" data-target="#editRecordModal" onclick="editRecord('.$serrecno.')">Edit</button>
                                        <button type="button" id="delRecBtn" onclick="deleteRecord('.$serrecno.')">Delete</button></td>';
                                    echo '</tr>';
                                }
                            ?>

                            </table>  
                    </div>
                </div>
                
                
                
<!--                MEMO TAB-->
                <div id="memo" class="tab-pane fade">
                  <?php
                    echo '<h2>'.ucfirst($fname) . ' ' . ucfirst($mname) .' '.ucfirst($lname).'</h2>';                    
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
                  <button type="button" class="close" id="closeAdd" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Record</h4>
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
                  <button type="button" class="close" id="closeEdit" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Record</h4>
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
                    $(this).tab('show');
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
            });

            function editInfo(){
                document.getElementById("btnSave").style.display="inline";
                document.getElementById("btnCancel").style.display="inline";
                document.getElementById("btnEdit").style.display="none";
                var x = document.getElementsByClassName("detailInfo");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].disabled=false;
                    x[i].classList.add("start");
                } 
            }
            
            function editCancel(){
                document.getElementById("btnSave").style.display="none";
                document.getElementById("btnCancel").style.display="none";
                document.getElementById("btnEdit").style.display="inline";
                var x = document.getElementsByClassName("detailInfo");
                var i;
                for (i = 0; i < x.length; i++) {
                  x[i].disabled=true;
                    x[i].classList.remove("start");
                } 
            }
            
            function editEmployeeSubmit(event){
                if(editErr == 0){
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
                                    alert("Changes Saved.");
                                    $( "#empInfo" ).load(window.location.href + " #empInfo" );
                                }
                            });
                    }
                    
                }
                else{
                    event.preventDefault();
                    alert("Check your inputs");
                }
            }
            
            
//           SERVICE RECORD SCRIPTS       
            
            function addRecord(){
                var empno = document.getElementById("empno").innerHTML;
                xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if(xml.readyState==4 && xml.status==200) {
                        document.getElementById("addRecordDisp").innerHTML = xml.responseText;
                    }
                };

                xml.open("GET","modalAddRecord.php?id="+empno,true);
                xml.send();
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
                                $( "#tableEmployeeDiv" ).load(window.location.href + " #tableEmployeeDiv" );

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
//                            alert(xml.responseText);
                            alert("Record sucessfully deleted.");
                            $( "#tableEmployeeDiv" ).load(window.location.href + " #tableEmployeeDiv" );
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
                            $( "#tableEmployeeDiv" ).load(window.location.href + " #tableEmployeeDiv" );

                        }
                    });
                }
            }
        </script>
    </body>
</html>