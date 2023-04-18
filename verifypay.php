<?php
include("connect.php");
include("payconfig.php");
require("razorpay-php/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
if (empty($_POST['razorpay_payment_id']) === false)
{
    
  
    $api= new api($keyid,$keysecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>";
             "<p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    $html = "<p>Your payment failed</p>";
            "<p>{$error}</p>";
}

echo $html;
?>