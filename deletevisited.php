<?php
include("connect.php");
if(isset($_GET["visitedid"])){
    $id= $_GET["visitedid"];
    $sql="delete from visited where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:visited.php");
    }
}
?>