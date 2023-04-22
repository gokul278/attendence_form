<?php


session_start();

include "dbconnection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];

$sql = "select * from login_details where username = '{$username}'";

$res = $con->query($sql);

while($row = $res->fetch_array()){
    if($row["username"]){
        if($username == $row["username"]){
            echo "upass";
            if($type == $row["type"]){
                echo "tpass";
                $_SESSION["username"] = $row["username"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["type"] = $row["type"];
            }
        }else{
            echo false;
        }
    }else{
        echo false;
    }

    if($row["password"]){
        if($password == $row["password"]){
            echo "ppass";
        }
    }else{
        echo false;
    }
    
}



?>