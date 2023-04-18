<form action="razorpay.php" method="get">
                        <input type="text" name="name" id="name" class="form-control my-5" placeholder="Enter Your name" required ><br>
                        <input type="email" name="email" id="email" class="form-control my-5" placeholder="Enter Your Email Address" required ><br>
                        <input type="number" name="number" id="number" class="form-control" placeholder="Enter phone" required maxlength="10"><br>
<button onclick="pay()">Pay</button>

</form>
