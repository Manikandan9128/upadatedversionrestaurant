<?php
include("connect.php");
if(isset($_GET["cartid"]) || isset($_GET["userid"])){
    $productid=$_GET["cartid"];
    echo $userid=$_GET["userid"];  
    $product= "select * from `admin` where id=$productid";
    $getproduct=mysqli_query($conn,$product);
    while($row=mysqli_fetch_assoc($getproduct)){
        $image =$row["image"];
        $foodtype=$row["foodtype"];
        $foodname=$row["foodname"];
        $quantity=$row['quantity'];
        $price=$row["foodprice"];
         $userid=$_GET["userid"];
        $query = "insert into `cart`(image,foodname,foodprice,foodtype,quantity,userid) values ('$image','$foodname','$price','$foodtype','$quantity','$userid')";
        $result=mysqli_query($conn,$query);
       
        header("location:displaycart.php");
    }
}
?>
