<?php
// ini_set("display_errors","1");
// error_reporting(E_ALL);
include("connect.php");
session_start();
if(isset($_GET["customer"])){
    $userid=$_GET["customer"];
    // retrive username from signup table
    $query="select * from signup where userid=$userid";
    $push=mysqli_query($conn,$query);
    $fetch=mysqli_fetch_array($push);
    $username=$fetch["username"];
    $_SESSION["cutomername"]=$username;
    $sql="select * from rapzorpayment where userid=$userid";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $i=0;
    while($row=mysqli_fetch_array($result)){
        $paymentid=$row["paymentid"];
        $orderid=$row["orderid"];
        $ordername=$row["name"];
        $useraddress=$row["useraddress"];
        $userphnumber=$row["phnumber"];
        $useremail=$row["email"];
        $payment=$row["amount"];
        $date=$row["dateofpay"];
        $foodname=$row["foodname"];
        $paymentstatus=$row["paymentstatus"];
//  Payment
         $food_price=array($payment);
         $food_value=array_sum($food_price);
         $total_price+=$food_value;
        //  TOtal order items:
    //   $totalitems= count($payment);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- Bootsrap css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>    
<!-- CSS -->
<link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body class="mx-5 mt-3">
 
    <?php echo ++$i;?>
        <pre>NAME         :  <span><?php echo $username;?></span></pre>
        <pre>ORDER NAME   :  <span><?php echo $ordername;?></span></pre>

        <pre>PAYMENT ID   :  <span><?php echo $paymentid;?></span></pre>
        <pre>ORDER ID     :  <span><?php echo $orderid;?></span></pre>
        <!-- condition for payment success or not -->
        <?php
        if( $paymentstatus=='1'){
            $paymentstatus="paid";
        }
        ?>
        <pre>PAID STATUS  :  <span><?php echo $paymentstatus;?></span></pre>
        <pre>ADDRESS      :  <span><?php echo   $useraddress;?></span></pre>
        <pre>DATE OF ORDER:  <span><?php echo   $date;?></span></pre>
        <pre>PHONE NO     :  <span><?php echo   $userphnumber;?></span></pre>
        <pre>PRICE        :  <span><?php echo $payment?></span></pre>
        <pre>FOOD NAME    :  <span><?php echo $foodname?></span></pre>
    
        <hr> 
        <?php
            }
            ?>
            <pre>TOTAL OF PAY        :  <?php echo $total_price; ?></pre>
            <pre>TOTAL ITEMS ORDERED :  <?php echo $i; ?></pre>
       <?php 
       }
        else{
            ?>
            <div class="bg-danger text-center mx-5"> NO DATA FOUND </div>
        <?php
        }
        }
        
        }
        ?>

        <a href='<?php echo "customer.php"?>' class="btn btn-primary">BACK</a>
    </div>
</body>
</html>