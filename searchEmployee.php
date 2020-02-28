<?php
  include 'connect.php';
session_start();

$s = $_GET["s"];
//    echo'<div id = "tableEmployeeDiv">     
//                <a href="addEmployeeDisplay.php"><button id = "addEmployeeButton" type="button">Add Employee</button></a>
//                <form id="searchForm" method="post" enctype="multipart/form-data">
//                       <input id="searchField" name="searchField" class="searchProduct" type="search" placeholder="Search employee..." autocomplete="on">
//                </form>
echo'        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
    <thead>  
    <tr>    
    <th class="sorting">EMPLOYEE NAME</th> 
    <th>ACTION</th>
    </tr>  
    </thead>';
$empno="";
$select = "SELECT *  FROM `employeeInfo` WHERE `emp_fname` like '%$s%' or `emp_lname` like '%$s%' ";
$result = mysqli_query($con,$select);
if(mysqli_num_rows($result)>0)
{
    


    while($row = mysqli_fetch_array($result))  
    {  

        $empno = $row["emp_no"];
        echo '<tr>';
        echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
        echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
        echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';

        echo '</tr>';
    }

}else{
    echo '<tr><td style="text-align: center" colspan="2">No results found</td></tr>';
}

echo '            </table>';
?>

