<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function pay(){
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var number=document.getElementById("number").value;
    // document.write(name);
    // document.write(email);
    // document.write(number);
	// return false;

var options = { 

     "key": "rzp_test_N4Xdpw74KaXRWc", // Enter the Key ID generated from the Dashboard
    "amount": "1000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Manikandan",
    "description": "TestTransaction",
    "image": "https://example.com/your_logo",
    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name":name,
        "email": email,
        "contact": number,
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#FF0000"
    }
};
var rzp1 = new Razorpay(options);
alert(email);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
alert(name);

});
    rzp1.open();
    alert(name);
    return false;
}

</script>
<form action="razorpay.php" method="get" onsubmit="pay()">
                        <input type="text" name="name" id="name" class="form-control my-5" placeholder="Enter Your name" required ><br>
                        <input type="email" name="email" id="email" class="form-control my-5" placeholder="Enter Your Email Address" required ><br>
                        <input type="number" name="number" id="number" class="form-control" placeholder="Enter phone" required maxlength="10"><br>
                        <button type="submit" value="submit">Pay</button>

</form>
</body>
</html>
