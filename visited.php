<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"/>
   
    <!-- Js  -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    <!-- Retrive datas from database -->
    <?php 
        if($_SESSION["userid"]){
            $userid=$_SESSION["userid"];
            $product="select * from visited where userid= $userid";
            $result=mysqli_query($conn,$product);
        }
        ?>
    <div class="container">
        <div class="row mt-5">
            <h3 class="text-center">ORDER PLACED</h3>
            <div class="col-12">
            <table class="table bg-dark text-light my-5">
  <thead>
    <tr>
      <th scope="col">Food</th>
      <th scope="col">Price</th>
      <th scope="col">Rupees</th>
      <th scope="col">Rupees</th>
      
    </tr>
  </thead>
  <?php
      if($result){
            while($row=mysqli_fetch_assoc($result)){
            $image =$row["image"];
            $shopname=$row["shopname"];
            $id=$row["id"];
            $foodname=$row["foodname"];
            $price=$row["foodprice"];
            $food_price=array($price);
            $food_value=array_sum($food_price);
            $total_price +=$food_value;
  ?>
  <tbody>
    <tr>
      <td><?php echo "<img src='$image'>";  ?></td>
      <td><h3><?php echo "$foodname" ?></h3></td>
      <td><h3><?php echo"$price"?></h3></td>
      <td><?php echo"<a class='remove-from-cart' href='deletevisited.php?visitedid=$id'><i class='fa fa-trash'></i></a></td>"?>
      <td><?php echo "<a href='new.php?productid=$id' class='text-decoration-none ms-5 btn-primary col-8 px-5 py-2'>Place Order</a></td>";?>
    </tr>
<?php
}
}

?>
  </tbody>
  TOTAL:<?php echo $total_price;?>
</table>
            </div>
        </div>

    </div>
</body>
</html>