<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "requiredfile.php"
    ?>
    <title>Faculty Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="background-color: #2B3467; width: 100%; height:100%">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" style="margin-top: 12%; margin-bottom:18.1%; background-color: #BAD7E9; height:50%; border-radius:10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <form id="frm">
                            <div class="row" align="center">
                                <div class="col-lg-6" style="margin-top: 5%;" align="end">
                                    <a href="index.php" style="text-decoration: none; padding:10px; border: 2px solid #E7B10A; color:black; border-radius: 10px; font-weight:600">Student Login</a>
                                </div>
                                <div class="col-lg-6" style="margin-top: 5%;" align="start">
                                    <a href="facultyloginpage.php" style="text-decoration: none; padding:10px; background-color:#E7B10A; color:black; border-radius: 10px; font-weight:600">Faculty Login</a>
                                </div>
                            </div>
                            <div class="mb-3" style="margin-top: 7%;">
                              <label for="exampleInputEmail1" class="form-label" style="font-size: 20px; font-weight:500; ">Username</label>
                              <input type="text" name="username" class="form-control" id="username" >
                              <p id="usererror" style="color: red; margin-top:5px;"></p>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label" style="font-size: 20px; font-weight:500; ">Password</label>
                              <input type="password" name="password" class="form-control" id="password" >
                              <p id="passworderror" style="color: red; margin-top:5px;"></p>
                              <input type="hidden" name="type" value="faculty">                              
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 mb-4" style="color: black; background-color:#E7B10A; border:none; width:100px; font-weight:600">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>  
    </div>
        <script>

$(document).ready(()=>{
  $("#frm").submit((event)=>{
    event.preventDefault();
            
            var username = $("#username").val();
            var password = $("#password").val();
            var count=0;

            if(username){
                if(username.length>=8 && username.length<=12){
                    if(/^[A-Za-z0-9]*$/.test(username)){
                        count++
                    }else{
                        $("#usererror").html("Please enter valid username")
                    }
                }else{
                    $("#usererror").html("Please enter valid username")
                }
            }
            else{
                $("#usererror").html("Please enter the username")                
            }

            if(password){
                if(password.length>=8){
                    count++
                }else{
                    $("#passworderror").html("Please enter the valid passowrd")
                }
            }else{
                $("#passworderror").html("Please enter the passowrd");
            }


            $("#username").click(()=>{
                $("#usererror").html("")
            })

            $("#password").click(()=>{
                $("#passworderror").html("")
            })


            if(count == 2){
                var form = $("#frm")[0];
                var formData = new FormData(form);

                $.ajax({
                    url:"facultylogin.php",
                    type:"post",
                    data : formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend:()=>{

                    },success:(res)=>{
                        if(res == "upasstpassppass"){
                            location.replace("facultypanel.php");
                            console.log("success")
                        }else if(res == "upassppass"){
                            $("#passworderror").html("Please login in Student page");
                        }else if(res == "upasstpass"){
                            $("#passworderror").html("Incorrect Password");
                        }else{
                            $("#usererror").html("Incorrect Username");
                            $("#passworderror").html("Incorrect Password");
                        }
                    }
                })
            }         
  })
})

    
    </script>
</body>
</html>