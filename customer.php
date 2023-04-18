<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- font awasome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- Bootsrap css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>    
<!-- CSS -->
<link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
    <h3 class="text-center">CUSTOMER's DETAILS</h3>
    <!-- Customer details retrive from signup table  -->
    <?php 
    $sql="select * from signup";
    $result=mysqli_query($conn,$sql);
  
    ?>
    <table class="table">

        <thead>
            <tr>
                <th>USER ID </th>
                <th>USER NAME</th>
                <th>STATUS</th>
                <th>CHANGE STATUS</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                  while($row=mysqli_fetch_array($result)){
                   $usertype=$row["usertype"];
                    if($usertype=='0'){
                    $userid=$row["userid"];
                    $_SESSION["customerid"]=$userid;
                    $username=$row["username"];
                    $_SESSION["customername"]=$username;
                    $userstatus=$row["status"];
                    
                ?>
                <td class="bg-dark"><a href='<?php echo "customerdetails.php?customer=$userid"?>' class=''><?php echo $userid; ?></a></td>
                <td  class="bg-dark"><a href='<?php echo "customerdetails.php?customer=$userid"?>' class='bg-dark'><?php echo $username; ?></a></td>
                <?php
                  if($userstatus==0){
                    $userstatus="DEACTIVE"; 
                }
                    if($userstatus==1){
                        $userstatus="ACTIVE";
                    }
                  

                ?>
                <td><?php echo $userstatus ; ?></td>
                <?php
                // if()
                ?>
                <td> <a href='<?php echo "activeordeactiveuser.php?userid=$userid"?>' class="btn btn-success">ACTIVATE</a></td>
            </tr>
            <?php
    
}
                  }
    ?>
        </tbody>
    </table>
    <a href='<?php echo "superadminpanel.php"?>' class="btn btn-secondary">BACK</a>
</body>
</html>