<?php
include("connect.php");
ini_set("display_errors","1");
error_reporting(E_ALL);
session_start();
if($_SESSION["userid"]){
$userid=$_SESSION["userid"];
$sql="select * from admin where userid=$userid";
$result=mysqli_query($conn,$sql);


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
    
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
<a href='<?php echo "fooditems.php"?>' class="btn btn-secondary">BACK</a>
    <table class="table">
        <thead>
            <tr>
                <th>FOOD</th>
                <th>FOOD NAME</th>
                <th>SHOP NAME</th>
                <th>SHOP ADDRESS</th>
                <th>SHOP OWNER</th>
                <th>FOOD PRICE</th>
                <th>QUANTITY</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                while($row=mysqli_fetch_array($result)){
                    $image=$row["image"];
                    $foodname=$row["foodname"];
                    $foodprice=$row["foodprice"];
                    $shopname=$row["shopname"];
                    $shopaddress=$row["shopaddress"];
                    $foodquantity=$row["quantity"];
                    $shopowner=$row["shopowner"];
                    $foodid=$row["id"];
                    $_SERVER["foodid"]=$foodid;
                ?>
                <td><?php echo "<img src ='$image' class='img-fluid' style='height:25vh;width:25vw'>";?></td>
                <td><?php echo $foodname;?></td>
                <td><?php echo $shopname;?></td>
                <td><?php echo $shopaddress;?></td>
                <td><?php echo $shopowner;?></td>
                <td><?php echo $foodprice;?></td>
                <td><?php echo $foodquantity;?></td>
                <td><a href='<?php echo "updatefood.php?foodid=$foodid"; ?>' class="btn btn-primary">UPDATE</a></td>
                <td><a href='<?php echo "deletefood.php"; ?>' class="btn btn-danger">DELETE</a></td>





            </tr>
        </tbody>
<?php
}

}
?>
    </table>
</body>
</html>