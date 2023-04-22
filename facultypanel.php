<?php
include "dbconnection.php";
session_start();
?>

<?php
if(isset($_SESSION["username"])){
   if($_SESSION["type"]  == "faculty"){
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
    <title>Faculty Attendence</title>
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
                        <h3 style="color: white;"><?php echo $_SESSION['name']?></h3>
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
                            <a class="nav-link" style="text-decoration: none; color:white; font-size: 20px; "> Hi!&nbsp;<span style="color: #E7B10A"><b><?php echo $_SESSION['username']?></b></span></a>
                          <a class="nav-link" onclick="logout()" style="text-decoration: none; color:white; font-size:15px; "><i class='fa-solid fa-right-from-bracket' style="padding:7px; border-radius:5px; border: 2px solid white;" ></i></a>
                        </div>
                      </div>
                    </div>
                  </nav>
                <!-- Navbar - End -->
                
                <!-- Attendence - Start -->
                <h4 class="mt-2" style="font-weight: 600; text-decoration:underline">Attendence Form</h4>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="frm" class="mt-3" style="border-radius: 10px; background-color:white; padding:10px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                <div class="row">
                                    <div class="col-lg-4 mt-3">
                                        <label class="mt-3" for="date" style="font-weight:600">Choose a Date</label>
                                        <input onclick="clearerror()" style="margin-left:10px; font-weight:600" type="date" name="date" id="date">
                                        <p class="mt-3" id="errordate" style="color:red; font-weight:600"></p>
                                        <p class="mt-3" id="errormessage" style="font-weight:600"></p>
                                    </div>
                                    <div class="col-lg-2 mt-3">
                                        <label class="mt-3" for="absenties" style="font-weight:600">Choose Absenties</label>
                                            
                                    </div>
                                    <div class="col-lg-3 mt-3">
                                    <select style="margin-top: 13px;" multiple="multiple" placeholder="Select a Absentice" id="absenties" class="SlectBox ">
                                    <?php
                                    $sql = "select * from login_details where type = 'student' " ;
                                    $res = $con->query($sql);
                                    while($row = $res->fetch_assoc()){
                                        echo "<option  value={$row['userid']}>{$row['name']}</option>";
                                    }
                                    ?>
                                    
                                    </select>
                                    </div>
                                    <div class="col-lg-3 mt-3 mb-3" align="center">
                                    <button type="submit"  class="btn btn-primary mt-2 " style="color: black; background-color:#E7B10A; border:none; width:100px; font-weight:600">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Attendence - End -->
                
                <!-- Attendence Details - Start -->
                <h4 class="mt-5" style="font-weight: 600; text-decoration:underline">Attendence Details</h4>
                <div class="container-fluid mt-3">
                    <div class="row" style="height: 420px; overflow: auto;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">  
                        <div class="col-lg-12" style="border-radius: 5px; background-color:white; padding:0px 20px;">
                            <table class="table table-hover table-bordered mt-3">
                                <thead align="center">
                                  <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Edit</th>
                                  </tr>
                                </thead>
                                <tbody align="center" id="new">
                                  <?php
                                  $selectsql = "select * from attendance_details order by date desc";

                                  $selectres = $con->query($selectsql);

                                  while($selectrow = $selectres->fetch_array()){
                                    echo "
                                    <tr>
                                    <td>{$selectrow['date']}</td>
                                    <td><button type='submit' name='viewbtn[]'  value='{$selectrow['attendance_id']}' class='btn view btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' style='color: black; background-color:#3CCF4E; border:none; width:100px; font-weight:600;'><i class='fa-sharp fa-solid fa-eye' style='color: #000000;'></i>&nbsp; View</button>
                                    <div class='modal fade' id='exampleModal' tabindex='-1'   aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                    <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Attendance List</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div></td>
                                    <td><button  class='btn btn-primary' style='color: black; background-color:#E7B10A; border:none; width:100px; font-weight:600;'><i class='fa-solid fa-pen-to-square' style='color: #000000;'></i>&nbsp; Edit</button></td>
                                  </tr>";
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
</body>

<?php
        $maxvalue = "select MAX(attendance_id) from attendance_details";
        $maxres = $con->query($maxvalue);
        while($maxaa = $maxres->fetch_array()){
            echo "<script>localStorage.setItem('aid' , '{$maxaa["MAX(attendance_id)"]}' );</script>";
        }
        ?>
    <script>
        
        var count = 1;
        var aid = localStorage.getItem("aid");
        aid = (+aid)+1;
        $(document).ready(()=>{
            $("#frm").submit((event)=>{
                event.preventDefault();
                var date = $("#date").val();
                var absenties = $('.SlectBox').SumoSelect().val();
                if(!date){
                    $("#errordate").html("Please choose a date")    
                }else{
                    var form = $('#frm')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        url: "facultypanelajax.php",
                        type: "post",
                        data: {"date":date,"absenties":absenties},
                        success:function(res){
                            
                            if(res <=200){
                                // $("#errormessage").html("Attendence Marked Successfully").css("color","green");
                                // $("#date").val("");
                                // $("#new").prepend("<tr><td class='current"+count+"'></td><td><button type='button' value='"+aid+"' class='btn view btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' style='color: black; background-color:#3CCF4E; border:none; width:100px; font-weight:600;'><i class='fa-sharp fa-solid fa-eye' style='color: #000000;'></i>&nbsp; View</button><div class='modal fade' id='exampleModal' tabindex='-1'   aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLabel'>Attendance List</h5><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div><div class='modal-body'>...</div><div class='modal-footer'><button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button></div></div></div></div></td><td><button class='btn btn-primary' style='color: black; background-color:#E7B10A; border:none; width:100px; font-weight:600;'><i class='fa-solid fa-pen-to-square' style='color: #000000;'></i>&nbsp; Edit</button></td></tr>");
                                // $(".current"+count).html(date);
                                //aid = (+aid)+1;
                                alert("Attendence Submitted Successfully");
                                location.reload();
                            }else{
                                $("#errormessage").html("You already entered attendence for this date").css("color","red");
                                $("#date").val("");
                            }
                        }
                    })
                }
            })
        })

        clearerror = () =>{
            count++;
            $("#errordate").html("");
            $("#errormessage").html("");
        }
        $('.SlectBox').SumoSelect();
        logout = () =>{
            window.location.href = "logout.php";
        }

        $(".view").click((event)=>{
            var id = event.target.value;
            console.log(id)
            $.ajax({
                url: "facultypanelviewajax.php",
                type: "post",
                data: {"id":id},
                success:function(res){
                    console.log(res);
                    $(".modal-body").append(res);
                    
                }
            })
        })

        $(".view").click(()=>{
            $(".modal-body").empty();
        })

        
    </script>
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