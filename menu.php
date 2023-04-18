<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mani</title>
    <!-- Bootsrap css -->
    <link
      rel="stylesheet"
      href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"/>
   
    <!-- Js  -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css"/>
  </head>
  </body>
  <div class='container py-3'>
         <div class='row text-dark'>
       <h3>Our food items </h3>
    <?php    $sql = "select id,image,imagename,shopname,shopaddress,foodname,foodtype,foodprice,quantity from admin";
    $result =mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $id=$row["id"];
        $image =$row["image"];
        $imagename =$row["imagename"];

        $shopname=$row["shopname"];
        $address=$row["shopaddress"];
        $foodtype=$row["foodtype"];
        $price=$row["foodprice"];
        $quantity=$row["quantity"];

        
        echo "    
        <div class='col-md-6'>
    <figure class='figure'>
    <a href='product.php?productid=$id' class='text-decoration-none'>
<img src='$image' class='figure-img img-fluid rounded content-image' alt='$imagename'>
<figcaption class='figure-caption'>  <div class='d-flex flex-column'>
<div class='d-flex justify-content-between content-menu'>
  <div> <h4 class='text-dark'>$shopname</div>
  <div>5</div>
  <div>Quantity : $quantity</div>
</div>
<div class='d-flex justify-content-between content-menu'>
  <div>$address</div>
  " ;         
  if($foodtype=="VEG"){
  echo "<div class='bg-success text-white ms-4 py-2 px-3'>$foodtype</div>";
}
else{
  echo "<div class='bg-danger text-white py-2 px-2 mx-2'>$foodtype</div>";

}


  echo "<div class='bg-primary text-white py-2 px-2'>RS:$price</div>
</div></figcaption>
</a>
</figure>
      </div> ";
   

}

?>
</div>
</div>
</body>
</html>
  
