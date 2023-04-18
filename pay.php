<?php
session_start();
include("connect.php");
include("payconfig.php");
require("razorpay-php/razorpay-php/Razorpay.php");
$useraddress=$_SESSION["useraddress"];
if(empty($_SESSION["email"])){
    header("location.php");
}
else{
    $pid=$_SESSION["productid"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>payment</title>
<!-- Bootsrap css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<!-- JQuery -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- CSS -->
    <!-- font awasome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./style.css" ?v=<?php echo time(); ?>/>
</head>
<body>
<?php
use Razorpay\Api\Api;
$api= new api($keyid,$keysecret);
$uid=$_SESSION["userid"];
$pid=$_SESSION["productid"];
$name= $_SESSION["name"];
$email=$_SESSION["email"];
$phnumber =$_SESSION["phnumber"];
$address= $_SESSION["address"];
$sql="select * from admin where id=$pid";
$result =mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
$id=$row["id"];
$image =$row["image"];
$imagename =$row["imagename"];
$shopname=$row["shopname"];
$address=$row["shopaddress"];
$shopowner=$row["shopowner"];
$foodtype=$row["foodtype"];
$price=$row["foodprice"];
$quantity=$row["quantity"];
$_SESSION["quantity"]=$quantity;
$foodname=$row["foodname"];
}
$displayCurrency="INR";
$imageurl="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAABI1BMVEX//////v////0AAPj///sAAPsAAPcAAPH///n///cAAPQAAOoAAPD//P8AAP7//vz4/P8AAOUlIt0AAOF6edkAANzJx/Pb2vOMjdcAANn///G9ve4kJOQAANT+/PX//vO2uvGqrfOWmO5BQuyytvHMyuro7vsWF+A4OetKSexTVOlcXehtb+fh5f309f4AAMf//+mzrelzcNFeYeSChuCepuR3fe328ftNUNE7PtxoatrN1fhHS96Pj+ctMc+eneplYtx/gdbc6/ZJTtrI0euoq/QsK9gxMuw3OOtlZettbuqXnOBHQtbh4vu5wu5WVNWOk9ikqdw4NtCFhu5aY9jLwu7a1/q1t+QkH+5SVvPV2+06Ps6MjvB4etVXWdDh7uwvLrrH4XaHAAAQSUlEQVR4nO2dCWPTxraAZ0Yzo1m1WFGM5dhKIJHLYpGFmBtnb9K0EDBQetNbyn19//9XvDNyElK2BxSwwfrAtLZsZ+bozNnmSEGopqampqampqampqampqampqampqampqampqampqampqampqampqampuZbIKQ4lyiXVlBBMJ70cCYBDrEUa+srJAMByEyQSQ9oEhArl3UQbxRZaC1Fs6gIVOAo9X3N43sRAiHQSQ9oApCQjIyvta90uilFOJNrwZLryjtY6qgg0I1FkIl1y2G2loRFL5kakPvXOpx7+l9NktMwF1KSGRIDFfse30KY9IctplR8p0DY4jAkM7QqqNyOVbydW4S2d2LDvHQ3yrOuxXLSI/tqEND5PR7fQN2QIrG8AGZBdZZpRvHs6AERVra10UMkuiGmdv+uCpTemkcEg3SoqN4z6UF+aUQYygPF9XMUZgIJWsy1lGHxxmOUd20lA/LdxwxU4tVyjxn/ILJgCyUh/aNYKS89vC8laALw3esBlZbKoqG0v9eX3VCElqDRia9MkJ7CQgmF+O7VADQdY5JHW8Z46WYk3YxpLpdgQfh8YREOfo8yqPJj4jh/KimyMjqIlad3HoNHFAjOfrmbct+LHzWdXXTLAZPXePdPmPrQAnKCEObkwI5qyARncik2hqWnYCSpoFTS/iCGmCkd9gUOBcZvTB9f8urLiTMfVR1iqqNMmIIAjX8NBNrw4+1Es3in70wh+ExJt49io0yy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";
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => ($price * 100), // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId=$razorpayOrder["id"];
$_SESSION["razorpayorderid"]=$razorpayOrderId;
$displayamount=$amount=$orderData["amount"];
if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
    "key"               => $keyid,
    "amount"            => $amount,
    "name"              => "FOOD SEA",
    "description"       => "Tron Legacy",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => "$name",
    "email"             => "$email",
    "contact"           => "$phnumber",
    ],
    "notes"             => [
    "address"           => "$address",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
    ?>
    <div class="container">
        <center>
        <h4>PAYER DETRAILS</h4>

        </center>
        <div class="row  my-5">
      
            <div class="col-8 shadow">
            <a  href="orderdetails.php"class="ms-auto"><i class="fas fa-edit"></i></a>


               <div class="my-5 shadow-sm">NAME: <?php echo $name;?></div>
               <div class="my-5 shadow-sm">EMAIL: <?php echo $email;?></div>
               <div>PHONE NUMBER: <?php echo $phnumber;?></div>
               <div class="my-5 shadow-sm">ADDRESS: <?php echo $useraddress;?></div>
              
            </div>
            <div class="col-4 shadow py-4 ms-4">
            <?php echo "<img src='$image' class='figure-img img-fluid rounded content-image'  alt='$imagename'>
            <div class='d-flex justify-content-between'>
            <div>FOOD NAME: $foodname<?div> 
            <div class= 'mt-2'>FOOD PRICE: <span class='bg-primary p-2 text-white'>$price<?span><?div>
            </div>
            "?>
            </div>
            <center>

<!-- manual -->
<button id="rzp-button1" class="btn btn-primary px-5 mt-3" name="razorpay">PAY</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
var options = <?php echo $json?>;
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
options.theme.image_padding = false;
options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    escape: true,
    backdropclose: false
};
var rzp = new Razorpay(options);
rzp.on('payment.failed', function (response){
    alert(response);
        alert("payment faileds");
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);

        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
            </center>
        </div>
    </div>
</body>
</html>