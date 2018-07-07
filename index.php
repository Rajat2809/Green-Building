<?php
session_start();
if(isset($_SESSION['loggedin'] )&& $_SESSION['loggedin'] == 1)
{
//    echo "signin success - index.<br>";
//    echo "user id is " . $_SESSION["userid"] . ".<br>";
    $currentUserId = $_SESSION["userid"];
}
else {
//    echo "false login - index.<br>";
    $_SESSION['loggedin'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Building Project - SJSU</title>

    <meta name="description" content="Home page of Green Building Project">
    <meta name="author" content="lq3297401 / https://github.com/lq3297401">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='icon' href='assets/images/icons/tempLogo.ico' type=‘image/x-ico’>
    <link rel="stylesheet" href="assets/cssLib/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/common.css">
</head>

<body id="index">
<!-- javascript
    ================================================== -->
<script src="assets/jsLib/jquery.min.js"></script>
<script src="assets/jsLib/bootstrap.min.js"></script>
<script src="js/index.js"></script>
<script src="js/scrollup.js"></script>

<!-- Top Bar
================================================== -->
<nav id="menu" class="navbar-fixed-top">
    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div id="topBar">
                <div class="container">
                    <div id="topBar_left">
                        <ul class="nospace linklist">
                            <li><span><img class="topImg" src="assets/images/icons/link.png"></span>
                                <a href="https://justlight.net/"> Justlight Company</a></li>
                            <li>Welcome to Green Building Website</li>
                        </ul>
                    </div>
                    <div id="topBar_right">
                        <ul class="nospace linklist">
                            <li><span><img class="topImg" src="assets/images/icons/phone.png"></span><a itemprop="telephone" href="tel:http://+1%20(510)%20488%203676">+1 (510) 488 3676</a><br></li>
                            <li><span><img class="topImg" src="assets/images/icons/email.png"></span><a itemprop="email" href="mailto:http://contact@justlight.net">  contact@justlight.net</a></li>

                        </ul>
                    </div>
                    <div id="top_border"></div>
                </div>
            </div>

            <!-- Main Navigation
            ================================================== -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="./assets/images/icons/justLightLogo.png" alt="logo" height="30px"></a>
                </div>


                <?php
                $loginType = $_SESSION['loggedin'];
                if ($loginType == 1){ ?>

                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li id="navHome" class="scroll active"><a href="index.php">Home</a></li>
                            <li id="navProducts" class="scroll drop"><a href="./php/products.php">Products&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="./php/productList_all.php">Show All Products</a></li>
                                </ul>
                            </li>
                            <li id="navAbout" class="scroll"><a href="./php/aboutUs.php">About Us</a></li>
                            <li id="navContact" class="scroll"><a href="./php/contactUs.php">Contact Us</a></li>
                            <li id="navAccount" class="scroll drop"><a href="./php/CustomerAccount.php">My Account&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="./php/signOut.php">Sign Out</a></li>
                                </ul></li>
                            <li id="navShopping" class="scroll"><a href="./php/shoppingCart.php">Shopping Cart</a></li>
                        </ul>
                    </div>

                <?php } else { ?>

                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li id="navHome" class="scroll active"><a href="index.php">Home</a></li>
                            <li id="navProducts" class="scroll drop"><a href="./php/products.php">Products&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="./php/productList_all.php">Show All Products</a></li>
                                </ul>
                            </li>
                            <li id="navAbout" class="scroll"><a href="./php/aboutUs.php">About Us</a></li>
                            <li id="navContact" class="scroll"><a href="./php/contactUs.php">Contact Us</a></li>
                            <li id="navSign" class="scroll"><a href="./php/signIn.php">Sign In | Register</a></li>
                            <!--                            <li id="navAccount" class="scroll"><a href="CustomerAccount.php">My Account</a></li>-->
                            <!--                            <li id="navShopping" class="scroll"><a href="shoppingCart.php">Shopping Cart</a></li>-->
                        </ul>
                    </div>

                <?php } ?>
            </div>
        </nav>
    </header>
</nav>

<!-- Home Section
================================================== -->
<section id="home">
    <div class="overlay">
        <div class="container">
            <div class="content-heading text-center">
                <h1>This Is The Building That We Love</h1>
                <p class="lead">This is a building energy solutions provider. This is a building energy solutions provider.
                    This is a building energy solutions provider. This is a building energy solutions provider.</p>
                <a href="#detail" class="scroll goto-btn">View Details</a>
            </div>
        </div>
    </div>

    <!-- energyData Section
    ================================================== -->
    <section id="energyData">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-4 energy-saved">
                    <p class="number energy-saved amount">000000</p>
                    <p class="name">Total Energy Saving (kWh)</p>
                </div>
                <div class="col-sm-12 col-md-4 carbon-deduction">
                    <p class="number carbon-deduction amount">000000</p>
                    <p class="name">Carbon Deducted (Kg)</p>
                </div>
                <div class=" col-sm-12 col-md-4 trees-planted">
                    <p class="number trees-planted amount">000000</p>
                    <p class="name">Amount of Tree Planted</p>
                </div>
            </div>
        </div>
    </section>

    <!-- business Section
    ================================================== -->
    <section id="business">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div><h2>Our Business</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam,
                        incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam
                        repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur.
                        Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section
    ================================================== -->
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="skill-home">
                    <div class="skill-home-solid clearfix">
                        <div class="col-md-4 text-center">
                            <div class="box">
                                <div class="img_container">
                                    <img class="intro_img" src="assets/images/index/houseOwner.png" alt="house owner icon">
                                </div>
                                <div class="box-area">
                                    <h3>House Owner</h3>
                                    <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit.
                                        Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                                    <a href="#detail" class="scroll goto-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="box">
                                <div class="img_container">
                                    <img class="intro_img" src="assets/images/index/manufacturer.png" alt="house owner icon">
                                </div>
                                <div class="box-area">
                                    <h3>Manufacturer</h3>
                                    <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit.
                                        Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                                    <a href="#detail" class="scroll goto-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="box">
                                <div class="img_container">
                                    <img class="intro_img" src="assets/images/index/salesman.png" alt="house owner icon">
                                </div>
                                <div class="box-area">
                                    <h3>Salesman</h3>
                                    <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                        consequatur aliquam, incidunt eius magni provident</p>
                                    <a href="#detail" class="scroll goto-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- footer
================================================== -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h5 class="widgetheading">INTRODUCTION</h5>
                    <address>
                        <span><img class="bottomImg" src="assets/images/icons/company.png"></span><strong><b> Just Light Technology Inc.</b></strong><br>
                        <span><img class="bottomImg" src="assets/images/icons/address.png"></span>  46560 Fremont Blvd, Suite 105, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fremont, CA, US 94538.</address>
                    <p>
                        <span><img class="bottomImg" src="assets/images/icons/phone.png"></span><a itemprop="telephone" href="tel:http://+1%20(510)%20488%203676">+1 (510) 488 3676</a><br>
                        <span><img class="bottomImg" src="assets/images/icons/email.png"></span><a itemprop="email" href="mailto:http://contact@justlight.net">  contact@justlight.net</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h5 class="widgetheading">QUICK LINKS</h5>
                    <ul class="link-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="php/products.php">Products</a></li>
                        <li><a href="php/aboutUs.php">About Us</a></li>
                        <li><a href="php/contactUs.php">Contact Us</a></li>
                        <li><a href="php/signIn.php">Sign In | Register</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h5 class="widgetheading">KEEP IN TOUCH</h5>
                    <form action="#">
                        <input id="footer_email" type="email" placeholder="Type your email">
                        <div id="footer_submit"><a href="#submit" class="scroll goto-btn">Submit</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- sub-footer
    ================================================== -->
    <div id="sub-footer">
        <div class="copyright">
            Copyright © 2018 Green Building Project. All rights reserved.
        </div>
    </div>
</footer>

<!-- go to top button
    ================================================== -->
<button onclick="topFunction()" id="goToTop" title="Go to top">
    <span><img src="assets/images/icons/top.png" alt="top icon" height="20" width="20"></span>
</button>

</body>
</html>
