<?php
  include 'connect.php';
session_start();

    echo'<div id = "tableEmployeeDiv">     
                <a href="addEmployeeDisplay.php"><button id = "addEmployeeButton" type="button">Add Employee</button></a>
                       <i class="fas fa-search"></i><input id="searchField" name="searchField" class="searchProduct" type="search" placeholder="Search employee name..." autocomplete="on" onkeyup="searchVal(this.value)">
                       <button type="button" class="filt" data-toggle="modal" data-target="#filterModal">Filter By...</button>
                       <button type="button" class="filt" onclick="tableReset()" >RESET</button>
                <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                    <thead>  
                          <tr>    
                              <th>EMPLOYEE ID NO</th> 
                              <th>EMPLOYEE NAME</th> 
                              <th>ACTION</th>
                          </tr>  
                    </thead>';
                    
                        $empno="";
                        $select = mysqli_query($con,"SELECT * FROM `employeeinfo` order by `emp_lname`");
                        while($row = mysqli_fetch_array($select))  
                        {  
                            
                            $empno = $row["emp_no"];
                            echo '<tr>';
                            echo '<td>'.$row["emp_id"].'</td>';
                            echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
                            echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
                            echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';
                            
                            echo '</tr>';
                        }
                    
    echo '            </table>  
            </div>  ';
?>

