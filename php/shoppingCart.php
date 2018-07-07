<?php 
require_once('helper.php');
$priceCart=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Building - Shopping Cart</title>
    <meta name="description" content="Home page of Green Building Project">
    <meta name="author" content="lq3297401 / https://github.com/lq3297401">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='icon' href='../assets/images/icons/tempLogo.ico' type=‘image/x-ico’>
    <link rel="stylesheet" href="../assets/cssLib/bootstrap.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/shoppingCart.css">
</head>

<body>
<script type="text/javascript" src="../assets/jsLib/jquery1.4.min.js"></script>
<script src="../assets/jsLib/jquery.min.js"></script>
<script src="../assets/jsLib/bootstrap.min.js"></script>
<script src="../js/PHPheaderFooter.js"></script>
<script src="../js/shoppingCart.js"></script>
<!-- Top Bar
       ================================================== -->
<div id="headerPHP"></div>

<div id="shopping_top" class="overlay">
    <div class="container">
        <div class="content-heading text-center">
            <h2>GET FREE SHIPPING WITH JUST LIGHT!</h2>
            <p><b>Members</b> receive free shipping for purchase <b>$200</b> or more. </p>
            <p><b>Non-members</b> receive free shipping for purchase <b>$400</b> or more. </p>
        </div>
    </div>
</div>

<!--order detail-->
<div id="orderDetail" class="container">
    <div class="row">
        <!-- orderList Bar
        ================================================== -->
        <div id="orderList" class="col-md-8">
            <!-- 1 item detail
            ================================================== -->
            <div id="1reviewItems" class="col-md-12">
                <div class="orderStep">
                    <h4>1. Review Items And Shipping</h4>
                </div>

                <div class="productList">
                    <div class="singleProduct row">
                        <div class="shoppingCartDetails">
                        <?php
                        ShowShoppingCart();
                        ?>
                    </div>
                    </div>
                </div>
                <hr>
                <input id="continueShopping" class="checkoutBtn" type="button" value="Continue Shopping" onclick="window.location.href='../php/productList_all.php'"/>
                <input id="emptyCart" class="removeItem" type="button" value="Empty Cart"  onclick=""/>
                <hr>
            </div>

            <!-- 2. address
            ================================================== -->
            <div id="2address" class="col-md-12">
                <div class="orderStep">
                    <h4>2. Shipping Address</h4>
                </div>
                
                    <div id="ShippingAddress">
                    <?php
                    ShippingAddress();
                    ?>
                    </div>
                    <input id="addressNew" type="radio" name="shipping" value="addressNew" onclick="displayAddNewAddress()">
                    <label for="addressNew">+ Add New Address</label>

                
                <hr>
                <div id="changeAddressArea" style="display:none;">
                    <input type="text" id="fullName" placeholder="Full Name" />
                    <input type="text" id="address" placeholder="Address" />
                    <label class="containerCheck smallfont">Save this address to my address book
                        <input id="saveToAddress" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <!--<input id="useAddress" class="removeItem" type="button" value="&#10003; Use This Address" />-->
                    <hr>
                </div>
            </div>
            <!-- 3. Payment method
            ================================================== -->
            <div id="3payment" class="col-md-12">
                <div class="orderStep">
                    <h4>3. Payment method</h4>
                </div>

                
                    <div id="addPayment">
                    <?php PaymentOptions(); ?>
                </div>
                    <input id="paymentNew" type="radio" name="payment" value="paymentAddNew" onclick="displayAddNewPayment()"/>
                    <label for="paymentNew">+ Add New Payment Method</label>
                
                <hr>
                <div id="changePaymentArea" style="display:none;">
                    <input type="text" id="nameOnCard" placeholder="Name On Card" class="col-md-12" />
                    <input type="text" id="cardNumber" placeholder="Card Number" class="col-md-12" />
                    <input type="number" id="dateCard" placeholder="Date" class="col-md-3" />
                    <input type="number" id="yearCard" placeholder="Year" class="col-md-3" />
                    <input type="number" id="cvv" placeholder="CVV" class="col-md-6"/>
                    <button id="saveToPayment">Save</button>
                   <!--  <label class="containerCheck smallfont">Save this address to my payment book
                        <input id="saveToPayment" type="checkbox"/>
                        <span id="paymentCheck" class="checkmark"></span>
                    </label> -->
                    <!--<input id="useAddress" class="removeItem" type="button" value="&#10003; Use This Address" />-->
                    <hr>
                </div>
            </div>
            <!-- 4. billing
            ================================================== -->
            <div id="4billing" class="col-md-12">
                <div class="orderStep">
                    <h4>4. Billing Address</h4>
                </div>
                <form action="">
                    <input id="sameBilling" type="radio" name="billing" value="billing1" checked>
                    <label for="sameBilling">Same As The Shipping Address</label><br>
                    <input id="newBilling" type="radio" name="billing" value="billingNew" onclick="displayAddNewBilling()">
                    <label for="newBilling"> + Add New Billing Address</label>
                </form>
                <hr>
                <div id="changeBillingArea" style="display:none;">
                    <input type="text" placeholder="Full Name" />
                    <input type="text" placeholder="Billing Address" />
                    <label class="containerCheck smallfont">Save this address to my payment billing address book
                        <input id="saveTobBilling" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <!--<input id="useAddress" class="removeItem" type="button" value="&#10003; Use This Address" />-->
                    <hr>
                </div>
            </div>

            <!-- 5. note
            ================================================== -->
            <div id="5note" class="col-md-12">
                <div class="orderStep">
                    <h4>5. Leave Notes</h4>
                </div>
                <textarea id="orderNote" placeholder="Leave Your Notes Here If Needs" ></textarea>
            </div>

            <!-- Total price
            ================================================== -->
            <div class="col-md-12">
                <hr>
                <h3>Order Total (without shipping): $<?php echo (($_SESSION['priceCart']) + ($_SESSION['priceCart'])*.12) ?></h3>
            </div>
        </div>

        <!-- checkOut Bar
        ================================================== -->
        <div id="checkOut" class="col-md-4">
            <div class="row">
                <h4>SUMMARY</h4>
                <hr>
                <h5 class="text-left col-sm-6">SUBTOTAL</h5>
                <h5 class="text-right col-sm-6">$<?php echo $_SESSION['priceCart'] ?></h5>
                <hr>
            </div>

            <div class="row">
                <h5 class="text-left col-sm-6">ESTIMATED TAX</h5>
                <h5 class="text-right col-sm-6">$<?php echo (($_SESSION['priceCart'])*.12);?></h5>
                <hr>
            </div>

            <div class="row">
                <h5 class="text-left col-sm-6">ESTIMATED SHIPPING</h5>
                <h5 class="text-right col-sm-6">$20.00</h5>
                <hr>
            </div>

            <div class="row vertical-align">
                <h5 class="text-left col-sm-6">PROMO CODE</h5>
                <input id="promoCode" class="col-sm-6" type="text"/>
            </div>
            <div class="row col-sm-12"><input id="applyPromo" class="removeItem" type="button" value="Apply Promo Code"/></div>

            <div class="row">
                <hr>
                <h3 class="text-left col-sm-6">TOTAL:</h3>
                <h3 class="text-right col-sm-6">$<?php echo (($_SESSION['priceCart']) + ($_SESSION['priceCart'])*.12+20) ?></h3>
                <hr>
            </div>

            <div class="row col-sm-12">
                <input id="checkOut_btn" class="checkoutBtn" type="button" value="Checkout"/>
                <h3 class="text-center">OR</h3>
                <input type="image" class="grayBtn" src="../assets/images/icons/paypal_small.png" height="35px"/>
            </div>
        </div>
    </div>
</div>

<!-- footer and go to top button
            ================================================== -->
<div id="footerPHP"></div>

<!-- javascript
    ================================================== -->


<!--add new address/payment/billing-->
<script>
    function displayAddNewAddress() {
        var x = document.getElementById("changeAddressArea");
        if (x.style.display === "none") {
            x.style.display = "block";

        } else {
            x.style.display = "none";
        }
    }

    function displayAddNewPayment() {
        var x = document.getElementById("changePaymentArea");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function displayAddNewBilling() {
        var x = document.getElementById("changeBillingArea");
        if (x.style.display === "none") {
            x.style.display = "block";

        } else {
            x.style.display = "none";
        }
    }

    function applyPromo() {
        var x = document.getElementById("discountArea");
        if (x.style.display === "none") {
            x.style.display = "block";
            var tempTotal =  document.getElementById("totalPrice");

            document.getElementById("totalPrice").innerHTML = "TOTAL: $152.97";
        } else {
            x.style.display = "none";
        }
    }
</script>

</body>
</html>