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
<section class="h-100 container">
          <h3 class="fw-normal mb-0 text-black text-center">Shopping Cart</h3>  
     <div class="r">
            <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><img class="d-inline align-center" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAzIDUxMi4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDMgNTEyLjAwMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMjU2LjAwMSw2NGMtNzAuNTkyLDAtMTI4LDU3LjQwOC0xMjgsMTI4czU3LjQwOCwxMjgsMTI4LDEyOHMxMjgtNTcuNDA4LDEyOC0xMjhTMzI2LjU5Myw2NCwyNTYuMDAxLDY0eiAgICAgIE0yNTYuMDAxLDI5OC42NjdjLTU4LjgxNiwwLTEwNi42NjctNDcuODUxLTEwNi42NjctMTA2LjY2N1MxOTcuMTg1LDg1LjMzMywyNTYuMDAxLDg1LjMzM1MzNjIuNjY4LDEzMy4xODQsMzYyLjY2OCwxOTIgICAgIFMzMTQuODE3LDI5OC42NjcsMjU2LjAwMSwyOTguNjY3eiIgZmlsbD0iIzUwYzZlOSIvPgoJCQk8cGF0aCBkPSJNMzg1LjY0NCwzMzMuMjA1YzM4LjIyOS0zNS4xMzYsNjIuMzU3LTg1LjMzMyw2Mi4zNTctMTQxLjIwNWMwLTEwNS44NTYtODYuMTIzLTE5Mi0xOTItMTkycy0xOTIsODYuMTQ0LTE5MiwxOTIgICAgIGMwLDU1Ljg1MSwyNC4xMjgsMTA2LjA2OSw2Mi4zMzYsMTQxLjE4NEw2NC42ODQsNDk3LjZjLTEuNTM2LDQuMTE3LTAuNDA1LDguNzI1LDIuODM3LDExLjY2OSAgICAgYzIuMDI3LDEuNzkyLDQuNTY1LDIuNzMxLDcuMTQ3LDIuNzMxYzEuNjIxLDAsMy4yNDMtMC4zNjMsNC43NzktMS4xMDlsNzkuNzg3LTM5Ljg5M2w1OC44NTksMzkuMjMyICAgICBjMi42ODgsMS43OTIsNi4xMDEsMi4yNCw5LjE5NSwxLjI4YzMuMDkzLTEuMDAzLDUuNTY4LTMuMzQ5LDYuNjk5LTYuNGwyMy4yOTYtNjIuMTQ0bDIwLjU4Nyw2MS43MzkgICAgIGMxLjA2NywzLjE1NywzLjU0MSw1LjYzMiw2LjY3Nyw2LjcyYzMuMTM2LDEuMDY3LDYuNTkyLDAuNjQsOS4zNjUtMS4yMTZsNTguODU5LTM5LjIzMmw3OS43ODcsMzkuODkzICAgICBjMS41MzYsMC43NjgsMy4xNTcsMS4xMzEsNC43NzksMS4xMzFjMi41ODEsMCw1LjEyLTAuOTM5LDcuMTI1LTIuNzUyYzMuMjY0LTIuOTIzLDQuMzczLTcuNTUyLDIuODM3LTExLjY2OUwzODUuNjQ0LDMzMy4yMDV6ICAgICAgTTI0Ni4wMTcsNDEyLjI2N2wtMjcuMjg1LDcyLjc0N2wtNTIuODIxLTM1LjJjLTMuMi0yLjExMi03LjMxNy0yLjM4OS0xMC42ODgtMC42NjFMOTQuMTg4LDQ3OS42OGw0OS41NzktMTMyLjIyNCAgICAgYzI2Ljg1OSwxOS40MzUsNTguNzk1LDMyLjIxMyw5My41NDcsMzUuNjA1TDI0Ni43LDQxMS4yQzI0Ni40ODcsNDExLjU2MywyNDYuMTY3LDQxMS44NCwyNDYuMDE3LDQxMi4yNjd6IE0yNTYuMDAxLDM2Mi42NjcgICAgIEMxNjEuOSwzNjIuNjY3LDg1LjMzNSwyODYuMTAxLDg1LjMzNSwxOTJTMTYxLjksMjEuMzMzLDI1Ni4wMDEsMjEuMzMzUzQyNi42NjgsOTcuODk5LDQyNi42NjgsMTkyICAgICBTMzUwLjEwMywzNjIuNjY3LDI1Ni4wMDEsMzYyLjY2N3ogTTM1Ni43NTksNDQ5LjEzMWMtMy40MTMtMS43MjgtNy41MDktMS40NzItMTAuNjg4LDAuNjYxbC01Mi4zNzMsMzQuOTIzbC0zMy42NDMtMTAwLjkyOCAgICAgYzQwLjM0MS0wLjg1Myw3Ny41ODktMTQuMTg3LDEwOC4xNi0zNi4zMzFsNDkuNTc5LDEzMi4yMDNMMzU2Ljc1OSw0NDkuMTMxeiIgZmlsbD0iIzUwYzZlOSIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" width="18" height="18" alt="Medal icon">&nbsp;&nbsp;With this purchase you will earn <strong>290</strong> Reward Points.</div>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
            <?php 
            if($_SESSION["userid"]){
                $userid=$_SESSION["userid"];
                $product="select * from cart where userid= $userid";
                $result=mysqli_query($conn,$product);
            }
        ?>
                <tr>
                    <th>Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center"><span class=' bg-danger text-light py-1 px-2'>Clear Cart</span></th>
                </tr>
            </thead>
 
        <?php 
        if($result){ 
            while($row=mysqli_fetch_assoc($result))   
            {
                $id=$row["id"];
                $image =$row["image"];
                $foodname=$row["foodname"];
                $foodtype=$row["foodtype"];
                $price=$row["foodprice"];
                $quantity=$row["quantity"];
                $food_price=array($price);
                $food_value=array_sum($food_price);
                $total_price +=$food_value;
        

    ?>
            <tbody>
                <tr>
                    <td>
                        <div class="product-item">
                            <a class="product-thumb" href="#"><img src='<?php echo" $image";?>' alt='Product'></a>
                            <div class="product-info">
                                <h4 class="product-title"><a href="#"><?php echo "$foodname";?></a></h4>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <h6><?php echo "$quantity"; ?></h6>
                        </div>   
                    </td>
                     <?php
                     echo "<td><a href='cardadd.php?productid=$id&userid=$userid' class='text-decoration-none ms-5 btn-primary col-8 px-5 py-2'>Place Order</a></td>";
                     ?>
                    <td class="text-center text-lg text-medium"><?php echo"$total";?></td>
                    <td class='text-center'><?php echo"<a class='remove-from-cart' href='deletecart.php?deleteid=$id'><i class='fa fa-trash'></i></a>";?></td>
                </tr>
<?php
            }
}
?>
            </tbody>
        </table>
    </div>
    <div class="shopping-cart-footer">
        <div class="column">
            <?php echo "<a class='btn btn-primary' href='cartorderdetails.php'>Placeorder</a>";?>
         </div>
        <div class="column text-lg">Subtotal: <span class="text-medium"><?php  echo $total_price;?></span></div>
    </div>
    <div class='shopping-cart-footer'>
        <div class='column'><a class='btn btn-outline-secondary' href='index.php'><i class='icon-arrow-left'></i>&nbsp;Back to Shopping</a></div>
    </div>
</div>

     </div>              
</section>
</body>
</html> 