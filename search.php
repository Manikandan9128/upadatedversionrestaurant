<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


$id= $_SESSION["userid"];
include("connect.php");

echo $_POST["data"];
 $search=$_POST["data"];

//  $_SESSION["search"]=$search;

$sql="select * from `admin` where  foodname like '%$search%' or shopname like '%$search%' or shopaddress like '%$search%' or (foodname and shopname like '%$search%')";

  $result=mysqli_query($conn,$sql);
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
       <!-- Bootsrap css -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>

</div>
<div class='container pt-3'>
        <div class='row'>
                    <?php 
                    if(empty($_POST["data"])){
                      exit;
                    }
                    if(mysqli_num_rows($result)==0){
                        echo "<div class='text-warning'>NO DATA FOUND </div>";
                    }
        if($result){ 
            while($row=mysqli_fetch_assoc($result))   
            {
                $id=$row["id"];
                $image =$row["image"];
                $foodname=$row["foodname"];
                $foodtype=$row["foodtype"];
                $price=$row["foodprice"];
                $shopname=$row["shopname"];
                $address=$row["shopaddress"];
                $shopowner=$row["shopowner"];
                $quantity=$row["quantity"];
          
            
        

    ?>
            
                        <div class="col-12 my-1">
                            <!-- <a class="product-thumb" href='<?php echo "product.php?productid=$id"; ?>'><img src='<?php echo" $image";?>' style="height:8vh;width:15vw;" alt='Product'> -->
                                        
                                     <span class="product-title text-secondary mx-3"><?php echo "$foodname";?></span>
                      <span class="text-center text-lg text-medium text-secondary"><?php echo"$shopname";?></span>
                    <span class="text-center text-lg text-medium text-secondary mx-3"><?php echo"$address";?></span></a>
            
              
                    </div>   
                    </div>
                    </div>
<?php
            }
          
} 
?>
            </tbody>
        </table>
    </div>
</body>
</html>