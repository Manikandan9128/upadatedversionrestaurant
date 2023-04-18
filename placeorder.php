<?php
include("connect.php");

if(isset($_GET["productid"]) || isset($_GET["userid"])){
    echo $productid=$_GET["productid"];
    echo $userid=$_GET["userid"];  
    $product= "select * from `admin` where id=$productid";
    $getproduct=mysqli_query($conn,$product);
    while($row=mysqli_fetch_assoc($getproduct)){
        $image =$row["image"];
        $foodtype=$row["foodtype"];
        $foodname=$row["foodname"];
        $quantity=$row['quantity'];
        $price=$row["foodprice"];
        echo $userid=$_GET["userid"];
        $query = "insert into `visited`(image,foodname,foodprice,foodtype,quantity,userid) values ('$image','$foodname','$price','$foodtype','$quantity','$userid')";
        $result=mysqli_query($conn,$query);
        header("location:visited.php");
    }
}
?>

razorpaygateway.php