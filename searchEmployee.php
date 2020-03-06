<?php
  include 'connect.php';
session_start();

$s = $_GET["s"];
echo'        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
    <thead>  
    <tr>    
    <th>EMPLOYEE ID NO</th> 
  <th>EMPLOYEE NAME</th> 
    <th>ACTION</th>
    </tr>  
    </thead>';
$empno="";
$select = "SELECT *  FROM `employeeInfo` WHERE `emp_fname` like '%$s%' or `emp_lname` like '%$s%' order by `emp_lname`";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    


    while($row = mysqli_fetch_array($result))  
    {  

        $empno = $row["emp_no"];
        echo '<tr>';
        echo '<td>'.$row["emp_id"].'</td>';
        echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
        echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
        echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';

        echo '</tr>';
    }

}else{
    echo '<tr><td style="text-align: center" colspan="3">No results found</td></tr>';
}

echo '            </table>';
?>

