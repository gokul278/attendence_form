<?php

session_start();


include "dbconnection.php";

$date = $_POST['date'];

$sql = "select * from attendance_details where date = '{$date}'";

$res = $con->query($sql);


$userid = $_SESSION("userid");

$count = 0;
while($row = $res->fetch_array()){
    if($row["student_id"]){
        $count++;
        
        // foreach(unserialize($row["student_id"]) as $val){
        //     if($val == $_SESSION["userid"]){
        //         echo "passed";
        //     }
        // }
    }

    

    

    
}

if($count == 0){
    echo "error";
}

?>