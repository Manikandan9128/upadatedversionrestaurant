<?php
include("connect.php");
if(isset($_GET["orderid"])&&isset($_GET["userid"])){

    $orderid=$_GET["orderid"];
    echo $userid=$_GET["userid"];
    echo $userid;
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
            <h1 class="text-center">Account Details</h1>
            <div class="row d-flex  align-items-center">
                <div class="col-md-12">
                    <form action="edit.php" method="post">
                        <input type="text" name="username" class="form-control mt-5" placeholder="Enter your name" required>
                        <input type="email" name="email" class="form-control my-5" placeholder="Enter Your Email Address" required >
                        <input type="number" name="number" class="form-control" placeholder="Enter phone" required maxlength="10">
                        <?php
                            if(isset($_POST["number"])){
                                $num=$_POST["number"];
                                if(strlen($num) == 10 && is_numeric($num)){
                                    echo "<div class='bg-success' > success</div>";
                                }
                                else{
                                    echo "Enter Number 10 digits";
                                }
                            } 
                        ?>
                        <textarea type="text" name="address" row="4" class="form-control my-5" placeholder="Enter Address" required></textarea> 
                        <div>
                            <button type="submit" name="signup" class="btn btn-primary " >Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </body>
</html> 