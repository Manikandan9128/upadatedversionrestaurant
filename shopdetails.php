<?php
include("connect.php");
session_start();
if(isset($_POST["shopdetails"])){
    $shopname=$_POST["shopname"];
    $_SESSION["shopname"]=$shopname;

    $shoptype=$_POST["shoptype"];
    $_SESSION["shopaddress"]=$shopaddress;

    $userid=$_SESSION["userid"];
    $shopaddress=$_POST["shopaddress"];
    $_SESSION["shopaddress"]=$shopaddress;
    $ownername=$_POST["ownername"];
    $_SESSION["ownername"]=$ownername;

    $sql="insert into shopdetails(shopname,shoptype,shopaddress,userid,ownername)values('$shopname','$shoptype','$shopaddress','$userid','$ownername')";
    echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result){
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
    <div class="container">
        <h3>SHOP DETAILS</h3>
        <div class="row">
            <div class="col-10">
                <?php
                $userid=$_SESSION["userid"];
                $sql="select * from shopdetails where userid =$userid";
                $result=mysqli_query($conn,$sql);
                $fetch=mysqli_fetch_array($result);
                $shopname=$fetch["shopname"];
                $ownername=$fetch["ownername"];
                $shopaddress=$fetch["shopaddress"];
                $shoptype=$fetch["shoptype"];
                ?>
                <form action="" method="post">
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopname" id="shopname" value='<?php echo $shopname;?>' placeholder="ENTER SHOP NAME" required>
                </div>
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="ownername" id="ownername" value='<?php echo $ownername;?>' placeholder="ENTER SHOP OWNER NAME" required>
                </div>
                <div class="col-auto my-4">
                <select name="shoptype" class="form-control" required>
                        <option  value="0" required>VEG</option>
                        <option value="1" required>NON VEG</option>

                    </select>
                </div>
                <div class="col-auto my-4">
                    <input type="text"  class="form-control" name="shopaddress" id="shopaddress" value='<?php echo $shopaddress;?>' placeholder="ENTER SHOP ADDRESS" required>
                </div>
                <input type="submit" name="shopdetails" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

</body>
</html>