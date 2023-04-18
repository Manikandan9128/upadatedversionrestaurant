<?php
session_start();
include("connect.php");
ini_set("display_errors","1");
error_reporting(E_ALL);

if(isset($_POST["razorpay_payment_id"]) && isset($_POST["razorpay_signature"])){
$userid=$_SESSION["userid"];
$sql="select * from cart where userid=$userid";
$result=mysqli_query($conn,$sql);
// $countitems=mysqli_num_rows($result);
$payid=$_POST["razorpay_payment_id"];
$orderid=$_POST["razorpay_signature"];
$_SESSION["paymentid"]=$payid;
$_SESSION["orderid"]=$orderid;
// $row=$_SESSION["fooditems"];
// foreach($row as $key=>$value){
// echo $value;

// }



for($i=0;$i<=($row=mysqli_fetch_assoc($result));$i++){
$image=$row["image"];
 $foodname=$row["foodname"];
 $amount=$row["foodprice"];
 $paymentid=$_SESSION["paymentid"];
 $orderid=$_SESSION["orderid"];
 $email=$_SESSION["email"];
 $phnumber=$_SESSION["phnumber"];
 $name=$_SESSION["name"];
  $useraddress=$_SESSION["useraddress"];
 $quantity=$row["quantity"];
 $query="insert into rapzorpayment (paymentid,amount,name,email,phnumber,image,foodname,userid,orderid,useraddress,quantity) values('$paymentid','$amount','$name','$email','$phnumber','$image','$foodname','$userid','$orderid','$useraddress','$quantity')";
$fetch=mysqli_query($conn,$query);
if($fetch){
    // header("location:orderplaced.php");\
    echo $_SESSION["pid"];
}

}
}
?>