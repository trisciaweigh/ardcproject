<?php
include 'connect.php';
$empno = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div id="addRecordDiv">
        <form method="post"  enctype="multipart/form-data" onsubmit="addRecordSubmit(event)" id="addRecForm">
            <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">
            
            <div class="lblInputRec">
                <label>Service Date</label>
            </div> 
             <div class="addRecInput">
                 <input type="date" name="serdate" id="serdate" class="RecInput" autocomplete="off" >
            </div> 
            
            <div class="lblInputRec">
                <label>Position</label>
            </div> 
             <div  class="addRecInput">
                 <input type="text" name="position" id="position" class="RecInput" autocomplete="off" >
            </div> 
            
            <div class="lblInputRec">
                <label>Information</label>
            </div> 
             <div  class="addRecInput">
                 <textarea id="info" name="info" cols="35" rows="5"  autocomplete="off" ></textarea>
            </div> 
            <br>
            <input type="submit" value="Submit" class="submitAdd">
        </form>
    </div>
    </body></html>