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
            $product="select * from rapzorpayment where userid= $userid";
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
      <th scope="col">PRICE</th>
      <th scope="col">FOODNAME</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">PAYMENT STATUS</th>
      <th scope="col">PHONE NUMBER</th>
      <th scope="col">ORDER PLACED DATE</th>


      
    </tr>
  </thead>
  <?php
      if($result){
            while($row=mysqli_fetch_assoc($result)){
                $image=$row["image"];
                $price=$row["amount"];
                $foodname=$row["foodname"];
                $useraddress=$row["useraddress"];
                $paymentstatus=$row["paymentstatus"];
                if( $paymentstatus==1){
                  $payamentvalue="PAID";
                }
                $phonenumber=$row["phnumber"];
                $date=$row["dateofpay"];
                $quantity=$row["quantity"];

     
  ?>
  <tbody>
    <tr>
      <td><?php echo "<img src='$image'>";?></td>
      <td><h4><?php echo"$price"?></h4></td>
      <td><h4><?php echo "$foodname" ?></h4></td>
      <td><h5><?php echo "$useraddress" ?></h5></td>
      <td><h5 class="text-white"><?php echo $payamentvalue;?></h5></td>
      <td><h5><?php echo "$phonenumber" ?></h5></td>
      <td><h5><?php echo "$date" ?></h5></td>
      <td></td>
    </tr>
<?php
}
}

?>


  </tbody>
</table>
            </div>
        </div>

    </div>
</body>
</html>