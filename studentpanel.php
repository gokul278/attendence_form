<?php
session_start();
include "dbconnection.php";
?>

<?php
if(isset($_SESSION["username"])){
   if($_SESSION["type"]  == "student"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "requiredfile.php"
    ?>
    <title>Student Attendence</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" style="background-color: #2B3467; height:100vh">
                <div class="mt-5" align="center">
                    <div class="image" style="width:200px; height:200px; background-color:#E7B10A; border-radius:100px;" align="center">
                        <img style="width:70%; height:70%; object-fit: contain; margin-top:12%" width="100" src="images/user.png" alt="">
                    </div>
                    <div class="name mt-5">
                        <h3 style="color: white;"><?php echo $_SESSION["name"];?></h3>
                    </div>
                    <div class="department mt-4">
                        <h5 style="color: white;">B.Tech Artificial Intelligence and Data Science</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-9" style="background-color: #BAD7E9;">
                <!-- Navbar - Start -->
                <nav class="navbar navbar-expand-lg " style="margin-left: -22px;width: 103%; background-color:#2B3467">
                    <div class="container-fluid">
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: flex-end;">
                        <div class="navbar-nav">
                            <a class="nav-link" style="text-decoration: none; color:white; font-size: 20px; "> Hi!&nbsp;<span style="color: #E7B10A"><b><?php echo $_SESSION["username"];?></b></span></a>
                          <a class="nav-link" onclick="logout()" style="text-decoration: none; color:white; font-size:15px; "><i class='fas fa-sign-out-alt' style="padding:7px; border-radius:5px; border: 2px solid white;"></i></a>
                        </div>
                      </div>
                    </div>
                  </nav>
                <!-- Navbar - End -->
                

                <!-- Attendence Details - Start -->
                <h4 class="mt-2" style="font-weight: 600; text-decoration:underline">Attendence Details</h4>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="frmsub" class="mt-3" style="border-radius: 10px; background-color:white; padding:10px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                <div class="row">
                                    <div class="col-lg-4 mb-3" style="margin-top:20px">
                                        <label for="date" style="font-weight:600">Choose a Date</label>
                                        <input onclick="clearmess()" style="margin-left:10px; font-weight:600" type="date" id="date">
                                        <p class="mt-3" id="errormess" style="color:red"></p>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <button type="submit" class="btn btn-primary mt-3 mb-3" style="color: black; background-color:#E7B10A; border:none; width:100px; font-weight:600">Submit</button>   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    <div class="row" style="height: 460px; overflow: auto;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                        <div class="col-lg-12" style="border-radius: 5px; background-color:white; padding:10px;">
                            <table id="atttb" class="table table-hover table-bordered mt-3" >
                                <thead align="center">
                                  <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody align="center" style="font-weight:500">
                                  
                                <?php

                                $count = 0;

                                $selectsql = "select * from attendance_details order by date desc";

                                $selectres = $con->query($selectsql);

                                while($selectrow = $selectres->fetch_array()){
                                  echo "<tr>
                                    <td>{$selectrow["date"]}</td>
                                    ";
                                    
                                    if($selectrow["student_id"] == "nill"){
                                        echo "<td style='color:green'>Present</td>";
                                    }else{
                                        
                                        echo "<td style='color:red'>Absent</td>";
                                        // foreach(unserialize($selectrow["student_id"]) as $aaa){

                                        //     if($aaa == $_SESSION["userid"]){
                                                
                                        //         echo "<td style='color:red'>Absent</td>";
                                        //     }else{
                                        //        // echo "ttt   ";
                                        //         //echo "<td style='color:green'>Present</td>";
                                        //     }
                                        // }
                                        echo "</tr>";
                                        
                                    }  
                                    

                                    
                                    

                                }

                                

                                
                                
                                ?>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                <!-- Attendence Details - End -->
            </div>
        </div>
    </div>

    <script>
        logout = () =>{
            window.location.href = "logout.php";
        }

        clearmess = () =>{
            $("#errormess").html("");
        }
        $("#frmsub").submit((event)=>{

            
            event.preventDefault();

            var date = $("#date").val();

            if(date){

                $.ajax({
                    url : "choosedate.php",
                    type : "post",
                    data : {"date":date},
                    success:(res)=>{
                        console.log(res);
                    }
                })

            }else{
                $("#errormess").html("Choose the Date")
            }
        })
    </script>
</body>
</html>

<?php
    }
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "requiredfile.php"
    ?>
    <title>Student Attendence</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="background-color: #2B3467; height:100vh">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" style="margin-top:20%">
                <center>
                    <h1 style="color:white">Error Accquired</h1>
                    <h2 style="color:white">Try again to Login</h2>
                    <br>
                    <button onclick="logout()" class="btn btn-outline-warning">BACK</button>
                </center>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</body>
<script>
    logout = () =>{
            window.location.href = "logout.php";
        }
</script>
</html>

<?php
}
?>