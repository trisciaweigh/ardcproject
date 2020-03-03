<?php
include 'connect.php';
$empno = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form method="post"  enctype="multipart/form-data" onsubmit="addMemoSubmit(event)" id="addMemoForm">
        <input type="text" value="<?php echo $empno?>" name="id" style="display:none;">

        <div class="form-group">
            <label for="memodate" class="col-form-label"><i class="fas fa-asterisk" id="faAsterisk"></i> Memo Date</label>
            <input type="date" name="memodate" id="memodate" class="form-control" autocomplete="off" >
        </div>        
        <div class="form-group">
            <label for="memo" class="col-form-label"><i class="fas fa-asterisk" id="faAsterisk"></i> Memo</label>
            <textarea class="form-control" id="memo" name="memo"></textarea>
        </div>
        <div class="form-group">
            <label for="memoFrom" class="col-form-label">Memo from</label>
            <input type="text" name="memoFrom" id="memoFrom" class="form-control" autocomplete="off" >
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="submitAdd">
        </div>
    </form>
    </body>
</html>