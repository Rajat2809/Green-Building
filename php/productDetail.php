<?php


// create the database component
require_once('DBComponent.php');
require_once("AuthSoapClient.php");
require_once("CommandEnum.php");
require_once("helper.php");
// create the database component
// $db = new DBComponent();
// $db->Connect_DB();
$client = new AuthSoapClient(
    null,
    array(
        'location'=>$GLOBALS["location"],
        'uri'=>$GLOBALS['uri'],
        'trace'=>true
    )
);
$productName=$_GET["productName"];
$brandName=$_GET["brandName"];



$productDetails=array();

$productDetails=$client->SoapCommand(Command::ShowProductDetail,array($productName,$brandName));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Building - Product Detail</title>
    <meta name="description" content="Home page of Green Building Project">
    <meta name="author" content="lq3297401 / https://github.com/lq3297401">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='icon' href='../assets/images/icons/tempLogo.ico' type=‘image/x-ico’>
    <link rel="stylesheet" href="../assets/cssLib/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/cssLib/font-awesome.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/productDetail.css">
</head>

<body>
    <script src="../js/productDetail.js"></script>
<!-- Top Bar
       ================================================== -->
<div id="headerPHP"></div>

<!-- product Section
================================================== -->
<section id="product">
    <!-- features top

    <section id="mainPart">
        <!-- product detail
        ================================================== -->
    <div id="productDetail" class="container">
        <div class="row">
            <div class="col-md-4">
                <img id="mainImg" src="../assets/images/products/detailExp1.jpg">
                <div class="row thumbnailList">
                    <div class="col-sm-4"><img class="thumbnailImg" src="../assets/images/products/detailExp1.jpg" alt="product image 1"></div>
                    <div class="col-sm-4"><img class="thumbnailImg" src="../assets/images/products/detailExp2.jpg" alt="product image 2"></div>
                    <div class="col-sm-4"><img class="thumbnailImg" src="../assets/images/products/detailExp3.jpg" alt="product image 3"></div>
                </div>
            </div>
            <div class="col-md-8 productTitle">
                <h6><span id="brand"><?php echo (string)$productDetails[0]["brand"];?></span></h6>
                <h3><span id="productName"><?php echo (string)$productDetails[0]["product"];?></span></h3>
                <ul class="pro-rate">
                    <li class="product-rate">
                        <div class="greenStar">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </li>
                    <li><p>55 Review(s)</p></li>
                </ul>
                <p><?php echo $productDetails[0]["description"];?></p>
                <h3 class="price">$<span id="productPrice"><?php echo $productDetails[0]["price"];?></span></h3>
                <h5>Available Colors :</h5>
                <ul class="product-colors">
                    <li><a class="color1" href="#"><span> </span></a></li>
                    <li><a class="color2" href="#"><span> </span></a></li>
                    <li><a class="color3" href="#"><span> </span></a></li>
                    <li><a class="color4" href="#"><span> </span></a></li>
                    <li><a class="color5" href="#"><span> </span></a></li>
                    <li><a class="color6" href="#"><span> </span></a></li>
                    <li><a class="color7" href="#"><span> </span></a></li>
                    <li><a class="color8" href="#"><span> </span></a></li>
                </ul>
                <h5>Quantity :</h5>
                <input id="quantityInput" type="number" size="10" name="quantityNumber" value="1" /><br>
                <input href="shoppingCart.php" id="detailToCart" type="button" value="Add To Cart" />
            </div>
        </div>
    </div>

    <!-- productDescription
    ================================================== -->
    <div id="productDescription" class="container">
        <div class="row">
            <div class="tab">
                <button class="tablinks" onclick="changeTab(event, 'productDes')" id="defaultOpen"><h5 class="tabTitle">Description</h5></button>
                <button class="tablinks" onclick="changeTab(event, 'customerReview')"><h5 class="tabTitle">Reviews</h5></button>
            </div>

            <div id="productDes" class="tabContent container">
                <h3>Product Description</h3>
                <pre>
                    <?php echo $productDetails[0]["description"];?>
                </pre>
            </div>

            <div id="customerReview" class="tabContent container">
                <h3>Customer Reviews</h3>
                <div class="row">
                    <div class="col-md-5">
                        <ul class="pro-rate">
                            <li class="product-rate">
                                <div class="greenStar">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--Avg.Customer rating number-->
                    <div class="col-md-2"> 4 out of 5</div>
                    <!-- add review button-->
                    <div class="col-md-5">
                        <button id="addReview" onclick="displayAddReview()">Add My Review</button>
                    </div>
                </div>
                <!--submit review-->
                <div id="inputReviewArea" style="display:none;">
                    <hr class="review">
                    <ul class="pro-rate">
                        <li>
                            Add My Rate:
                        </li>
                        <li class="product-rate">
                            <div class="greenStar">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </li>
                    </ul>
                    <textarea id="inputReview" placeholder="Your Message" ></textarea>
                    <input id="submitReview" type="button" value="Submit My Review" />
                </div>

                <!-- existing review starts here-->
                <!--<p>There is no customer review yet</p>-->
                <?php
                ProductReview($productName,$brandName);?>
                <hr class="review">

            </div>
        </div>
    </div>

    <hr>

    <!-- relatedProduct
    ================================================== -->
    <div id="relatedProduct" class="container">
        <div class="row">
            <h3>Related Products</h3>
            <div id="relatedContent">
                <?php PopularProduct(); ?>
            </div>
        </div>
    </div>

</section>

<!-- footer and go to top button
            ================================================== -->
<div id="footerPHP"></div>
<!-- javascript
    ================================================== -->
<script src="../assets/jsLib/jquery.min.js"></script>
<script src="../assets/jsLib/bootstrap.min.js"></script>
<script src="../js/PHPheaderFooter.js"></script>
<script src="../js/productDetail.js"></script>
<!--product thumbnail image js-->
<script>
    var icons = document.getElementsByClassName("thumbnailImg");

    for(var i=0; i<icons.length; i++) {
        icons[i].onclick = function(){
            document.getElementById("mainImg").src = this.src;
        }
    }
</script>
<!--change tab js-->
<script>
    function changeTab(evt, tabName) {
        var i, tabContent, tablinks;
        tabContent = document.getElementsByClassName("tabContent");
        for (i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>
<!--add review-->
<script>
    function displayAddReview() {
        var x = document.getElementById("inputReviewArea");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
</body>
</html>