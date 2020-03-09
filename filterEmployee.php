<?php
  include 'connect.php';
session_start();

$action = $_GET["action"];

if($action=="bmonth"){
    $b = $_GET["b"];
    $none=0;
    
    echo'        <table id="employeeTable" class="table table-striped table-bordered table-sm"> 
                    <thead>  
                    <tr>    
                    <th>EMPLOYEE ID NO</th> 
                    <th>EMPLOYEE NAME</th> 
                    <th>BIRTH MONTH</th>
                    <th>ACTION</th>
                    </tr>  
                    </thead>';
                        $empno="";
                        $select = "SELECT *  FROM `employeeInfo` order by `emp_lname`";
                        $result = mysqli_query($con,$select);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array($result))  
                            {  

                                $empno = $row["emp_no"];
                                
                                $date = $row["emp_bday"];
                                $d = date_parse_from_format("Y-m-d", $date);
                                
                                if($b==getMonthName($d["month"])){
                                    echo '<tr>';
                                    echo '<td>'.$row["emp_id"].'</td>';
                                    echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
                                    echo '<td>'.$date.'</td>';
                                    echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
                                    echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';

                                    echo '</tr>';
                                    $none++;
                                }
                            
                            }

                        }
    
    if($none==0){
        echo '<tr><td style="text-align: center" colspan="4">No celebrant for the month of '.$b.'</td></tr>';
    }
    echo '            </table>';
}
else if($action=="pos"){
    $p = $_GET["p"];
    echo'<table id="employeeTable" class="table table-striped table-bordered table-sm"> 
            <thead>  
            <tr>    
            <th>EMPLOYEE ID NO</th> 
            <th>EMPLOYEE NAME</th> 
            <th>POSITION</th>
            <th>ACTION</th>
            </tr>  
            </thead>';
                $empno="";
                $select = "SELECT *  FROM `employeeInfo` order by `emp_lname`";
                $result = mysqli_query($con,$select);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_array($result))  
                    {  

                        $empno = $row["emp_no"];
                        $select2 = "SELECT *  FROM `servicerecord` where `emp_no`='$empno' and `serrec_position` like '%$p%'";
                        $result2 = mysqli_query($con,$select2);
                        if(mysqli_num_rows($result2)>0)
                        {
                            while($row2 = mysqli_fetch_array($result2))  
                            {  
                                echo '<tr>';
                                echo '<td>'.$row["emp_id"].'</td>';
                                echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
                                echo '<td>'.$row2["serrec_position"].'</td>';
                                echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
                                echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';

                                echo '</tr>';
                            }
                        }


                    }

                }else{
                    echo '<tr><td style="text-align: center" colspan="4">No results found</td></tr>';
                }

echo '            </table>';
}
else{
    $d = $_GET["d"];
    echo'<table id="employeeTable" class="table table-striped table-bordered table-sm"> 
            <thead>  
            <tr>    
            <th>EMPLOYEE ID NO</th> 
            <th>EMPLOYEE NAME</th> 
            <th>DEPLOYED</th>
            <th>ACTION</th>
            </tr>  
            </thead>';
                $empno="";
                $select = "SELECT *  FROM `employeeInfo` order by `emp_lname`";
                $result = mysqli_query($con,$select);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_array($result))  
                    {  

                        $empno = $row["emp_no"];
                        $select2 = "SELECT *  FROM `servicerecord` where `emp_no`='$empno' and `serrec_deployed` ='$d'";
                        $result2 = mysqli_query($con,$select2);
                        if(mysqli_num_rows($result2)>0)
                        {
                            while($row2 = mysqli_fetch_array($result2))  
                            {  
                                echo '<tr>';
                                echo '<td>'.$row["emp_id"].'</td>';
                                echo '<td>'. ucwords($row["emp_fname"]) . ' ' . ucwords($row["emp_lname"]).'</td>';
                                echo '<td>'.$row2["serrec_deployed"].'</td>';
                                echo '<td><a href="employeeDetails.php?id='.$empno.'"><button id="viewEmpBtn">View</button></a>';
                                echo '<button type="button" id="delEmpBtn" onclick="deleteEmployee(\''.$row["emp_no"].'\')" >Delete</button></td>';

                                echo '</tr>';
                            }
                        }


                    }

                }else{
                    echo '<tr><td style="text-align: center" colspan="4">No results found</td></tr>';
                }

echo '            </table>';
}


function getMonthName($m){
    $month ="";
    if ($m=="1"){
        $month ="January";
    }
    else if ($m=="2"){
        $month ="February";
    }
    else if ($m=="3"){
        $month ="March";
    }
    else if ($m=="4"){
        $month ="April";
    }
    else if ($m=="5"){
        $month ="May";
    }
    else if ($m=="6"){
        $month ="June";
    }
    else if ($m=="7"){
        $month ="July";
    }
    else if ($m=="8"){
        $month ="August";
    }
    else if ($m=="9"){
        $month ="September";
    }
    else if ($m=="10"){
        $month ="October";
    }
    else if ($m=="11"){
        $month ="November";
    }
    else if ($m=="12"){
        $month ="December";
    }
    return $month;
}
?>

