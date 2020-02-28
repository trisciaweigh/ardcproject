<?php
include 'connect.php';
$empno = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form method="post"  enctype="multipart/form-data" onsubmit="addRecordSubmit(event)" id="addRecForm">
        <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">

        <div class="form-group">
            <label for="serdate" class="col-form-label">Service Date</label>
            <input type="date" name="serdate" id="serdate" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="position" class="col-form-label">Position</label>
            <input type="text" name="position" id="position" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="deployed" class="col-form-label">Deployed</label>
            <input type="text" name="deployed" id="deployed" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="basic" class="col-form-label">Basic</label>
            <input type="text" name="basic" id="basic" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="rate" class="col-form-label">Rate</label>
            <input type="text" name="rate" id="rate" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="allowance" class="col-form-label">Allowance</label>
            <input type="text" name="allowance" id="allowance" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="gross" class="col-form-label">Gross</label>
            <input type="text" name="gross" id="gross" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="info" class="col-form-label">Information</label>
            <textarea class="form-control" id="info" name="info"></textarea>
        </div>
        <div class="form-group">
            <label for="yrsOfService" class="col-form-label">Years of Service</label>
            <input type="number" min="0" name="yrsOfService" id="yrsOfService" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="submitAdd">
        </div>
    </form>
    </body>
</html>