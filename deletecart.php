<?php
include("connect.php");
if(isset($_GET["deleteid"])){
    $id= $_GET["deleteid"];
    $sql="delete from cart where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:displaycart.php");
    }
}
?>
<?php
if(isset($_GET["deletefoodid"])){
    $id= $_GET["deletefoodid"];
    $sql="delete from admin where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:fooditems.php");
    }
}
if(isset($_GET["deleteadminfoodid"])){
    $id= $_GET["deleteadminfoodid"];
    $sql="delete from admin where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:resturant.php");
    }
}
?>