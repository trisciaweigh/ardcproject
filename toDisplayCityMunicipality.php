<?php
  include 'connect.php';

  $selectedProvCode = $_POST["p"];



  $citymunDesc ="";
  $select = mysqli_query($con,"SELECT * FROM `refcitymun` where `provCode` = '$selectedProvCode' ");
  while($row = mysqli_fetch_array($select))  
  {       
      // echo "<option>".$row["citymunDesc"]."</option>";
      $citymunDesc = $citymunDesc . mysqli_real_escape_string($con,$row["citymunDesc"]) . ',';
  }
  echo $citymunDesc;
?>