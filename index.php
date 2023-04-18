<?php
session_start();
ini_set("display_errors","1");
error_reporting(E_ALL);
  include("connect.php");
  if(isset($_SESSION['username']))
  {
    $username=$_SESSION['username'];
    $user="select * from signup where username='$username'";
    $push=mysqli_query($conn,$user);
    $pull=mysqli_fetch_assoc($push);
    $id=$pull["userid"];
    $_SESSION["userid"]=$id;
    $getid= $_SESSION["userid"];
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <!-- Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        
        <a class="navbar-brand" href="#"><i><b>RESTAURANT</b></i></a>

   
 
        <button
          class="navbar-toggler ms-auto"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto">
         
            <li class="nav-item">
              <a class="nav-link" href="displaycart.php">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="placeorder.php">Show</i></a>
            </li>

            <!-- <li class="nav-item">
              <?php
              
              // echo "<a class= 'nav-link'href='admindashboard.php'>Food ADD</a>"; 
               ?>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="signup.php"
              
                >SIGNUP</a
              > -->
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
  <div class="search-bar">
  <div class="col-3">
  <form class="col-10" method="post" action="search.php">
    <input class="form-control col-10 " name="search" type="search" placeholder="Search" aria-label="Search"/>
    <input class="btn btn-success" type="submit" name="submit" value="submit" >
        </form>
  </div>

  </div>
</div>
    <!-- navigation end  -->
    <!-- food items section -->
    <div class="container py-3">
      <div class="row">
          <div class="col-md-4">
            <form action="sorting.php" method="post" class="form-group d-flex">
    <select name="sort" class="form-control">
                        <option value="" required>Sort</option>
                        <option name="hightolow" value="hightolow" required>High - low </option>
                        <option  name="lowtohigh" value="lowtohigh" required>Low - High</option>
                    </select>
                       <button type="submit"  name="submit"  href="sorting.php" class="btn btn-primary" >Sorting</button> 
  
            </form>
          </div>
          <div class="col-md-4">
            <form action="sorting.php" method="post" class="form-group d-flex">
    <select name="filter" class="form-control">
                        <option value="" required>Filter</option>
                        <option value="VEG" required>VEG</option>
                        <option value="NON VEG" required>NON VEG</option>
                    </select>
                    <button type="submit" href="sorting.php" name="submit" class="btn btn-primary">Filter</button>
            </form>
          </div>
      </div>
     <div class="slider">
     <h3>Our food items </h3>
      <div class="row">
        <div class="col-md-2">
        <img
        src="./image/download.jpeg"
        alt="Idly"
        class="img-fluid resturant-image rounded-circle"
      /> <br/>
      <label class="ms-5"><h4>Idly</h4></label>

        </div>
        
    <div class="col-md-2">
         <img
         src="./image/dosa.jpeg" alt="dosa"
        class="img-fluid resturant-image rounded-circle"
      /> <br/>
      <label class="ps-md-5"><h4>Dosa</h4></label>
    </div>
    <div class="col-md-2">
         <img
         src="./image/pongal.jpeg" alt="pongal"
        class="img-fluid resturant-image rounded-circle shadow-4-strong"
      /> <br/>
      <label class="ms-4"><h4>pongal</h4></label>
    </div>
    <div class="col-md-2">
         <img
         src="./image/briyani.jpeg" alt="biriyani"
        class="img-fluid resturant-image rounded-circle"
      /> <br/>
      <label class="ms-5"><h4>biriyani</h4></label>
    </div>
    <div class="col-md-2">
         <img
        src="./image/vadai.jpeg"
        alt="vadai"
        class="img-fluid resturant-image rounded-circle"
      /> <br/>
      <label class="ms-5"><h4>vadai</h4></label>
    </div>
    <div class="col-md-2">
         <img
        src="./image/chicken.jpeg"
        alt="Idly"
        class="img-fluid resturant-image rounded-circle"
      /> <br/>
      <label class="ms-5"><h4>chicken65</h4></label>
    </div>
      </div>

     </div>
    </div>

    <!-- Restaurants -->
    <div class='container py-3'>
    <h3>Our food items </h3>

         <div class='row text-dark'>
 <?php    
     $sql = "select id,image,imagename,shopname,shopaddress,foodname,foodtype,foodprice,quantity from admin";
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
        <div class='col-md-4 shadow my-3'>
    <figure class='figure'>
    <a href='product.php?productid=$id&product.php?id=$getid' class='text-decoration-none'>
<img src='$image' class='figure-img img-fluid rounded content-image' alt='$imagename'>
<figcaption class='figure-caption'>  <div class='d-flex flex-column '>
<div class='d-flex justify-content-between'>
  <div> <h4 class='text-dark'>$shopname</div>
  <div>5</div>
  <div>Quantity : $quantity</div>
</div>
<div class='d-flex justify-content-between'>
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
<!-- Footer -->
<footer class="text-center text-lg-start  text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>

    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>RESTAURANT
          </h6>
          <p>
        IF YOUR HURRY! CLICK THE RESTAURTENT
          </p>
        </div>

        <div class="col-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            OUR COMPANY QUOTES
          </h6>
       <p>
       
People who love to eat are always the best people." "To eat is a necessity, but to eat intelligently is an art." "We all eat, an it would be a sad waste of opportunity to eat badly." "If you really want to make a friend, go to someone's house and eat with him...the people who give you their food give you their heart
       </p>
        
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="index.php" class="text-reset">HOME</a>
          </p>
          <p>
            <a href="menu.php" class="text-reset">MENU</a>
          </p>
         
          <p>
            <a href="login.php" class="text-reset">LOGIN</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i>889,VCR NAGAR CHENNAI-9</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            restaurantinfo@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i>+91 9876543219</p>
        </div>
      </div>
    </div>
  </section>

    </footer>
  
  </body>
</html>