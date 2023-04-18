<?php
session_start();
include("connect.php");

 $foodid=$_GET["ratingid"];
$_SESSION['foodid']=$foodid;

   if(isset($_GET["foodid"]) && isset($_POST["submit"])){
       $ratingdata=$_POST["ratingvalue"];
        $username=$_POST["username"];
        $userreview=$_POST["userreview"];
        $foodid=$_GET['foodid'];
       $sql="insert into `reviews` (ratingdata,username,userreview,foodid) values ('$ratingdata','$username','$userreview','$foodid')";
       echo $sql;
       exit;
       $result=mysqli_query($conn,$sql);
       
      }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  <!-- Bootsrap css -->
    <link
      rel="stylesheet"
      href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"/>
   
    <!-- Js  -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
</head>
<body>
<?php
include("connect.php");
?>
<div class="container">
  <div class="row">
  <form action="ratingfood.php" method="post"class="form-group">

    <div class="col-4">
  <select name="ratingvalue" id="" class="form-control" >
  <option value="1">Rating</option>
    <option value="1">1</option>
    <option value="1">2</option>
    <option value="1">3</option>
    <option value="1">4</option>
    <option value="1">5</option>
  </select><i class="fa-regular fa-star submit-star"></i>
 
    </div>
    <div class="col-4">
    <div class="d-flex flex-column">
  <input class="form-control"  type="text" name="username" placeholder="Enter your name" required>
  <textarea class="form-control my-3" name="userreview"  placeholder="Enter Review" id="" cols="5" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
    </div>
    </form>

  </div>

</div>
</body>
</html>
