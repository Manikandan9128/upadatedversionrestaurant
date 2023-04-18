<?php
include("connect.php");
if(isset($_POST['razorpay_payment_id']) && isset($_POST["totalamount"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phonenumber"]) && isset($_POST["image"]) && isset($_POST["foodname"]) && isset($_POST["userid"])&& isset($_POST["orderid"]) )
{
    $paymentid = $_POST['razorpay_payment_id'];
    // $amount = $price;
    $amount=$_POST["totalamount"];
    $name = $_POST['name'];
    $email=$_POST['email']; 
    $phnumber=$_POST["phonenumber"];
    echo $image=$_POST["image"];
    $foodname=$_POST["foodname"];
    // insert data into database
    $userid=$_POST["userid"];
    $orderid=$_POST["orderid"];
    $sql="insert into razorpay (paymentstatus,paymentid,amount,name,email,phnumber,image,foodname,userid,orderid) values ('paid','$paymentid','$amount','$name','$email','$phnumber','$image','$foodname',$userid,$orderid)";
    $result=mysqli_query($conn,$sql);  
    header("location:foodpaid.php");
}
?>