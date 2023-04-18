<?php
session_start();
include("connect.php");
if(isset($_POST["signup"])){
    $username=$_POST["username"];
    $_SESSION["username"]=$_POST["username"];
    $password=md5($_POST["password"]);
    $cpassword=md5($_POST["cpassword"]);
    $usertype=$_POST["usertype"];
    $_SESSION["usertype"]=$usertype;
    $query= "select * from signup where username='$username'";
    $result= mysqli_query($conn,$query);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "user already exist";
        }
        else{
            if($password==$cpassword){
                $sql="insert into signup (username,password,usertype) values('$username','$password','$usertype')";
                echo $sql;
                $result=mysqli_query($conn,$sql);


                $_SESSION["username"]=$username;
                header("location:login.php");
            }
            else{
                echo "password didn't match";
            }
         
            
            
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootsrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

   
    <!-- Js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
  </head>
  <body>
        <div class="container h-100">
            <h1 class="text-center">Sign Up</h1>
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                     <form action="signup.php" method="post">
                        <input type="text" name="username" class="form-control mt-5" placeholder="Enter your name" required>
                        <input type="password" name="password" class="form-control my-5" placeholder="Enter password" required maxlength="8" >
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" required maxlength="8" >
                        <select name="usertype" class="form-control my-3">
                                <option name="0" value="0">User</option>
                                <option name="1" value="1">Owner</option>
                                <option name="2" value="2">Admin</option>
                        
                        </select>
                        <div>
                            <button type="submit" name="signup" class="btn btn-primary mt-5" >Sign Up</button>
                        </div>
                    </form>
                </div>
            
                </div>
                <div class="mt-3">If you have already account <a href="login.php">LOGIN</a></div>
            </div>
        </div> 
       

  </body>
</html>