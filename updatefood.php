<?php
include("connect.php");
session_start();
ini_set("display_errors","1");
error_reporting(E_ALL);
$userid=$_SESSION["userid"];
$query="select shoptype from shopdetails where userid=$userid";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$shoptype=$row["shoptype"];
if(isset($_GET["foodid"])){
    $id=$_GET["foodid"];
    $_SESSION["foodid"]=$id;
    if(isset($_POST["updatefood"])){
        $id=$_SESSION["foodid"];
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
        $foodname= $_POST["foodname"];
        $foodtype=$_POST["foodtype"];
        $foodprice=$_POST["foodprice"];
        $foodquantity=$_POST["quantity"];
    $sql="update admin set id='$id',image='$upload',imagename='$imagename',foodname='$foodname',foodtype='$foodtype',foodprice='$foodprice',quantity='$foodquantity' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:fooditems.php");
    }
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootsrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
        <!-- details get from admin table -->
        <?php
        $foodid=$_SESSION["foodid"];
        $sql="select * from admin where id=$foodid";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $image=$row["image"];
        $foodname=$row["foodname"];
        $foodprice=$row["foodprice"];
        $foodquantity=$row["quantity"];
        // $foodprice=$row["foodprice"];


        ?>
                <div class="col-auto my-4">
                    <input type="file"  class="form-control" name="file" id="file" value='<?php echo $image; ?>' placeholder="Upload food image " required>
                </div> 
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="foodname" value='<?php echo $foodname; ?>' id="price" placeholder="Enter Food name" required>
                </div>
                
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="foodprice" value='<?php echo $foodprice; ?>' id="price" placeholder="Enter Food Price" required>
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
                    <input type="text"  class="form-control" name="quantity" value='<?php echo $foodquantity; ?>' id="price" placeholder="Enter Quantity" required>
                </div> 

                <div class="col-auto my-3">
                <input type="submit" class="btn btn-primary px-5 py-3" name="updatefood" value="update">
                </div>
            </form>
    </form>
</body>
</html>