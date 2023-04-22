<?php

    include "dbconnection.php";

    $date = $_POST["date"];
    $count = 1;
    $i =1;
    $a = 1;
    $sql = "select * from attendance_details where date = '{$date}'";

    $res = $con->query($sql);

    while($row = $res->fetch_array()){
        if($row["date"] == $date){
            //echo "error";
            $count++;
            $i++;
        }
    }
    

    if($count == 1){
        if(isset($_POST["absenties"])){
            $absenties = serialize($_POST["absenties"]);
            $sql1 = "insert into attendance_details (`student_id`,`date`,`status`) values ('{$absenties}','{$date}','absent')";

                $res1 = $con->query($sql1);
                $i++;
        }
    }

    
    
    if($i == 1){
        if(empty($absenties)){
            $sql2 = "select * from attendance_details where date = '{$date}'";
            $res2 = $con->query($sql2);
            while($row1 = $res2->fetch_array()){
                if($row1["date"] == $date){
                    $a++;
                }
            }
        }

        if($a == 1){
            $sql2 = "insert into attendance_details (`student_id`,`date`,`status`) values ('nill','{$date}','absent')";
            $res2 = $con->query($sql2);
        }
    }

    echo $count;
    echo $i;
    echo $a;
?>