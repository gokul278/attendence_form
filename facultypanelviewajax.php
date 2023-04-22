<?php

include "dbconnection.php";

$id = $_POST["id"];

$sql = "select * from attendance_details where attendance_id = '{$id}'";

$res = $con->query($sql);

$student_attendence = array();

$student_id = array();

$names = array();

$count = 1;


while($row = $res->fetch_array()){
    if($row['student_id'] == "nill"){
        $count++;
    }
    

    if($count == 1){
        foreach(unserialize($row['student_id']) as $value){
        if($value){
            array_push($student_attendence,$value);
        }
    }
    }

        echo "<h6>Date : {$row['date']}</h6>
    <table class='table table-hover table-bordered mt-3'>
            <thead align='center'>
              <tr>
                <th scope='col'>RollNo</th>
                <th scope='col'>Name</th>
                <th scope='col'>Attendence</th>
              </tr>
            </thead>
            <tbody align='center'>
            ";
}



$sql1 = "select * from login_details where type = 'student'";


$res1 = $con->query($sql1);

while($row1 = $res1->fetch_array()){
    array_push($names,$row1['name']);
    array_push($student_id,$row1['userid']);
}




$yyy =0;

        for($dd = 0;$dd<count($names);$dd++){
            echo "<tr>";
            echo "<td>$student_id[$dd]</td>";
            echo "<td>$names[$dd]</td>";
                if(isset($student_attendence[$yyy])){
                    if($student_id[$dd] != $student_attendence[$yyy]){
                        echo "<td style='color:green;font-weight:600'>Present</td>";
                    }else{
                        echo "<td style='color:red;font-weight:600'>Absent</td>";
                        $yyy++;
                    }
                }else{
                    echo "<td style='color:green;font-weight:600'>Present</td>";
                }
            
            echo "</tr>";
        }


        echo "
        </tbody>
        </table>";



?>