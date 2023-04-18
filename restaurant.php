<?php
include("connect.php");
session_start();

$sql="select * from signup where usertype=1";
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

    
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    <a href="addresturantadmin.php" class="btn btn-success">ADD RESTAURANT</a>
<table class="mx-4 table">
    <thead>
        <tr>
            <th>SHOP  USER NAME</th>
            <th>SHOP USER STATUS</th>
            <th>SHOP STATUS CHANGE</th>
            <th>EDIT</th>


        </tr>
    </thead>
    <tbody>
        <?php
        while($row=mysqli_fetch_array($result)){
           $userid=$row["userid"];
            $username=$row["username"];
            // $shopaddress=$row["shopaddress"];
            // $shopstatus=$row["shopstatus"];
        ?>
        <tr>
            <td><a href=""><?php echo  $username?></a></td>
            <?php
          
            $usertype=$row["usertype"];//
            $userstatus=$row["status"];
            if($userstatus == 1){
                $userstatus="ACTIVE";
            }
            if($userstatus == 0 ){
                $userstatus="DEACTIVE";
            }
            ?>
            <td> <?php echo  $userstatus?></td>
            <td><a href='<?php echo "activeordeactiveuser.php?usershopid=$userid"?>' class="btn btn-warning">CLICK</a></td>
            <td><a href='<?php echo "resturantdetailedit.php?userid=$userid"?>' class="btn btn-primary">EDIT</a></td>


        </tr>
        <?php
}
?>
    </tbody>
</table>
<a href='<?php echo "superadminpanel.php"?>' class="btn btn-secondary">BACK</a>
</body>
</html>