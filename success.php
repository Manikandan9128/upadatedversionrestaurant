<?php
session_start();
include("connect.php");

if(isset($_POST["razorpay_payment_id"]) && isset($_POST["razorpay_signature"])){
  $foodname= $_SESSION["foodname"];
  $image=$_SESSION["image"];
  $foodtype=$_SESSION["foodtype"];
  $foodprice=$_SESSION["foodprice"];
  $paymentid=$_POST["razorpay_payment_id"];
  $orderid=$_SESSION["razorpayorderid"];
  $name=$_SESSION["name"];
  $phnumber=$_SESSION["phnumber"];
  $email=$_SESSION["email"];
  $userid=$_SESSION["userid"];
  $amount=$_SESSION["foodprice"];
  $useraddress=$_SESSION["useraddress"];
  $quantity=$_SESSION["quantity"];
  $query="insert into rapzorpayment (paymentid,amount,name,email,phnumber,image,foodname,userid,orderid,useraddress,quantity) values('$paymentid','$amount','$name','$email','$phnumber','$image','$foodname','$userid','$orderid','$useraddress','$quantity')";
  echo $query;
  $result=mysqli_query($conn,$query); 
  header("location:orderplaced.php");

}
?>

