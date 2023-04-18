<?php
include("connect.php");
session_start();
ini_set("display_errors","1");
error_reporting(E_ALL);
if(isset($_POST["updateshopdetails"])){
    $userid=$_SESSION["userid"];
    if(isset($_POST["update"])){
        $shopname= $_POST["shopname"];
        $shopowner=$_POST["owner"];
        $shopaddress=$_POST["shopaddress"];
        // $foodname=$_POST["foodname"];
        // $foodprice=$_POST["foodprice"];
        //  $foodtype=$_POST["foodtype"];
        // $quantity=$_POST["quantity"];
    $userid=$_SESSION["userid"];
    $sql="update admin set id='$id',shopname='$shopname',shopaddress='$shopaddress',ownername='$ownername' where userid=$userid";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:updatefooddetails.php");
    }
    }
}
$updateshop="update "
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
           <!-- Bootsrap css -->
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    <div class="container">
        <h3>SHOP DETAILS</h3>
        <div class="row">
            <div class="col-10">
             
                <form action="" method="post">
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopname" id="shopname"  placeholder="ENTER SHOP NAME" required>
                </div>
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="ownername" id="ownername"  placeholder="ENTER SHOP OWNER NAME" required>
                </div>
                <div class="col-auto my-4">
                <select name="shoptype" class="form-control" required>
                        <option  value="0" required>VEG</option>
                        <option value="1" required>NON VEG</option>

                    </select>
                </div>
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopaddress" id="shopaddress"  placeholder="ENTER SHOP ADDRESS" required>
                </div>
                <div class="d-flex justify-content-between">
                <input type="submit" name="updateshopdetails" class="btn btn-success">
                <a href="fooditems.php" class="btn btn-primary">BACK</a>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>