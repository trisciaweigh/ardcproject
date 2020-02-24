<?php
include 'connect.php';
$serrecno = $_GET["id"];

$select = mysqli_query($con,"SELECT * FROM `servicerecord` where `serrec_no` = '$serrecno' ");
while($row = mysqli_fetch_array($select))  
{
    $serdate = $row["serrec_date"];
    $position = $row["serrec_position"];
    $info = $row["serrec_info"];
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div id="editRecordDiv">
        <form method="post"  enctype="multipart/form-data" onsubmit="editRecordSubmit(event)" id="editRecForm">
            <input type="text" value="<?php echo $serrecno?>" name="serrecno" style="display:none;">
            <div class="lblInputRec">
                <label>Service Date</label>
            </div> 
            <div  class="addRecInput">
                <input type="date" id="serdateEdit" name="serdateEdit" class="RecInput" placeholder="<?php echo $serdate?>" value="<?php echo $serdate?>"  autocomplete="off" ><br>
            </div>
            
             <div class="lblInputRec">
                <label>Position</label>
            </div>
            <div  class="addRecInput">
                <input type="text" id="positionEdit" name="positionEdit" class="RecInput" placeholder="<?php echo $position?>"  autocomplete="off" ><br>
            </div>
            
            <div class="lblInputRec">
                <label>Information</label>
            </div>
                <div  class="addRecInput"> <textarea id="infoEdit" name="infoEdit" cols="35" rows="5" placeholder="<?php echo $info?>"  autocomplete="off" ></textarea>
            </div><br>
            
            <input type="submit" value="Edit" class="submitAdd">
        </form>
    </div>
    </body></html>