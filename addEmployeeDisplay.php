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
            
            <div class="lblInputEmp addEmp">
                <label>Employee No.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="empno" id="empno" class="addEmpClass addEmpIndent" autocomplete="off">
                 <span class="error" id="empError">Employee no. already exist!</span>
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label>First name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="fname" id="fnameAdd" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div>             
            
            <div class="lblInputEmp addEmp">
                <label>Middle name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mname" id="mname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label>Last name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="lname" id="lname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div>
            
            <div class="lblInputEmp addEmp">
                <label>Suffix</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="suffix" id="suffix" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label>Birthday</label>
            </div> 
             <div class="addEmpInput">
                 <input type="date" name="bdate" id="bdate" class="addEmpClass addEmpIndent" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Sex</label>
            </div> 
             <div class="addEmpInput">
                <div class="col-md-3 custom-control custom-radio male">
                    <input type="radio" class="custom-control-input" id="sexMaleRadioBtn" name="sexReg" value="Male">
                    <label class="custom-control-label dark-grey-text" for="sexMaleRadioBtn">Male</label>
                </div>
                <div class="col-md-3 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="sexFemaleRadioBtn" name="sexReg" value="Female">
                    <label class="custom-control-label dark-grey-text" for="sexFemaleRadioBtn">Female</label>
                </div>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Civil Status</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="civStatus" id="civStatus" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Nationality</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="nationality" id="nationality" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Religion</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="religion" id="religion" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Place of Birth</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="placeOfBirth" id="placeOfBirth" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Home Address</label>
            </div> 
             <div class="addEmpInput">
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Permanent Address</label>
            </div> 
            <div class="addEmpInput">
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Mobile number</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mobNo" id="mobNo" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Telephone number</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="telNo" id="telNo" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Email Address</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="email" id="email" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Educational Background (Highest Attainment)</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="educ" id="educ" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Father's Name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="father" id="father" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Mother's Name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mother" id="mother" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Spouse Name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="spouseName" id="spouseName" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Spouse Birthday</label>
            </div> 
             <div class="addEmpInput">
                 <input type="date" name="spouseBday" id="spouseBday" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Height</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="height" id="height" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Weight</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="weight" id="weight" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Blood Type</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="blood" id="blood" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>SSS no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="sss" id="sss" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Philhealth no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="philhealth" id="philhealth" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>HDMF no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="hdmf" id="hdmf" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Tin no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="tin" id="tin" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Atm no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="atm" id="atm" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Deployed</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="deployed" id="deployed" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Basic</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="basic" id="basic" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Rate</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="rate" id="rate" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Allowance</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="allowance" id="allowance" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Gross</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="gross" id="gross" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <br>
            <input type="submit" value="Submit" class="submitAdd">
        </form>
        
    </div>

    <script>        
            $(document).ready(function(){
                var validEmail = false;




                // $("input").focus(function(){
                //     $(this).css("border-bottom", "3px solid #0762f5");
                // });
                // $("input").blur(function(){
                //     $(this).css("border-bottom", "2px solid dimgray");
                // });

                $("#empno").on("change",function(){
                    var e = $(this).val();
                    
                    $.post("toValidateEmployeeNo.php", {   
                        e:e,
                    },
                    function (data) {
                        if(data === "e"){
                            
                            $("#empno").css("border-bottom", "2px solid red");
                            
                            document.getElementById("empError").style.display = "inline-block";
                            validEmail = false;
                        }
                        else{
                            $("#empno").css("border-bottom", "3px solid #00ff00");
                            validEmail = true;
                        }
                                        
                    });

                })
            });
     
    </script>
    
    
    </body>
</html>