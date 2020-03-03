<?php
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet"> 
		<title>ARDC</title>
        
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
<!--        SCRIPTSSSSSSSSSS-->
        
        <script>             
            
            $(document).ready(function(){
                var c ="";
                $("#filterEmp").on("change", function(){
                    c = $(this).val();
                    
                    if(c=="Deployed"){
                        var xml = new XMLHttpRequest();
                        xml.onreadystatechange = function() {
                           if (this.readyState == 4 && this.status == 200) {
//                                document.getElementById("employeeTable").innerHTML =  this.responseText;                           document.getElementById("filterForm").reset();
//                                document.getElementById("closeFilter").click(); 
//                               
//                                document.getElementById("filterBmonth").style.display="none";
                               
                               document.getElementById("selects").innerHTML=this.responseText;
                               
                               
                            }
                        };
                        xml.open("get", "filterEmployee.php?action=show" , true);
                        xml.send();
                        return false;
                    }else{
                        document.getElementById("filterBmonth").style.display="inline-block";
                    }
                })
                
                $("#filterDep").on("change", function(){
                     var d = $(this).val();
                    alert("ok");
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
                        }
                    };
                    xml.open("get", "filterEmployee.php?action=Birthmonth & b="+b, true);
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
