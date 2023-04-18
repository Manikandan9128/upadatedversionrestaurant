<?php
session_start();
include("connect.php");
$username=$_POST["username"];
$password=md5($_POST["password"]);
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $_SESSION["username"] = $username;
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
      
        if ($num > 0) {
     
          //Condition for username 
          $row=mysqli_fetch_array($result);
          $usertype=$row["usertype"];
          $_SESSION["usertype"]=$row["usertype"];
          $userstatus=$row["status"];
          $_SESSION["userstatus"]=$userstatus;
          $_SESSION["userid"]=$row["userid"];    
            if ( $usertype == 1 || $usertype=2) {

              if($_SESSION["usertype"]==0 && $_SESSION["userstatus"]==1){
                header("location:index.php");
               }
               if($_SESSION["usertype"]== 1 && $_SESSION["userstatus"]== 1){
                    $userid=$_SESSION["userid"];
                    $sql="select userid from shopdetails where userid =$userid";
                    $result=mysqli_query($conn,$sql);
                    $fetch=mysqli_fetch_array($result);
                    $useridshop=$fetch["userid"];
                  if($_SESSION['userid']==$useridshop){

                    header("location:fooditems.php");
                }
                else{
                  header("location:shopdetails.php");
                }
               }
               else{
                echo "<div class='bg-danger'><script>alert('THIS ACCOUNT BLOCKED. PLEASE! CONTACT OUR ADMIN')</script></div>";
               }
               if($_SESSION["usertype"]== 2){
                header("location:superadminpanel.php");
               }
           
               }
              //  Condition for customer in active or not
               $row=mysqli_fetch_array($result);
               echo $userstatus=$row["status"];
               if($userstatus==1){
                 header("location:index.php");
               }
               else{
                 echo "<div class='bg-danger'><script>alert('THIS ACCOUNT BLOCKED. PLEASE! CONTACT OUR ADMIN')</script></div>";
               }
          
              
        } else {
            echo "Invalid data";
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
    <link
      rel="stylesheet"
      href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"/>
   
    <!-- Js  -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
  </head>
  <body>
        <div class="container h-100">
            <h1 class="text-center">Log In</h1>
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <form action="" method="post">
                        <input type="text" name="username" class="form-control mt-5" placeholder="Enter your name" required>
                        <input type="password" name="password" class="form-control my-5" placeholder="Enter password" maxlength="8" required>
                        <button type="submit" name="login" class="btn btn-primary ">Log in</button>                    
                    </form>

                </div>
            </div>
        </div>
  </body>
</html>
