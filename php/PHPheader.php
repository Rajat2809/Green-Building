<?php
//include('checkSignIn.php');
session_start();
if(isset($_SESSION['loggedin'] )&& $_SESSION['loggedin'] == 1)
{
//    echo "signin success - header.<br>";
//    echo "user id is " . $_SESSION["userid"] . ".<br>";
    $currentUserId = $_SESSION["userid"];
//    $loginType = $_SESSION['loggedin'];
}
else {
//    echo "false login - header.<br>";
    $_SESSION['loggedin'] = 0;
}
?>
<!-- Top Bar
================================================== -->
<nav id="menu" class="navbar-fixed-top">
    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div id="topBar">
                <div class="container">
                    <div id="topBar_left">
                        <ul class="nospace linklist">
                            <li><span><img class="topImg" src="../assets/images/icons/link.png"></span>
                                <a href="https://justlight.net/"> Justlight Company</a></li>
                            <li>Welcome to Green Building Website</li>
                        </ul>
                    </div>
                    <div id="topBar_right">
                        <ul class="nospace linklist">
                            <li><span><img class="topImg" src="../assets/images/icons/phone.png"></span> +1 (510) 488 3676</li>
                            <li><span><img class="topImg" src="../assets/images/icons/email.png"></span><a itemprop="email" href="mailto:http://contact@justlight.net">  contact@justlight.net</a></li>
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
                    <a class="navbar-brand" href="../index.php"><img src="../assets/images/icons/justLightLogo.png" alt="logo" height="30px"></a>
                </div>


                <?php
                $loginType = $_SESSION['loggedin'];
                if ($loginType == 1){ ?>

                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li id="navHome" class="scroll active"><a href="../index.php">Home</a></li>
                            <li id="navProducts" class="scroll drop"><a href="products.php">Products&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="productList_all.php">Show All Products</a></li>
                                </ul>
                            </li>
                            <li id="navAbout" class="scroll"><a href="aboutUs.php">About Us</a></li>
                            <li id="navContact" class="scroll"><a href="contactUs.php">Contact Us</a></li>
                            <li id="navAccount" class="scroll drop"><a href="CustomerAccount.php">My Account&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="signOut.php">Sign Out</a></li>
                                </ul></li>
                            <li id="navShopping" class="scroll"><a href="shoppingCart.php">Shopping Cart</a></li>
                        </ul>
                    </div>

                <?php } else { ?>

                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li id="navHome" class="scroll active"><a href="../index.php">Home</a></li>
                            <li id="navProducts" class="scroll drop"><a href="products.php">Products&nbsp;&nbsp;&#9662;</a>
                                <ul>
                                    <li class="subTitle text-center"><a href="productList_all.php">Show All Products</a></li>
                                </ul>
                            </li>
                            <li id="navAbout" class="scroll"><a href="aboutUs.php">About Us</a></li>
                            <li id="navContact" class="scroll"><a href="contactUs.php">Contact Us</a></li>
                            <li id="navSign" class="scroll"><a href="signIn.php">Sign In | Register</a></li>
<!--                            <li id="navAccount" class="scroll"><a href="CustomerAccount.php">My Account</a></li>-->
<!--                            <li id="navShopping" class="scroll"><a href="shoppingCart.php">Shopping Cart</a></li>-->
                        </ul>
                    </div>

                <?php } ?>
            </div>
        </nav>
    </header>
</nav>


