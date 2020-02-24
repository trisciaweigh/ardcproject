<?php

include 'connect.php';

$id = $_REQUEST["i"];
$deleted = 0;


$select = "SELECT * FROM employeeinfo";
$result = mysqli_query($con,$select);

if(mysqli_num_rows($result)>0)
{

    while ($row = mysqli_fetch_assoc($result))
    {
        $a = $row["emp_no"];
        
        $select2 = "SELECT * FROM servicerecord";
        $result2 = mysqli_query($con,$select2);

        if(mysqli_num_rows($result2)>0)
        {

            while ($row2 = mysqli_fetch_assoc($result2))
            {                
                if ($row2["emp_no"] == $a){
                   $del2 = "DELETE FROM `servicerecord` WHERE `emp_no` = '". $row2["emp_no"]."'";
                    if (mysqli_query($con,$del2))
                        {
                            $deleted++;
                        }
                    else{
                         echo'Error';
                    }
                }
            }
        }
        
        $select3 = "SELECT * FROM memo";
        $result3 = mysqli_query($con,$select3);

        if(mysqli_num_rows($result3)>0)
        {

            while ($row3 = mysqli_fetch_assoc($result3))
            {                
                if ($row3["emp_no"] == $a){
                   $del3 = "DELETE FROM `memo` WHERE `emp_no` = '". $row3["emp_no"]."'";
                    if (mysqli_query($con,$del3))
                        {
                            $deleted++;
                        }
                    else{
                         echo'Error';
                    }
                }
            }
        }


        if ($id == $a){
           $del = "DELETE FROM `employeeinfo` WHERE `emp_no` = '". $row["emp_no"]."'";

            if (mysqli_query($con,$del))
                {
                    $deleted++;
                }
            else{
                 echo'Error';
            }

        }
    }
}

if ($deleted == 3){
    echo 'deleted';
}



mysqli_close($con);
?>