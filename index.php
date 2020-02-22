<?php
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet"> 
		<title>ardc</title>
        
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
//                return false;
             }
        </script>
	</head>
	<body onload="employeeTableDisplay()">
		<div id="headerCompanyName">
            <img src="logo.jpg" id="logo"/>
		</div>
        <div id="bodyDetailsDiv" class="container">
            
        </div>
        
        
        
<!--        SCRIPTSSSSSSSSSS-->
        
        <script>            
////            
//            function checkEmpNo(no){
//                
//            }
//     
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
            
//            
//            $(document).ready(function(){
//                ("#empno").on("change",function(){
//                    alert (this.value);
////                    var i = this.value;
////                    var xml = new XMLHttpRequest();
////                    xml.onreadystatechange = function() {
////                        if (xml.readyState == 4 && xml.status == 200) {
////                            if(this.responseText=="existing"){
////                                document.getElementById("empno").style.borderBottom = "2px solid red";
////
////                            }
////                        }
////                    };
////                    xml.open("get","toValidateEmployeeNo.php?i=" + no, true);
////                    xml.send();
////                    return false;
//                })
//              
//            });    
//            
//            function addEmployeeSubmit(event){
//                
//                if (confirm("Are you sure you want to save changes?")) {
//                    event.preventDefault();
//                    var form = document.forms.addEmpForm;
//                    var dataInputted = new FormData(form);
//
//                         $.ajax({
//                            url:"toAddEmployee.php",
//                            type:"POST",
//                            enctype: "multipart/form-data",
//                            data: dataInputted,
//                            contentType: false,
//                            cache: false,
//                            processData: false,
//                            success:function(data)
//                            {
//                                alert("Employee added into the database.")
//                                document.getElementById("closeAdd").click();
//                                employeeTableDisplay();
//                            }
//                        });
//                }
//                
//            }
            
            
           
        </script>
	</body>
</html>
