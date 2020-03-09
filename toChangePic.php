<?php

include 'connect.php';

$empno = $_POST['imageId'];
$newImage = $_FILES['imageEdit']['name'];
$err = 0;

if($newImage!=""){
    $extensions = array('jpg','jpeg','png','gif','JPG');
    $file_ext = explode('.',$_FILES['imageEdit']['name']);
     $name = $file_ext[0];

    $file_ext = end($file_ext);
    if (!in_array($file_ext, $extensions)){
        echo 'Invalid file extension';
        $err++;
    }
    else{
        $img_dir = "employeePictures/".$_FILES['imageEdit']['name'];
        move_uploaded_file($_FILES['imageEdit']['tmp_name'],$img_dir);        
    }
}
//echo $err;
if($err==0){
//    echo "pasok";
    $upd = "UPDATE `employeeinfo` SET `emp_picture` = '$img_dir' WHERE `emp_no` = '$empno'";

    if (mysqli_query($con,$upd))
    {
        echo'Changes Saved!';
    }
    else{
        echo'Error';
    }
}



mysqli_close($con);
?>