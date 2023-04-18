 <?php
include("connect.php");
ini_set("display_errors","1");
error_reporting(E_ALL);
session_start();
$shopuserid=$_SESSION["userid"];
$sql="select * from shopdetails where userid=$shopuserid";
$result=mysqli_query($conn,$sql);
$pull=mysqli_fetch_array($result);
$shopname=$pull["shopname"];
$_SESSION["shopname"]=$shopname;
$shoptype=$pull["shoptype"];
$_SESSION["shoptype"]=$shoptype;
$shopowner=$pull["ownername"];
$_SESSION["ownername"]=$shopowner;
$shopaddress=$pull["shopaddress"];
$_SESSION["shopaddress"]=$shopaddress;
if(isset($_POST["submit"])){
    $shopuserid=$_SESSION["userid"];
    $file =$_FILES["file"];
    $imagename=$file["name"];
    $tmp_name= $file["tmp_name"];
    $nameseparated =explode(".",$imagename);
    $file_extention= strtolower(end($nameseparated));
    $extention = array('jpeg','png','jpg');
    if(in_array($file_extention,$extention)){
        $upload ="upload/".$imagename;
        move_uploaded_file($tmp_name,$upload);
    }
        $shopname= $_SESSION["shopname"];
        $shopowner=$_SESSION["ownername"];
        $shopaddress=$_SESSION["shopaddress"];
        $foodname=$_POST["foodname"];
        $foodprice=$_POST["foodprice"];
         $foodtype=$_POST["foodtype"];
        $quantity=$_POST["quantity"];
        $_SESSION["quantity"]=$quantity;
        $shoptype=$_SESSION["shoptype"];
        if($_SESSION["shoptype"]=='0'){
            $foodtype="VEG";
        }
        $sql ="insert into `admin`(image,imagename,shopname,shopowner,shopaddress,foodname,foodprice,foodtype,quantity,userid,shoptype) values ('$upload','$imagename','$shopname','$shopowner','$shopaddress','$foodname','$foodprice','$foodtype',' $quantity','$shopuserid','$shoptype')";   
        $result =mysqli_query($conn,$sql);
        if($result){
            echo "<div>
            <script class='alert alert-success'role='alert'>alert('Successfully submitted')</script>
            </div>";
            header("location:fooditems.php");
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
         <!-- Bootsrap css -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <!-- font awasome  -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>

</head>
<body>

<?php
$sql="insert in to value"
?>
<div class="container">
    <div class="row my-5">
        <div class="col">
            <h3 class="text-center">Admin Dashboard</h3>
            <form action="admindashboard.php" class="d-flex justify-content-center flex-column my-5" enctype="multipart/form-data" method="post">
            <div class="col-auto my-4">
                    <input type="file"  class="form-control" name="file" id="file" placeholder="Upload food image " required>
                </div> 
                 <!-- <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopname" id="shopname" placeholder="Enter Shop name" required>
                </div> -->
                <!-- <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopowner" id="shopowener" placeholder="Enter Shop Owner Name" required>
                </div> -->

                <!-- <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopaddress" id="shoplocation" placeholder="Enter Shop Address" required>
                </div> -->
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="foodname" id="price" placeholder="Enter Food name" required>
                </div>
                
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="foodprice" id="price" placeholder="Enter Food Price" required>
                </div>
           
                <div class="col-auto">
                    <!-- veg and non veg condition -->
                    <?php if($shoptype=='1'){
                    ?>
                    <select name="foodtype"  class="form-control" required>
                        <option value="VEG" required>VEG</option>
                        <option value="NON VEG" required>NON VEG</option>

                    </select>
                    <?php 
                    }
                    else{
                        echo "<div>SHOP TYPE : <span>VEG</span> </div>";
                    }
                    ?>
                </div>
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="quantity" id="price" placeholder="Enter Quantity" required>
                </div> 

                <div class="col-auto my-3">
                <input type="submit" class="btn btn-primary px-5 py-3" name="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>