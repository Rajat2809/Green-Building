<?php 
require_once("DBComponent.php");
require_once("AuthSoapClient.php");
require_once("CommandEnum.php");
session_start();

function generate_product_grids($opts = array()) {
    $client = new AuthSoapClient(
        null, 
        array(
            'location'=>$GLOBALS["location"],
            'uri'=>$GLOBALS['uri'],
            'trace'=>true
        )
    );
    // create the database component

    $priceMin=0;
    $priceMax=9999999;
    $reviewStart=0;
    $categorySort='P.unit_price';
    $ProductCategory='Lights';

    if(isset($opts['categoryName']))
    {
        $ProductCategory=$opts['categoryName'];
    }
    

    if(isset($opts['priceMin']) && isset($opts['priceMax']))
    {
        // $whereClause=' WHERE ';
      if($opts['priceMin']==25 && $opts['priceMax']==0)
      {
     		// $priceParams=" P.unit_price<25 ";
        $priceMin=0;
        $priceMax=25;
    }
    elseif ($opts['priceMin']==100 && $opts['priceMax']==0) {
        $priceMin=100;
        $priceMax=9999999;

    }
    else
    {
       $priceMin=$opts['priceMin'];
       $priceMax=$opts['priceMax'];
   }

}

if(isset($opts['review']))
{

    $reviewStart =$opts['review'];
}
if(isset($opts['categorySort']))
{

    if ($opts['categorySort']=='PNAZ') {
        $categorySort='P.product_name';
    } 
    else if($opts['categorySort']=='PHL') {     
        $categorySort='P.unit_price desc';
        
    }
    elseif ($opts['categorySort']=='RHL') {
        $categorySort='P.rate_average desc';
    }
    else {
        $categorySort='P.unit_price';
    }
}
// $sql="Select distinct P.product_id,P.product_name,P.description,P.unit_price,P.picture from Product P Left join Product_rating Pr on P.product_id=Pr.product_id ".$whereClause.$priceParams.$reviewParams.$categorySort.";";
$ProductDetails = array();
if(isset($opts['searchVal'])&& isset($opts['custom']) && $opts['custom']=='false')
{
    $searchVal=$opts['searchVal'];
        
        
        $ProductDetails = $client->SoapCommand(Command::SearchProduct,array($searchVal));
    // $sql="Select product_id,product_name,description,unit_price,picture from Product Where product_name like '%".$opts['searchVal']."%';";
}

else
{

$ProductDetails = $client->SoapCommand(Command::ShowProductList,array($ProductCategory,$categorySort,$priceMin,$priceMax,$reviewStart,5));
}
for($product=0;$product<count($ProductDetails);$product++)
{
    ?>


    <div class="col-md-3 ProductTemplate">
     <div class="" >
        <div onClick="location.href='productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>';" class="product-grid" >
            <div class="product-grid-head">
                <div class="product-pic">
                    <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>"><img src="../assets/images/products/lightExp.png" title="product-name" /></a>
                    <p>
                       <span style="font-size: 12px"><a href="#"><?php echo  $ProductDetails[$product]["product_name"];?></a></span>
                       <span id="ProductDetails"><?php echo $ProductDetails[$product]["brand_name"];?></span>
                   </p>
               </div>
           </div>
           <div class="product-info">
            <div class="product-info-cust" >
                <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>">Details</a>
            </div>
            <div class="product-info-price">
                <a><?php echo "$".$ProductDetails[$product]["unit_price"];?></a>
            </div>
            <div class="clear"> </div>
        </div>
            <?php
            $loginType = $_SESSION['loggedin'];
            if ($loginType == 1){ 
                ?>
                <div class="addToCart" >
                    <a href="shoppingCart.php" id="insertToCart" data-productName="<?php echo  $ProductDetails[$product]["product_name"];?>" data-brandName="<?php echo $ProductDetails[$product]["brand_name"] ?>" data-unitPrice="<?php echo $ProductDetails[$product]["unit_price"]  ?>"> <span> </span></a>
                </div>
            <?php } else { ?>
                <div class="addToCart">
                    <a  href="signIn.php" <!-- onclick="alertSignIn()" --> ><span> </span></a>
                    <script>
                        function alertSignIn() {
                            var txt;
                            if (confirm("Please Sign In First To Add Items Into Shopping Cart!!")) {
                                txt = "You pressed OK!";
                            } else {
                                txt = "You pressed Cancel!";
                            }
                        }
                    </script>
                </div>
            <?php } ?>
    </div>
</div>
</div>
<?php
}
}
?>
<?php
function PopularProduct($opts=array())
{
  $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
  
  $ProductDetails = array();
  $ProductDetails = $client->SoapCommand(Command::ShowPopularProduct,null);
  for($product=0;$product<count($ProductDetails);$product++)
  {

    ?>
    <div class="col-md-5ths">
        <div onClick="location.href='productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>';" class="product-grid">
            <div class="product-grid-head">
                <div class="product-pic">
                    <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>"><img src="../assets/images/products/lightExp.png" title="product-name" /></a>
                    <p>
                        <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>"><?php echo $ProductDetails[$product]["product_name"];?></a>
                        <span><?php echo $ProductDetails[$product]["brand_name"];?></span>
                    </p>
                </div>
            </div>
            <div class="product-info">
                <div class="product-info-cust">
                    <a href="productDetail.php?productName=<?php echo $ProductDetails[$product]["product_name"];?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>">Details</a>
                </div>
                <div class="product-info-price">
                    <a><?php echo "$".$ProductDetails[$product]["unit_price"];?></a>
                </div>
                <div class="clear"> </div>
            </div>
            <?php
            $loginType = $_SESSION['loggedin'];
            if ($loginType == 1){ ?>
                <div class="addToCart">
                    <a href="shoppingCart.php"> <span> </span></a>
                </div>
            <?php } else { ?>
                <div class="addToCart">
                    <a  href="signIn.php" onclick="alertSignIn()"><span> </span></a>
                    <script>
                        function alertSignIn() {
                            var txt;
                            if (confirm("Please Sign In First To Add Items Into Shopping Cart!!")) {
                                txt = "You pressed OK!";
                            } else {
                                txt = "You pressed Cancel!";
                            }
                        }
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
}
?>
<?php
function RelatedProduct($opts=array())
{
  $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
  $productName=$opts[0];
  $brandName=$opts[1];
  $ProductDetails = array();
  $ProductDetails = $client->SoapCommand(Command::ShowRelatedProduct,array($productName,$brandName));
  for($product=0;$product<count($ProductDetails);$product++)
  {

    ?>
    <div class="col-md-5ths">
        <div onClick="location.href='productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>';" class="product-grid">
            <div class="product-grid-head">
                <div class="product-pic">
                    <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>"><img src="../assets/images/products/lightExp.png" title="product-name" /></a>
                    <p>
                        <a href="productDetail.php?productName=<?php echo urlencode($ProductDetails[$product]["product_name"]);?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>"><?php echo $ProductDetails[$product]["product_name"];?></a>
                        <span><?php echo $ProductDetails[$product]["brand_name"];?></span>
                    </p>
                </div>
            </div>
            <div class="product-info">
                <div class="product-info-cust">
                    <a href="productDetail.php?productName=<?php echo $ProductDetails[$product]["product_name"];?>&brandName=<?php echo $ProductDetails[$product]["brand_name"]?>">Details</a>
                </div>
                <div class="product-info-price">
                    <a><?php echo "$".$ProductDetails[$product]["unit_price"];?></a>
                </div>
                <div class="clear"> </div>
            </div>
            <?php
            $loginType = $_SESSION['loggedin'];
            if ($loginType == 1){ ?>
                <div class="addToCart">
                    <a href="shoppingCart.php"> <span> </span></a>
                </div>
            <?php } else { ?>
                <div class="addToCart">
                    <a  href="signIn.php" onclick="alertSignIn()"><span> </span></a>
                    <script>
                        function alertSignIn() {
                            var txt;
                            if (confirm("Please Sign In First To Add Items Into Shopping Cart!!")) {
                                txt = "You pressed OK!";
                            } else {
                                txt = "You pressed Cancel!";
                            }
                        }
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
}
?>
<?php
function ProductReview($productName,$brandName)
{
   $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
   
   $productReview = array();

   $productReview = $client->SoapCommand(Command::ShowAllProductRating,array($productName,$brandName));
   for($review=0;$review<count($productReview);$review++)
   {
       ?>
       <hr class="review">
       <div class="reviewHistory">
        <h5><?php echo $productReview[$review]['first_name'].' '.$productReview[$review]['last_name']; ?></h5>
        <p><?php echo $productReview[$review]['create_time']; ?></p>
        <ul class="pro-rate">
            <li class="product-rate">
                <div class="">
                    <?php
                    for($star=0;$star<5;$star++)
                        if($star<$productReview[$review]['rate'])
                        {
                            ?>
                            <span class="fa fa-star checked"></span>
                        <?php } 
                        else
                            { ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <p><?php echo $productReview[$review]['comment']?></p>
            </div>
            <?php   
        }
    }
    ?>

    <?php 
    function ShowShoppingCart($opts = array())
    {
         $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
         $email=(string)$_SESSION["userid"];
         if(isset($opts['productName']) && isset($opts['brandName']))
         {
            $productName=$opts['productName'];
            $brandName=$opts['brandName'];
            $client->SoapCommand(Command::DeleteShoppingCart,array($email,$productName,$brandName));
    
         }
        
       
        $shoppingCart=array();
        $priceCart=0;
        $shoppingCart=$client->SoapCommand(Command::ShowShoppingCart,array($email));
         for($cart=0;$cart<count($shoppingCart);$cart++)
   {

    $priceCart+=$shoppingCart[$cart]['total_price'];
        ?>

        <div class="col-md-3">
                            <img class="productImg" src="../assets/images/products/detailExp1.jpg" alt="product image 1" style="">
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-10">
                                <h5><?php echo $shoppingCart[$cart]["product_name"];?></h5>
                                <h5>By: <?php echo $shoppingCart[$cart]["brand_name"];?></h5>

                                <label style="padding:0" for="quantityInput"><h5>Quantity : </h5></label>
                                <input id="quantityInput" type="number" size="10" name="quantityNumber" value="<?php echo $shoppingCart[$cart]["quantity"];?>" style="width: 100px"/><br>
                            </div>
                            <div class="col-md-2 text-right">
                                <h5>$<?php echo $shoppingCart[$cart]['total_price']?> </h5>
                            </div>
                            <input class="removeSingleItem"  type="button" value="Remove This Item" data-productName="<?php echo $shoppingCart[$cart]["product_name"];?>" data-brandName="<?php echo $shoppingCart[$cart]["brand_name"];?>"/>
                        </div>
        <?php
    }
    ?>
<?php $_SESSION['priceCart']=$priceCart; ?>
    <?php

}
    ?>

    <?php 
function ShippingAddress($opts=array())
{
   $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
         $email=(string)$_SESSION["userid"];
        if(isset($opts['fullName']) && isset($opts['address']))
        {
        $fullName=$opts['fullName'];
        $address=(string)$opts['address'];
        $client->SoapCommand(Command::AddAddress,array($email,$address));
        }
        
        $ShippingAddress=array();
        
        $ShippingAddress=$client->SoapCommand(Command::ShowAddressOptions,array($email));
         for($address=0;$address<count($ShippingAddress);$address++)
   {
    ?>
    <input id="address_<?php echo $address; ?>" type="radio" name="shipping" value="<?php echo $ShippingAddress[$address]['address']?>" checked>
    <label for="address_<?php echo $address; ?>"><?php echo $ShippingAddress[$address]['address']?></label><br>
                   
    <?php
}
}
    ?>
<?php 
 function PaymentOptions($opts=array())
 {
 $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
        $email=(string)$_SESSION["userid"];
        if(isset($opts['nameOnCard']) && isset($opts['cardNumber']))
        {
            $nameOnCard=$opts['nameOnCard'];
            $cardNumber=$opts['cardNumber'];
            $dateCard=$opts['dateCard'];
            $yearCard=$opts['yearCard'];
            $billingAddress=$opts['billingAddress'];
           $client->SoapCommand(Command::AddPaymentMethod,array($email,$cardNumber,"Visa",$nameOnCard,$yearCard,$dateCard,$billingAddress));
           
        }

        $PaymentOptions=array();
        
        $PaymentOptions=$client->SoapCommand(Command::ShowPaymentMethodOptions,array($email));
         for($payment=0;$payment<count($PaymentOptions);$payment++)
   {
    ?>
     <input id="payment_<?php echo $payment; ?>" type="radio" name="payment" value="payment1" checked>
                    <label for="payment_<?php echo $payment ?>"><?php echo $PaymentOptions[$payment]['name_on_card']." ,".$PaymentOptions[$payment]['card_number']?></label><br>
    <?php
}
 }
 ?>

 <?php 
function AddToCart($opts=array())
{
     $client = new AuthSoapClient(
    null, 
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
     $productName=$opts['productName'];
     $brandName=$opts['brandName'];
     $totalPrice=$opts['unitPrice'] * $opts['quantity'];
     $quantity=$opts['quantity'];
     $email=$_SESSION["userid"];
     $client->SoapCommand(Command::AddShoppingCart,array($email,$productName,$brandName,$quantity,$totalPrice));
}
 ?>
