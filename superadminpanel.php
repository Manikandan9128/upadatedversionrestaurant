<?php
include("connect.php");
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
    <div class="container">
        <h4 class="text-center">ADMIN PANEL</h4>
        <div class="row mt-5">
            <div class="col-md-6">
                <a href='<?php echo "customer.php"?>' class='btn btn-success col-12'>
                    CUSTOMER DETAILS
                </a>
            </div>
            <div class="col-md-6">
                <a href='<?php echo "restaurant.php"?>' class='btn btn-primary col-12'>
                    RESTAURANT DETAILS
                </a>    
            </div>
        </div>
    </div>
    <a href='<?php echo "login.php"?>' class="btn btn-secondary">BACK</a>
</body>
</html>