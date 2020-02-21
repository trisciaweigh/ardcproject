<?php
include 'connect.php';
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
		<title>ARDC Add Employee</title>
</head>
<body>
    <div id="headerCompanyName">
        <img src="logo.jpg" id="logo"/>
    </div>
    <div id="addEmployeeDiv">
        <h2>ADD EMPLOYEE</h2>
        
        <form method="post"  enctype="multipart/form-data" onsubmit="addEmployeeSubmit(event)" id="addEmpForm">
            
            <div class="lblInputEmp">
                <label>Employee No.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="empno" id="empno" class="addEmpClass" autocomplete="off" onchange="checkEmpNo(this.value)">
                 <span class="error" id="empError">Employee no. already exist!</span>
            </div> 
            
            <div class="lblInputEmp">
                <label>First name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="fname" id="fnameAdd" class="addEmpClass" placeholder="" autocomplete="off" >
            </div>             
            
            <div class="lblInputEmp">
                <label>Middle name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mname" id="mname" class="addEmpClass" placeholder="" autocomplete="off" >
            </div> 
            
            <div class="lblInputEmp">
                <label>Last name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="lname" id="lname" class="addEmpClass" placeholder="" autocomplete="off" >
            </div>
            
            <div class="lblInputEmp">
                <label>Suffix</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="suffix" id="suffix" class="addEmpClass" placeholder="" autocomplete="off" >
            </div> 
            
            <div class="lblInputEmp">
                <label>Birthday</label>
            </div> 
             <div class="addEmpInput">
                 <input type="date" name="bdate" id="bdate" class="addEmpClass" autocomplete="off" >
            </div> 
            <br>
            <input type="submit" value="Submit" class="submitAdd">
        </form>
        
    </div>
    
    <script>
        
            function checkEmpNo(no){
                var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function() {
                        if (xml.readyState == 4 && xml.status == 200) {
                            if(this.responseText=="existing"){
                                document.getElementById("empno").style.borderBottom = "2px solid red";
                                document.getElementById("empError").style.display = "inline-block";
                            }else{                                
                                document.getElementById("empno").style.borderBottom = "2px solid dimgray";
                                document.getElementById("empError").style.display = "none";
                            }
                        }
                    };
                    xml.open("get","toValidateEmployeeNo.php?i=" + no, true);
                    xml.send();
                    return false;
            }
     
    </script>
    </body>
</html>