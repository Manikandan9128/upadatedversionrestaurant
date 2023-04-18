<!-- <button id="rzp-button1">Pay</button> -->

<?php
include("connect.php");
include("connect.php");
include("payconfig.php");
require("razorpay-php/razorpay-php/Razorpay.php");
if(isset($_GET["productid"])){
   
     $orderproductid=$_GET["productid"];
    $sql="select * from visited where id=$orderproductid";
   
    $result =mysqli_query($conn,$sql);
  
  $row=mysqli_fetch_array($result);
        $id=$row["id"];
        $image =$row["image"];
        $imagename =$row["imagename"];
        $shopname=$row["shopname"];
        $address=$row["shopaddress"];
        $foodname=$row["foodname"];
        $foodtype=$row["foodtype"];
    $price=$row["foodprice"];
        $userid=$row["userid"];
         $price;
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post">
<input type="text" name="name" id="name" class="form-control my-5" placeholder="Enter Your name" required ><br>
<input type="email" name="email" id="email" class="form-control my-5" placeholder="Enter Your Email Address" required ><br>
<input type="text" name="ph_number" id="ph_number" class="form-control" placeholder="Enter phone" required maxlength="10"><br>
<button type="submit" value="submit" name="pay" id="rzp-button1">Pay</button>

</form>
 <?php
// echo '<pre>';
use Razorpay\Api\Api;
$api= new api($keyid,$keysecret);
$name=$_POST["name"];
$email=$_POST["email"];
$phoneNumber=$_POST["ph_number"];
// header("loca")cCC Z
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => ($price * 100), // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId=$razorpayOrder["id"];
$displayamount=$amount=$orderData["amount"];
// ?> 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
        var totalamount="<?php echo $price; ?>";
        var name="<?php echo $_POST["name"];?>";
        var email="<?php echo $_POST["email"];?>";
        var phonenumber="<?php echo $_POST["ph_number"];?>";
        var image="<?php echo $image;?>";
        var foodname = "<?php echo $foodname;?>";
        var userid = "<?php echo $userid;?>";
        var orderid="<?php echo $razorpayOrderId;?>";
var options = {
    "key": "rzp_test_wyBNhKUUU25EgQ", // Enter the Key ID generated from the Dashboard
    "amount": (totalamount * 100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Manikandan",
    "description": "TestTransaction",
    "image": "https://example.com/your_logo",
    "orderid": orderid, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        console.log(response);
    // alert("success"+response.razorpay_payment_id);

    // window.location.href = 'foodpaid.php';
    alert(response.razorpay_order_id);
    alert(response.razorpay_signature);
        $.ajax({
    url: 'payment.php',
    type: 'post',
    dataType: 'json',
    data: {
razorpay_payment_id: response.razorpay_payment_id, totalamount: totalamount, name: name, email: email,phonenumber: phonenumber, image: image,foodname: foodname,userid: userid,orderid: orderid,
},
success: function (msg) {
window.location.href = 'foodpaid.php';

}
});
    },
    "prefill": {
        "name": "<?php echo $name;?>",
        "email": "<?php echo $email;?>",
        "contact": "<?php echo $phoneNumber;?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc",
        "width":"100vw"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    alert(response);
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
var name="<?php echo $name;?>";
var email="<?php echo $email;?>";
var phnumber = "<?php echo $phoneNumber;?>";
if(name!="" && email!="" && phnumber!=""){
  
    rzp1.open();
} 
</script>

</body>
</html>
