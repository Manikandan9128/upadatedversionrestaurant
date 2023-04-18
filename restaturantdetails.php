<?php
session_start();
ini_set("display_errors","1");
error_reporting(E_ALL);
include("connect.php");
if(isset($_GET["userid"])){
    $userid=$_GET["userid"];
     $sql="select * from admin where userid=$userid";
     $result=mysqli_query($conn,$sql);
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){

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

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
<table class="table">
        <thead>
            <tr>
                <th>FOOD</th>
                <th>FOOD NAME</th>
                <th>SHOP NAME</th>
                <th>SHOP ADDRESS</th>
                <th>FOOD PRICE</th>
                <th>QUANTITY</th>
                <th>OWNER NAME</th>
                <th>LOGIN ID NAME</th>
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
                    $userid=$row["userid"];
                    $query="select * from signup where userid=$userid";
                    $fetch=mysqli_query($conn,$query);
                    while($pull=mysqli_fetch_array($fetch)){
                        $username=$pull["username"];
                    
                ?>
                <td><?php echo "<img src ='$image' class='img-fluid' style='height:25vh;width:25vw'>";?></td>
                <td><?php echo $foodname;?></td>
                <td><?php echo $shopname;?></td>
                <td><?php echo $shopaddress;?></td>
                <td><?php echo $foodprice;?></td>
                <td><?php echo $foodquantity;?></td>
                <td><?php echo $shopowner;?></td>
                <td><?php echo  $username;?></td>


               





            </tr>
        </tbody>
<?php
}
                }
}
else{
    echo "<div class='bg-danger'>ITEMS NOT FOUND</div>";
}
}

}

?>
    </table>
    <a href='<?php echo "restaurant.php"?>' class="btn btn-secondary">BACK</a>
</body>
</html>