<?php
include ("connect.php");
session_start();
if(isset($_GET["productid"]) || isset($_GET["userid"])){
    $id=$_GET["productid"];
    $_SESSION["userid"]=$_GET["userid"];
    $userid=$_GET["userid"];
    $_SESSION["productid"]=$id;
    $sql="select * from admin where id=$id";
    $result =mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $id=$row["id"];
        $image =$row["image"];
        $imagename =$row["imagename"];
        $shopname=$row["shopname"];
        $address=$row["shopaddress"];
        $shopowner=$row["shopowner"];
        $foodtype=$row["foodtype"];
        $price=$row["foodprice"];
        $quantity=$row["quantity"];
        $foodname=$row["foodname"];
        $_SESSION["image"]=$image;
        $_SESSION["foodname"]=$row["foodname"];
        $_SESSION["foodprice"]=$price;
        $_SESSION["foodtype"]=$foodtype;
        $simage=$_SESSION["image"];
        $sfoodname=$_SESSION["foodname"];
        $sfoodprice=  $_SESSION["foodprice"];
        $sprice=   $_SESSION["foodprice"];

    }
}
?>
<!-- INSERT DETAILS -->
<?php
if(isset($_POST["pay"])){
    $_SESSION["userid"];
     $_SESSION["productid"];
    $_SESSION["name"]=$_POST["name"];
    $_SESSION["email"]=$_POST["email"];
    if(!empty($_SESSION["email"])){
        header("location:pay.php");
    }
    $_SESSION["phnumber"]=$_POST["phnumber"];
    $_SESSION["useraddress"]=$_POST["address"];
   
}

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
    <div class="container my-3">
        <center ><h4>ENTER YOUR DETAILS</h4></center>
        <div class="row  my-5">
            <div class="col-8  shadow">
                <form action="" method="post">
                <input type="text" name="name"  value='<?php echo $_SESSION["username"]?>' class="form-control order-form-input my-5">
                <input type="text" name="phnumber" id="phonenumber" placeholder="Enter your phone number" required value='<?php echo $_SESSION["phnumber"]?>' class="form-control order-form-input">
                <input type="email" name="email" placeholder="Enter your Email Address" required  value='<?php echo $_SESSION["email"]?>' class="form-control order-form-input my-5">
                <textarea name="address" id="useraddress" cols="5" rows="5" required placeholder="Enter Delivary Address"  value='<?php echo $_SESSION["useraddress"]?>' class="form-control order-form-input mb-5"></textarea>
              
            </div>
            <div class="col-4 shadow">
            <img src='<?php echo $_SESSION["image"]?>' class='figure-img img-fluid rounded content-image'  alt='food'>
            <div class='d-flex justify-content-between'>
            <div>FOOD NAME:<?php echo $_SESSION["foodname"];?> </div>
            <div class=>FOOD PRICE: <span class='bg-primary p-2 text-white'><?php echo $_SESSION["foodprice"]?></span></div>
            </div>
            <div class="d-flex justify-content-between my-3">
            <div> <input name='pay' type='submit' class=' btn-success' value='PLACEORDER'></div>
            <a href="index.php" class="btn btn-secondary">BACK TO HOME</a>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>