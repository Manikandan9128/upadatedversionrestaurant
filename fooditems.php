<?php
include("connect.php");
session_start();
$userid=$_SESSION["userid"];
$sql="select * from shopdetails where userid =$userid";
$result=mysqli_query($conn,$sql);
$fetch=mysqli_fetch_array($result);
$shopname=$fetch["shopname"];
$ownername=$fetch["ownername"];
$shopaddress=$fetch["shopaddress"];
$shoptype=$fetch["shoptype"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>restaurant</title>
       <!-- Bootsrap css -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    <h4 class="text-center">RESTAURANT</h4>
    
  <div class="container my-5">
<a href='<?php echo "admindashboard.php";?>' class="btn btn-success">ADD FOOD ITEMS</a>

    <div class="row">
        <div class="col-8 shadow my-5 ">
        <a  href="updateshopdetails.php"class="ms-auto"><i class="fas fa-edit"></i></a>

            <div class="my-5">SHOP NAME : <span><?php echo $shopname?></span></div>
            <?php
            if($shoptype=='0'){
                $shoptype="VEG";
            }
            else{
                $shoptype="NON VEG";
            }
            ?>
            <div>SHOP TYPE : <span><?php echo $shoptype?></span></div>
            <div class="my-5">SHOP ADDRESS : <span><?php echo $shopaddress?></span></div>

        </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <table class="table shadow px-5">
            <!-- SHOP DETAILS -->
            <thead>
                <tr>
                    <th>IMAGE</th>
                   <th>FOOD NAME</th> 
                   <th>FOOD TYPE</th>
                   <th>PRICE</th>
                   <th>QUANTITY</th>
                   <th>EDIT</th>
                   <th>FOOD STATUS</th>
                   <th>FOOD STATUS CHANGE</th>
                   <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    
                    $sql="select * from admin where userid=$userid";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result)){
                        $image=$row["image"];
                        $imagename=$row["imagename"];
                        $foodname=$row["foodname"];
                        $foodtype=$row["foodtype"];
                        $foodprice=$row["foodprice"];
                        $foodquantity=$row["quantity"];
                        $foodstatus=$row["foodstatus"];
                        $foodid=$row["id"]

                    
                    ?>
                <tr>
                
                    <td><img src='<?php echo $image?>' style="height:25vh;width:25vw" alt='<?php echo $imagename ?>'></td>
                    <td><?php echo $foodname ?></td>
                    <td><?php echo $foodtype ?></td>
                    <td><?php echo $foodprice ?></td>
                    <td><?php echo $foodquantity ?></td>
                    <td><a href='<?php echo "updatefood.php?foodid=$foodid" ?>' class="btn btn-primary">EDIT</a></td>
                    <?php
                    if($foodstatus==0){
                      $foodstatus="Available"; 
                  }
                      if($foodstatus==1){
                          $foodstatus="Not available";
                      }
                  ?>
                  <td><?php echo $foodstatus ; ?></td>
                  <td><a href='<?php echo "activeordeactiveuser.php?foodid=$foodid"?>' class="btn btn-warning">CLICK</a></td>
                  <td><a href="<?php echo "deletecart.php?deletefoodid=$foodid"?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>