<!-- Cart order placed -->
<?php
include("connect.php");
session_start();
if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
    $sql="select * from cart where userid='$userid'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $pid=$row["id"];
        $image=$row["image"];
        $foodname=$row["foodname"];
         $foodtype=$row["foodtype"];
        $quantity=$row["quantity"];
        $foodprice=$row["foodprice"];
        $pro=array($foodprice);
        $totalvalue=array_sum($pro);
        $totalprice+=$totalvalue;

        $_SESSION["image"]=$image;
        $_SESSION["foodname"]=$foodname;
        $_SESSION["foodtype"]=$foodtype;
        $_SESSION["foodprice"]=$foodprice;
        $_SESSION["totalprice"]=$totalprice;
        $arr=array($image=>$_SESSION["image"],$foodname=> $_SESSION["foodname"],$foodprice=> $_SESSION["foodprice"]);
       $_SESSION["fooditems"]=$arr;
?>
<!-- Insert into  -->
<?php
if(isset($_POST["cartorder"])){
$email= $_POST["email"];
$phnumber=$_POST["phnumber"];
$name=$_POST["name"];
$useraddress=$_POST["address"];
$_SESSION["username"]=$name;
$_SESSION["phnumber"]=$phnumber;
$_SESSION["email"]=$email;
$_SESSION["useraddress"]=$useraddress;
$image=$row["image"];
$foodname=$row["foodname"];
 $foodtype=$row["foodtype"];
$quantity=$row["quantity"];
$foodprice=$row["foodprice"];
$pro=array($foodprice);
$totalvalue=array_sum($pro);
$totalprice+=$totalvalue;
$_SESSION["pid"]=$pid;

$arr_cartitems=array($image,$foodname,$foodprice);
$_SESSION["arr"]=$arr_cartitems;
header("location:cardorderedit.php");
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
<style>
    @media only screen and (min-width: 768px){
    .form{
        margin-top: -35rem;
    }
}
</style>
</head>
<body>
   <div class="container">
    <div class="">

    <div class="row">
        <div class="col-md-8">
            <div class="col-md-3 mt-5">
                <img src='<?php echo $image?>' alt="">
            </div>
            <div class="col-md-5">
                <?Php
                if($foodtype=="VEG"){
                    echo "<div>FOOD TYPE: <span class='bg-success text-white'>$foodtype</span> </div>";
                }
                else{
                    echo "<div>FOOD TYPE: <span class='bg-danger text-white'>$foodtype</span> </div>";
                }
                 ?>
                <div class="my-2">FOOD NAME : <span><?php echo $foodname;?></span></div>
            </div>
        </div>
        <?php
       }
    }
   ?> 
     <div class="col-md-4 form">
                <h4 class="text-center">EDIT DETALS</h4>
     <form action="" method="post">
                <input type="text" name="name"  value='<?php echo $_SESSION["username"]?>' class="form-control order-form-input my-5">
                <input type="text" name="phnumber" id="phonenumber" placeholder="Enter your phone number" required value='<?php echo $_SESSION["phnumber"]?>' class="form-control order-form-input">
                <input type="email" name="email" placeholder="Enter your Email Address" required  value='<?php echo $_SESSION["email"]?>' class="form-control order-form-input my-5">
                <textarea name="address" id="useraddress" cols="5" rows="5" required placeholder="Enter Delivary Address"  value='<?php echo $_SESSION["useraddress"]?>' class="form-control order-form-input mb-5"></textarea>
              

            <div>TOTAL PRICE :<?php echo  $totalprice?></div>
            <button class="btn btn-success" name="cartorder" type="submit">ORDER</button>
</form> 

        </div>
    </div>
    </div>
  
   </div> 
  
</body>
</html>