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
    
    <style>
        th{
            text-align: center;
            font-size: 16px
        }
        table{
            width: 80%
        }
        
        .fa-check-circle{
            font-size: 18px;
            color: limegreen;
            display: none
        }
    </style>
</head>
<body>
    <div id="headerCompanyName">
        <img src="logo.jpg" id="logo"/>
    </div>
    <a href="index.php" class="btn bckAdd" id="backBtn">Back</a>
    <div id="addEmployeeDiv">
        <h2>ADD EMPLOYEE</h2>
        
        <form method="post"  enctype="multipart/form-data" onsubmit="addEmployeeSubmit(event)" id="addEmpForm">
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Employee No.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="empno" id="empno" class="addEmpClass addEmpIndent" autocomplete="off" > <i class="far fa-check-circle" id="empCheck"></i>
                 <span class="errorAddEmp" id="empError">Employee no. already exist!</span>
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> First name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="fname" id="fname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="fnameCheck"></i>
                 <span class="errorAddEmp" id="fnameError">Letters and white spaces only are allowed.</span>
            </div>             
            
            <div class="lblInputEmp addEmp">
                <label>Middle name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mname" id="mname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="mnameCheck"></i>
                 <span class="errorAddEmp" id="mnameError">Letters and white spaces only are allowed.</span>
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Last name</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="lname" id="lname" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="lnameCheck"></i>
                 <span class="errorAddEmp" id="lnameError">Letters and white spaces only are allowed.</span>
            </div>
            
            <div class="lblInputEmp addEmp">
                <label>Suffix</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="suffix" id="suffix" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 
            
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Birthday</label>
            </div> 
             <div class="addEmpInput">
                 <input type="date" name="bdate" id="bdate" class="addEmpClass addEmpIndent" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Sex</label>
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
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Civil Status</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="civStatus" id="civStatus" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="civStatusCheck"></i>
                 <span class="errorAddEmp" id="civStatusError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Nationality</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="nationality" id="nationality" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="nationalityCheck"></i>
                 <span class="errorAddEmp" id="nationalityError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Religion</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="religion" id="religion" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="religionCheck"></i>
                 <span class="errorAddEmp" id="religionError">Letters and white spaces only are allowed.</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Place of Birth</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="placeOfBirth" id="placeOfBirth" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="placeOfBirthCheck"></i>
                 <span class="errorAddEmp" id="placeOfBirthError">Letters and white spaces only are allowed.</span>
            </div> 
            <hr id="line1">
            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Home Address</label>
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
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Permanent Address</label>
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
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Mobile number</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="mobNo" id="mobNo" class="addEmpClass addEmpIndent" autocomplete="off" placeholder="9XXXXXXXXX"><i class="far fa-check-circle" id="mobNoCheck"></i>
                 <span class="errorAddEmp" id="mobNoError">Invalid number!</span>
            </div> 

            <div class="lblInputEmp addEmp">
                <label>Telephone number</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="telNo" id="telNo" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Email Address</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="email" id="email" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ><i class="far fa-check-circle" id="emailCheck"></i>
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
            <div>
                <table id="childTable">
                    <thead>
                        <tr>
                            <th><label>Child's Name</label></th>
                            <th><label>Child's Birthday</label></th>
                        </tr>
                    </thead>
                    <tbody id="childsbody">
                        <tr>
                            <td><input type="text" name="childsName1" id="childsName1" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" ></td>
                            <td><input type="date" name="childsBday1" id="childsBday1" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="childsName2" id="childsName2" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" ></td>
                            <td><input type="date" name="childsBday2" id="childsBday2" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="childsName3" id="childsName3" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" ></td>
                            <td><input type="date" name="childsBday3" id="childsBday3" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="childsName4" id="childsName4" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" ></td>
                            <td><input type="date" name="childsBday4" id="childsBday4" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="childsName5" id="childsName5" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" ></td>
                            <td><input type="date" name="childsBday5" id="childsBday5" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>
                        </tr>
                    </tbody>
                    
                </table>
                <button type="button" onclick="addChild()">add</button>
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
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> SSS no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="sss" id="sss" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Philhealth no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="philhealth" id="philhealth" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> HDMF no.</label>
            </div> 
             <div class="addEmpInput">
                 <input type="text" name="hdmf" id="hdmf" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" >
            </div> 

            <div class="lblInputEmp addEmp">
                <label><i class="fas fa-asterisk" id="faAsterisk"></i> Tin no.</label>
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
            
            <input type="text" id="childLength" name="childLength" style="display:none">
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

        
        var validEmpNo = false;
        var validFName = false;
        var validMname = true;
        var validLname = false;
        var validcivStatus = false;
        var validNationality = false;
        var validReligion = false;
        var validPlaceOfBirth = false;
        var validemail = false;
        var validSex = false;
        var validnumber = false;
        var validChild = true;

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
                            document.getElementById("empCheck").style.display = "none";
                        validEmpNo = false;
                    }
                    else{
                        if (e.length >25){          
                            document.getElementById("empError").style.display = "inline-block";
                            document.getElementById("empCheck").style.display = "none";
                            document.getElementById("empError").innerHTML = "Length maximum number is 25."
                            validEmpNo = false;
                        }else{                                  
                            document.getElementById("empError").style.display = "none";
                            document.getElementById("empCheck").style.display = "inline-block";
                            validEmpNo = true;
                        }
                    }                                        
                });
            });

            $("#fname").on("change",function(){
                if(isString($(this).val()) == true){                                          
                    document.getElementById("fnameError").style.display = "none";
                    document.getElementById("fnameCheck").style.display = "inline-block";
                    validFName = true;
                }else{                                     
                    document.getElementById("fnameCheck").style.display = "none";
                    document.getElementById("fnameError").style.display = "inline-block";
                    validFName = false;
                }
            });

            $("#mname").on("change",function(){
                if( $(this).val() !=""){
                    if(isString($(this).val()) == true){                                             
                        document.getElementById("mnameError").style.display = "none";
                        document.getElementById("mnameCheck").style.display = "inline-block";
                        validMname = true;
                    }else{                                       
                        document.getElementById("mnameCheck").style.display = "none";
                        document.getElementById("mnameError").style.display = "inline-block";
                        validMname = false;
                    }
                }else
                    {
                        validMname = true;
                    }
            });

            $("#lname").on("change",function(){
                if(isString($(this).val()) == true){                                    
                    document.getElementById("lnameError").style.display = "none";
                    document.getElementById("lnameCheck").style.display = "inline-block";
                    validLname = true;
                }else{                     
                    document.getElementById("lnameError").style.display = "inline-block";
                    document.getElementById("lnameCheck").style.display = "none";
                    validLname = false;
                }
            });

            $("#civStatus").on("change",function(){
                if(isString($(this).val()) == true){                                             
                    document.getElementById("civStatusError").style.display = "none";
                    document.getElementById("civStatusCheck").style.display = "inline-block";  
                    validcivStatus = true;
                }else{                           
                    document.getElementById("civStatusError").style.display = "inline-block";            
                    document.getElementById("civStatusCheck").style.display = "none";
                    validcivStatus = false;
                }
            });

            $("#nationality").on("change",function(){
                if(isString($(this).val()) == true){                                             
                    document.getElementById("nationalityError").style.display = "none";
                    document.getElementById("nationalityCheck").style.display = "inline-block";   
                    validNationality = true;
                }else{                           
                    document.getElementById("nationalityError").style.display = "inline-block";     
                    document.getElementById("nationalityCheck").style.display = "none";
                    validNationality = false;
                }
            });
            
            $("#religion").on("change",function(){
                if(isString($(this).val()) == true){                                             
                    document.getElementById("religionError").style.display = "none";
                    document.getElementById("religionCheck").style.display = "inline-block";
                    validReligion = true;
                }else{                                    
                    document.getElementById("religionCheck").style.display = "none";
                    document.getElementById("religionError").style.display = "inline-block";
                    validReligion = false;
                }
            });
            
            $("#placeOfBirth").on("change",function(){
                if(isString($(this).val()) == true){                                            
                    document.getElementById("placeOfBirthError").style.display = "none";
                    document.getElementById("placeOfBirthCheck").style.display = "inline-block";
                    validPlaceOfBirth = true;
                }else{                              
                    document.getElementById("placeOfBirthCheck").style.display = "none";
                    document.getElementById("placeOfBirthError").style.display = "inline-block";
                    validPlaceOfBirth = false;
                }
            });

            $("#email").on("change",function(){
                if(isEmail($(this).val()) == true){                                           
                     document.getElementById("emailError").style.display = "none";
                     document.getElementById("emailCheck").style.display = "inline-block";
                     validemail = true;
                }else{                                 
                     document.getElementById("emailCheck").style.display = "none";
                     document.getElementById("emailError").style.display = "inline-block";
                     validemail = false;
                }
            });
            
            $("#mobNo").on("change",function(){
                if(isNumber($(this).val()) == true){                                           
                     document.getElementById("mobNoError").style.display = "none";
                    document.getElementById("mobNoCheck").style.display = "inline-block";
                    
                        if(($(this).val().length)==10){        
                             document.getElementById("mobNoError").style.display = "none";
                            document.getElementById("mobNoCheck").style.display = "inline-block";
                            validnumber = true;
                        }else{
                            document.getElementById("mobNoError").style.display = "inline-block";
                            document.getElementById("mobNoCheck").style.display = "none";
                            validnumber = false;
                        }
                     
                }else{                           
                     document.getElementById("mobNoError").style.display = "inline-block";
                    document.getElementById("mobNoCheck").style.display = "none";
                     validnumber = false;
                }
            });
        });

        var a = 5;
        function addChild(){
            a++;
            var table = document.getElementById("childTable");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = '<input type="text" name="childsName'+a+'" id="childsName'+a+'" class="addEmpClass addEmpIndent cname" placeholder="" autocomplete="off" >';
            cell2.innerHTML = '<td><input type="date" name="childsBday'+a+'" id="childsBday'+a+'" class="addEmpClass addEmpIndent" placeholder="" autocomplete="off" ></td>';
        }
        
        function addEmployeeSubmit(event){
            var bday = document.getElementById("bdate").value;
            var sss = document.getElementById("sss").value;
            var philhealth = document.getElementById("philhealth").value;
            var hdmf = document.getElementById("hdmf").value;
            var tin = document.getElementById("tin").value;
            var mname = document.getElementById("mname").value;
            
            var ph = document.getElementById("selectProvHome").selectedIndex;
            var cmh = document.getElementById("selectCMHome").selectedIndex;
            var bh = document.getElementById("selectBrgyHome").selectedIndex;
            var dh = document.getElementById("detailedAddHome").value;
            
            var pp = document.getElementById("selectProvPerm").selectedIndex;
            var cmp = document.getElementById("selectCMPerm").selectedIndex;
            var bp = document.getElementById("selectBrgyPerm").selectedIndex;
            var dp = document.getElementById("detailedAddPerm").value;

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
            
            
            if(validEmpNo==false || validFName==false || validLname==false || bday=="" || validSex==false || validcivStatus==false || validNationality==false  || validReligion==false  || validnumber==false || validemail==false || sss=="" || philhealth=="" || hdmf==""  || tin=="" || ph=="0" || cmh=="0" || bh=="0" || dh=="" || pp=="0" || cmp=="0" || bp=="0" || dp==""){
                alert("Please check all your inputs");                
                event.preventDefault();
            }else{
                if(validMname==false){
                    alert("There is an error");
                     event.preventDefault();
                }else{
                    
                    if(validChild==true){
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
    //                                alert(data);
                                    alert("Employee added into the database.")
                                    window.location.href="index.php";
                                }
                            });
                        }
                    }else{
                        alert("Please check inputs on child's name and birthday");
                        event.preventDefault();
                    }
                    
                }
            }
//   
               
           }
     
    </script>
    
    
    </body>
</html>