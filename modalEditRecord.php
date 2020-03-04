<?php
include 'connect.php';
$serrecno = $_GET["id"];

$select = mysqli_query($con,"SELECT * FROM `servicerecord` where `serrec_no` = '$serrecno' ");
while($row = mysqli_fetch_array($select))  
{
    $serdate = $row["serrec_date"];
    $position = $row["serrec_position"];
    $info = $row["serrec_info"];
    $yrsOfService = $row["serrec_yrsOfService"];
    $deployed = $row["serrec_deployed"];
    $basic= $row["serrec_basic"];
    $rate = $row["serrec_rate"];
    $allowance = $row["serrec_allowance"];
    $gross = $row["serrec_gross"];
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <form method="post"  enctype="multipart/form-data" onsubmit="editRecordSubmit(event)" id="editRecForm">
            <input type="text" value="<?php echo $serrecno?>" name="serrecno" style="display:none;">
            <div class="form-group">
            <label for="serdateEdit" class="col-form-label">Service Date</label>
            <input type="date" name="serdateEdit" id="serdateEdit" class="form-control" autocomplete="off" value="<?php echo $serdate; ?>"  placeholder="<?php echo $serdate; ?>">
        </div>
        <div class="form-group">
            <label for="positionEdit" class="col-form-label">Position</label>
            <input type="text" name="positionEdit" id="positionEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $position; ?>" value="<?php echo $position; ?>">
        </div>
        <div class="form-group">
            <label for="deployedEdit" class="col-form-label">Deployed</label>
            <input type="text" name="deployedEdit" id="deployedEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $deployed; ?>" value="<?php echo $deployed; ?>">
        </div>
        <div class="form-group">
            <label for="basicEdit" class="col-form-label">Basic</label>
            <input type="text" name="basicEdit" id="basicEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $basic; ?>" value="<?php echo $basic; ?>">
        </div>
        <div class="form-group">
            <label for="rateEdit" class="col-form-label">Rate</label>
            <input type="text" name="rateEdit" id="rateEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $rate; ?>" value="<?php echo $rate; ?>">
        </div>
        <div class="form-group">
            <label for="allowanceEdit" class="col-form-label">Allowance</label>
            <input type="text" name="allowanceEdit" id="allowanceEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $allowance; ?>" value="<?php echo $allowance; ?>">
        </div>
        <div class="form-group">
            <label for="grossEdit" class="col-form-label">Gross</label>
            <input type="text" name="grossEdit" id="grossEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $gross; ?>" value="<?php echo $gross; ?>">
        </div>
        <div class="form-group">
            <label for="infoEdit" class="col-form-label">Information</label>
            <textarea class="form-control" id="infoEdit" name="infoEdit" placeholder="<?php echo $info;?>"><?php echo $info;?></textarea>
        </div>
        <div class="form-group">
            <label for="yrsOfServiceEdit" class="col-form-label">Years of Service</label>
            <input type="number" min="0" name="yrsOfServiceEdit" id="yrsOfServiceEdit" class="form-control" autocomplete="off"  placeholder="<?php echo $yrsOfService; ?>" value="<?php echo $yrsOfService;?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Edit" class="submitAdd">
            </div>
        </form>
    </body></html>