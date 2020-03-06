<?php
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />

        <link rel="stylesheet" href="stylesheets/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="stylesheets/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="stylesheets/jquery/3.4.1/jquery.min.js"></script>
        <script src="stylesheets/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet"> 
		<title>HUMAN RESOURCE DEPARTMENT</title>
        
         <script type="text/javascript">
             function employeeTableDisplay(){
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bodyDetailsDiv").innerHTML = this.responseText;
                    }
                };
                xml.open("get", "employeeTable.php?", true);
                xml.send();
                return false;
             }
        </script>
        <style>
        .modal-header {
            display: block;
        }
            
            table{
                font-size: 14px
            }
        </style>
	</head>
	<body onload="employeeTableDisplay()">
		<div id="headerCompanyName">
            <img src="logo.jpg" id="logo"/>
		</div>          
                                  
        <div id="bodyDetailsDiv" class="container">
            
        </div>
        
        <div class="modal fade" id="filterModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeFilter" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">FILTER</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <label>Filter By:</label>
                            </div>
                            <div class="col-8">
                                <form method="post"  enctype="multipart/form-data" onsubmit="#" id="filterForm">
                                    <select id="filterEmp" name="filterEmp" class="custom-select dark-grey-text">
                                        <option selected disabled>--Select--</option>
                                        <option>Birth month</option>
                                        <option>Deployed</option>
                                        <option>Position</option>
                                    </select>
                                </form>
                            </div>
                            
                            <div class="col-12" id="selects">                                    
                                <select id="filterBmonth" name="filterBmonth" class="custom-select dark-grey-text" style="display:none">
                                    <option selected disabled>--Select Month--</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                
                                <select id="filterDep" name="filterDep" class="custom-select dark-grey-text" style="display:none">
                                    <option selected disabled>--Select--</option>
                                    <?php
    
                                    $select = "SELECT distinct `serrec_deployed`  FROM `servicerecord` where not `serrec_deployed`=''  order by `serrec_position`";
                                    $result = mysqli_query($con,$select);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                            echo '<option>'.$row['serrec_deployed'].'</option>';
                                        }
                                    }
                                    
                                    ?>
                                </select>
                                
                                <select id="filterPos" name="filterPos" class="custom-select dark-grey-text" style="display:none">
                                    <option selected disabled>--Select Position--</option>
                                    <?php
                                    $pos2=[];
                                    $select = "SELECT distinct `serrec_position`  FROM `servicerecord` order by `serrec_position`";
                                    $result = mysqli_query($con,$select);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                            $pos = $row['serrec_position'];
                                            
                                            $posArr = explode ("/", $pos); 
                                            if (count($posArr)==1){
                                                array_push($pos2,$posArr[0]);
                                                echo '<option>'.$posArr[0].'</option>';
                                            }else{
                                                for($x=0; $x<count($posArr); $x++){
                                                    array_push($pos2,$posArr[$x]);
                                                    echo '<option>'.$posArr[$x].'</option>';
                                                }
                                            }
                                        }
                                    }
                                    echo "<option>".print_r($pos2)."</option>";
                                    ?>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="socials">
            <footer class="footer">
                © 2020 Copyright: Developer 
                <a href="https://www.facebook.com/triscia.ayescia215"> Triscia Weigh</a>
            </footer>
        </div>
        
<!--        SCRIPTSSSSSSSSSS-->
        <script>             
            
            $(document).ready(function(){
                var c ="";
                $("#filterEmp").on("change", function(){
                    c = $(this).val();
                    
                    if(c=="Deployed"){                        
                        document.getElementById("filterBmonth").style.display="none";
                        document.getElementById("filterPos").style.display="none";
                        document.getElementById("filterDep").style.display="inline-block";
                    }else if(c=="Position"){
                        document.getElementById("filterDep").style.display="none";
                        document.getElementById("filterBmonth").style.display="none";
                        document.getElementById("filterPos").style.display="inline-block";
                    }else{
                        document.getElementById("filterDep").style.display="none";
                        document.getElementById("filterPos").style.display="none";
                        document.getElementById("filterBmonth").style.display="inline-block";
                    }
                })
                
                $("#filterBmonth").on("change", function(){
                    b = $(this).val();
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("employeeTable").innerHTML =  this.responseText;       
                            document.getElementById("filterForm").reset();
                            document.getElementById("closeFilter").click();                            
                            document.getElementById("filterBmonth").style.display="none";
                            document.getElementById("filterBmonth").reset();
                        }
                    };
                    xml.open("get", "filterEmployee.php?action=bmonth&b="+b, true);
                    xml.send();
                    return false;
                })
                
                $("#filterDep").on("change", function(){
                    d = $(this).val();
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("employeeTable").innerHTML =  this.responseText;       
                            document.getElementById("filterForm").reset();
                            document.getElementById("closeFilter").click();                            
                            document.getElementById("filterDep").style.display="none";
                            document.getElementById("filterDep").reset();
                        }
                    };
                    xml.open("get", "filterEmployee.php?action=dep&d="+d, true);
                    xml.send();
                    return false;
                })
                
                $("#filterPos").on("change", function(){
                    p = $(this).val();
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("employeeTable").innerHTML =  this.responseText;       
                            document.getElementById("filterForm").reset();
                            document.getElementById("closeFilter").click();                            
                            document.getElementById("filterPos").style.display="none";
                            document.getElementById("filterPos").reset();
                        }
                    };
                    xml.open("get", "filterEmployee.php?action=pos&p="+p, true);
                    xml.send();
                    return false;
                })
            })
            
            function tableReset(){
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bodyDetailsDiv").innerHTML = this.responseText;
                        document.getElementById("filterForm").reset();
                        document.getElementById("filterBmonth").style.display="none";
                        document.getElementById("filterDep").style.display="none";
                        document.getElementById("filterPos").style.display="none";
                        document.getElementById("filterBmonth").reset();
                        document.getElementById("filterDep").reset();
                        document.getElementById("filterPos").reset();
                    }
                };
                xml.open("get", "employeeTable.php?", true);
                xml.send();
                return false;
            }
                            
            function searchVal(s){
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("employeeTable").innerHTML =  this.responseText;
                    }
                };
                xml.open("get", "searchEmployee.php?s="+s, true);
                xml.send();
                return false;
            }
            function deleteEmployee(id) {
                 if (confirm("Do you want to delete this employee?")) {
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                        if (xml.readyState == 4 && xml.status == 200) {
                            if (this.responseText == 'deleted'){
                                alert("Employee sucessfully deleted.")
                            }
                            employeeTableDisplay();
                        }
                    };
                    xml.open("get", "toRemoveEmployee.php?i=" + id, true);
                    xml.send();
                    return false;
                  }

            }           
           
        </script>
	</body>
</html>
