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
    <script type="text/javascript" src="fontawesome-free-5.11.2-web/js/all.min.js"></script>
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
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Employee No.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="empno" id="empno" class="addEmpClass addEmpIndent" autocomplete="off" required> 
                 <span class="errorAddEmp" id="empError">Employee no. already exist!</span>
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> First name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="fname" id="fname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" required>
                 <span class="errorAddEmp" id="fnameError">Letters and white spaces only are allowed.</span>
            </div>             
            
            <div class="lblInputEmp addEmp">
                <label>Middle name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mname" id="mname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
                 <span class="errorAddEmp" id="mnameError">Letters and white spaces only are allowed.</span>
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Last name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="lname" id="lname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" required>
                 <span class="errorAddEmp" id="lnameError">Letters and white spaces only are allowed.</span>
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
                    <input type="radio" class="custom-control-input" id="sexMaleRadioBtn" name="sex" value="Male">
                    <label class="custom-control-label dark-grey-text" for="sexMaleRadioBtn">Male</label>
                </div>
                <div class="col-md-3 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="sexFemaleRadioBtn" name="sex" value="Female">
                    <label class="custom-control-label dark-grey-text" for="sexFemaleRadioBtn">Female</label>
                </div>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Civil Status</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="civStatus" id="civStatus" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
                 <span class="errorAddEmp" id="civStatusError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Nationality</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="nationality" id="nationality" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
                 <span class="errorAddEmp" id="nationalityError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Religion</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="religion" id="religion" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
                 <span class="errorAddEmp" id="religionError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Place of Birth</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="placeOfBirth" id="placeOfBirth" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
                 <span class="errorAddEmp" id="placeOfBirthError">Letters and white spaces only are allowed.</span>
            </div> 
            <hr id="line1">
            <div class="lblInputEmp addEmp">
                <label>Home Address</label>
            </div> 
             <div class="addEmpInput">
                <select id="selectProvHome" name="selectProvHome" class="custom-select dark-grey-text">
                    <option disabled selected>Select Province </option>
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
                <select id="selectCMHome" name="selectCMHome" class="custom-select dark-grey-text">
                    <option disabled selected>Select City/Municipality </option>
                </select>
                <select id="selectBrgyHome" name="selectBrgyHome" class="custom-select dark-grey-text">
                    <option disabled selected>Select Barangay </option>
                </select>
                <input type="text" name="detailedAddHome" id="detailedAddHome" class="addEmpClass addEmpIndent" placeholder="Detailed Address" autocomplete="off" >
            </div> 
            <hr id="line1">
            <div class="lblInputEmp addEmp">
                <label>Permanent Address</label>
            </div> 
            <div class="addEmpInput">
                <select id="selectProvPerm" name="selectProvPerm" class="custom-select dark-grey-text">
                    <option disabled selected>Select Province </option>
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
                <select id="selectCMPerm" name="selectCMPerm" class="custom-select dark-grey-text">
                    <option disabled selected>Select City/Municipality </option>
                </select>
                <select id="selectBrgyPerm" name="selectBrgyPerm" class="custom-select dark-grey-text">
                    <option disabled selected>Select Barangay </option>
                </select>
                <input type="text" name="detailedAddPerm" id="detailedAddPerm" class="addEmpClass addEmpIndent" placeholder="Detailed Address" autocomplete="off" >
            </div> 
            <hr id="line1">
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
                 <span class="errorAddEmp" id="emailError">Invalid email format!</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Educational Background (Highest Attainment)</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="educ" id="educ" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 
            <hr id="line1">
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
                <label>Child's Name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="childsName" id="childsName" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Child's Birthday</label>
            </div> 
             <div class="addEmpInput">
                 <input type="date" name="childsBday" id="childsBday" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 
            <hr id="line1">


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
            <hr id="line1">
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
<!--
            <hr id="line1">
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
-->

            <br>
            <input type="submit" value="Submit" class="submitAdd">
        </form>
        
    </div>

    <script>        

        function isString(name) {
            var regex = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
            if (!regex.test(name)) {
                return false;
            } else {
                return true;
            }
        }

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
                return false;
            }else{
                return true;
            }
        }

        
        var validEmpNo = false;
        var validFName = false;
        var validMname = false;
        var validLname = false;
        var validcivStatus = false;
        var validNationality = false;
        var validReligion = false;
        var validPlaceOfBirth = false;
        var validemail = false;
        var validSex = false;

        $(document).ready(function(){
            

            var p="";
            $("#selectProvHome").on("change",function(){
                p = $(this).val();     
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
            })

            $("#selectCMHome").on("change",function(){
                var cm = $(this).val(); 
                $.post("toDisplayBarangay.php", {   
                    p:p,
                    cm:cm
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
            })

            var p="";
            $("#selectProvPerm").on("change",function(){
                p = $(this).val();     
                $.post("toDisplayCityMunicipality.php", {   
                    p:p,
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectCMPerm');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectCMPerm').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                        
                });
            })

            $("#selectCMPerm").on("change",function(){
                var cm = $(this).val(); 
                $.post("toDisplayBarangay.php", {   
                    p:p,
                    cm:cm
                },
                function (data) {
                    var dataLength = data.split(",");
                    var select = $('#selectBrgyPerm');
                    if(select.prop) {
                    var options = select.prop('options');
                    }
                    else {
                    var options = select.attr('options');
                    }
                    $('#selectBrgyPerm').children('option:not(:first)').remove();  

                    $.each(dataLength, function(val, text) {
                        options[options.length] = new Option(text, val);
                    });
                    select.val(selectedOption);    
                });
            })





            $("input").focus(function(){
                $(this).css("border-bottom", "3px solid #0762f5");
            });
            $("input").blur(function(){
                $(this).css("border-bottom", "2px solid dimgray");
            });

            $("#empno").on("change",function(){
                var e = $(this).val();                    
                $.post("toValidateEmployeeNo.php", {   
                    e:e,
                },
                function (data) {
                    if(data === "e"){                            
                        $("#empno").css("border-bottom", "2px solid red");                            
                        document.getElementById("empError").style.display = "inline-block";
                        validEmpNo = false;
                    }
                    else{
                        if (e.length >25){
                            $("#empno").css("border-bottom", "2px solid red");                            
                            document.getElementById("empError").style.display = "inline-block";
                            document.getElementById("empError").innerHTML = "Length maximum number is 25."
                            validEmpNo = false;
                        }else{
                            $("#empno").css("border-bottom", "3px solid #0ea300");                                       
                            document.getElementById("empError").style.display = "none";
                            validEmpNo = true;
                        }
                    }                                        
                });
            });

            $("#fname").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#fname").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("fnameError").style.display = "none";
                    validFName = true;
                }else{
                    $("#fname").css("border-bottom", "2px solid red");                            
                    document.getElementById("fnameError").style.display = "inline-block";
                    validFName = false;
                }
            });

            $("#mname").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#mname").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("mnameError").style.display = "none";
                    validMname = true;
                }else{
                    $("#mname").css("border-bottom", "2px solid red");                            
                    document.getElementById("mnameError").style.display = "inline-block";
                    validMname = false;
                }
            });

            $("#lname").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#lname").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("lnameError").style.display = "none";
                    validLname = true;
                }else{
                    $("#lname").css("border-bottom", "2px solid red");                            
                    document.getElementById("lnameError").style.display = "inline-block";
                    validLname = false;
                }
            });

            $("#civStatus").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#civStatus").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("civStatusError").style.display = "none";
                    validcivStatus = true;
                }else{
                    $("#civStatus").css("border-bottom", "2px solid red");                            
                    document.getElementById("civStatusError").style.display = "inline-block";
                    validcivStatus = false;
                }
            });

            $("#nationality").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#nationality").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("nationalityError").style.display = "none";
                    validNationality = true;
                }else{
                    $("#nationality").css("border-bottom", "2px solid red");                            
                    document.getElementById("nationalityError").style.display = "inline-block";
                    validNationality = false;
                }
            });
            
            $("#religion").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#religion").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("religionError").style.display = "none";
                    validReligion = true;
                }else{
                    $("#religion").css("border-bottom", "2px solid red");                            
                    document.getElementById("religionError").style.display = "inline-block";
                    validReligion = false;
                }
            });
            
            $("#placeOfBirth").on("change",function(){
                if(isString($(this).val()) == true){       
                    $("#placeOfBirth").css("border-bottom", "3px solid #0ea300");                                       
                    document.getElementById("placeOfBirthError").style.display = "none";
                    validPlaceOfBirth = true;
                }else{
                    $("#placeOfBirth").css("border-bottom", "2px solid red");                            
                    document.getElementById("placeOfBirthError").style.display = "inline-block";
                    validPlaceOfBirth = false;
                }
            });

            $("#email").on("change",function(){
                if(isEmail($(this).val()) == true){       
                    alert ("valid");
                    // $("#email").css("border-bottom", "3px solid #0ea300");                                       
                    // document.getElementById("emailError").style.display = "none";
                    // validemail = true;
                }else{

                    alert("invalid")
                    // $("#email").css("border-bottom", "2px solid red");                            
                    // document.getElementById("emailError").style.display = "inline-block";
                    // validemail = false;
                }
                // alert ($(this).val());
            });
        });

        function addEmployeeSubmit(event){

            var selSex = document.getElementsByName("sex");
            var checkSex = 0;
            for(i=0;i<selSex.length;i++){
                if(selSex[i].checked){
                    checkSex++;
                    break;
                }
            }

            if(checkSex!=0){
                validSex = true;
            }

            // alert(document.getElementById("selectCMHome").value);
            if (confirm("Are you sure you want to save changes?")) {
                event.preventDefault();
                var form = document.forms.addEmpForm;
                var dataInputted = new FormData(form);

                    $.ajax({
                        url:"toAddEmployee.php",
                        type:"POST",
                        enctype: "multipart/form-data",
                        data: dataInputted,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                           alert("Employee added into the database.")
                           window.location.href="index.php";
                        }
                    });
            }
               
           }
     
    </script>
    
    
    </body>
</html>