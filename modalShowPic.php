<?php
include 'connect.php';

$img=$_GET['p'];

echo '<img src="'.$img.'" style=" width:500px">';

mysqli_close($con);
?>