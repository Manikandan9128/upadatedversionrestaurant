<?php
include("connect.php");
ini_set("display_errors","1");
error_reporting(E_ALL);
if(isset($_GET["userid"])){
  $userid=$_GET["userid"];
  $sql="select status from signup where userid=$userid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
 echo  $userstatus=$row["status"];
  if($userstatus==1){
        // echo "<script>confirm('If you want to block this user')</script>";
        $query="update signup set status= 0 where userid=$userid";
        $result=mysqli_query($conn,$query);
        if($result){
            header("location:customer.php");
        }
  }
  if($userstatus==0){
    $query="update signup set status= 1 where userid=$userid";
    $result=mysqli_query($conn,$query);
    if($result){
        header("location:customer.php");
    }
}

}
?>
<?php

include("connect.php");
if(isset($_GET["foodid"])){
    echo $foodid=$_GET["foodid"];
    $sql="select foodstatus from admin where id=$foodid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
   echo  $userstatus=$row["foodstatus"];
    if($userstatus==1){
          // echo "<script>confirm('If you want to block this user')</script>";
          $query="update admin set foodstatus = 0 where id=$foodid";
          $result=mysqli_query($conn,$query);
          if($result){
              header("location:fooditems.php");
          }
    }
    if($userstatus==0){
      $query="update admin set foodstatus = 1 where id=$foodid";
      $result=mysqli_query($conn,$query);
      if($result){
          header("location:fooditems.php");
      }
  }
  
  }
?>
<?php
include("connect.php");
if(isset($_GET["usershopid"])){
    echo $userid=$_GET["usershopid"];
    $sql="select status from signup where userid=$userid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $userstatus=$row["status"];
    if($userstatus==1){
          // echo "<script>confirm('If you want to block this user')</script>";
          $query="update signup set status= 0 where userid=$userid";
          $result=mysqli_query($conn,$query);
          if($result){
              header("location:restaurant.php");
          }
    }
    if($userstatus==0){
      $query="update signup set status= 1 where userid=$userid";
      $result=mysqli_query($conn,$query);
      if($result){
          header("location:restaurant.php");
      }
  }
  
  }
?>