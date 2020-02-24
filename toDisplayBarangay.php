<?php
  include 'connect.php';

  $selectedProvCode = $_POST["p"];
  $selectedCm = $_POST["cm"];
  $citymunCode = "";
  $x = 0;
  $brgyDesc ="";

  $select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectedProvCode'");
  while($row = mysqli_fetch_array($select))  
  {       
    if ($x == $selectedCm){
      $citymunCode = $row["citymunCode"];
      // echo $citymunCode;
    }

    $x++;
  }

  $select2 = mysqli_query($con,"SELECT * FROM `refbrgy` WHERE `citymunCode` = '$citymunCode' ");
  while($row2 = mysqli_fetch_array($select2))  
  {       
    $brgyDesc = $brgyDesc . $row2["brgyDesc"] . ',';
  }
  echo $brgyDesc;
  
?>