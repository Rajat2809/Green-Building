<?php
    require_once('helper.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Building - Products</title>
    <meta name="description" content="Home page of Green Building Project">
    <meta name="author" content="lq3297401 / https://github.com/lq3297401">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='icon' href='../assets/images/icons/tempLogo.ico' type=‘image/x-ico’>
    <link rel="stylesheet" href="../assets/cssLib/bootstrap.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/products.css">

    <!-- javascript
        ================================================== -->
    <script src="../assets/jsLib/jquery.min.js"></script>
    <script src="../assets/jsLib/bootstrap.min.js"></script>
    <script src="../js/scrollup.js"></script>
    <script src="../js/PHPheaderFooter.js"></script>
    <script src="../js/products.js"></script>
</head>

<body>
<!-- Top Bar
================================================== -->
<div id="headerPHP"></div>

<!-- contact Section
================================================== -->
<section id="product">
    <div class="overlay">
        <div class="container">
            <div class="content-heading text-center">
                <h1>Products Category</h1>
            </div>
        </div>
    </div>

    <!-- features_top
        ================================================== -->
        <div class="features" id="features_top">
            <div class="row  ">
                <div class="cherry-box">
                    <div class="inner">
                        <div class="container">
                            <div class="row row-edge">
                                <div class="cherry-services extraservice_1 boxed-layout">
                                    <div class="row">
                                        <div class="services-listing">

                                            <div id="product_light" class="cherry-services_item item-1 clearfix odd col-md-5ths">
                                                <div id="servcircle1" class="servcircle" onclick="location.href='productList.html';">
                                                    <img id="productImg_light" src="../assets/images/products/light.png" alt="light">
                                                    <h4 id="circle_light">Lights</h4>
                                                </div>
                                                <div id="productP_light" class="servdescr">
                                                    <div class="cherry-services_excerpt">
                                                        <p>Just Light integrates the most intelligent lighting control system with IoT architecture and
                                                        LED lighting solutions, effectively cut down energy costs by up to 50-90%.</p></div>
                                                </div>
                                            </div>

                                            <div id="product_airCondition" class="cherry-services_item item-2 clearfix even col-md-5ths">
                                                <div id="servcircle2" class="servcircle">
                                                    <img id="productImg_airCondition" src="../assets/images/products/airCondition.png" alt="air condition">
                                                    <h4 id="circle_airCondition">Air Conditions</h4>
                                                </div>
                                                <div id="productP_airCondition" class="servdescr">
                                                    <div class="cherry-services_excerpt">
                                                        <p>Optimizing HVAC system and providing the most cost-efficiency solution can not only lower the
                                                        cost of energy usage, but also enhanced comfort, productivity of building's interior. </p></div>
                                                </div>
                                            </div>

                                            <div id="product_solarPanel" class="cherry-services_item item-3 clearfix odd col-md-5ths">
                                                <div id="servcircle3" class="servcircle">
                                                    <img id="productImg_solarPanel" src="../assets/images/products/solarPanel.png" alt="solar panel">
                                                    <h4 id="circle_solarPanel">Solar Panel</h4>
                                                </div>
                                                <div id="productP_solarPanel" class="servdescr">
                                                    <div class="cherry-services_excerpt">
                                                        <p>Just Light provides a variety of solar panel applications integrating with IoT platform, easily monitor
                                                        the status of the solar system using the same IoT platform as the lighting system.</p></div>
                                                </div>
                                            </div>

                                            <div id="product_energyStorage" class="cherry-services_item item-4 clearfix even col-md-5ths">
                                                <div id="servcircle4" class="servcircle">
                                                    <img id="productImg_energyStorage" src="../assets/images/products/energyStorage.png" alt="energy storage">
                                                    <h4 id="circle_energyStorage">Energy Storage</h4>
                                                </div>
                                                <div id="productP_energyStorage" class="servdescr">
                                                    <div class="cherry-services_excerpt">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p></div>
                                                </div>
                                            </div>

                                            <div id="product_windowFirm" class="cherry-services_item item-5 clearfix odd col-md-5ths">
                                                <div id="servcircle5" class="servcircle">
                                                    <img id="productImg_windowFirm" src="../assets/images/products/windowFirm.png" alt="window firm">
                                                    <h4 id="circle_windowFirm">Window Firm</h4>
                                                </div>
                                                <div id="productP_windowFirm" class="servdescr">
                                                    <div class="cherry-services_excerpt">
                                                        <p>By applying a window firm to a building's window and blocking the sun radiation, interior heat flux can be
                                                        prevented, thus achieving better energy efficiency and carbon reduction. </p></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- features
    ================================================== -->
    <div class="text-center" id="features">
        <div class="container">
            <h1 class="">Our Suggestions</h1>
            <p class=""> Aliquam sagittis ligula et sem lacinia, ut facilisis enim sollicitudin. Proin nisi est,<br class="hidden-xs">
                convallis nec purus vitae, iaculis posuere sapien. </p>
            <div class="col-md-4 features-left">
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 1</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 2</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 3</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="../assets/images/products/suggestionBulb.png" alt="App" />
            </div>
            <div class="col-md-4 features-left">
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 4</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 5</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icon"><img src="../assets/images/icons/leafIcon_green.png"></div>
                    <div class="feature-single">
                        <h4>Process 6</h4>
                        <p> Some lorem contetnt to fill the gap and make it look clean and organized. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- viewAllProducts
    ================================================== -->
    <div id="viewAllProducts" class="text-center">
        <div class="container">
            <div class="row">
                <h1>Popular Products</h1>
                <p class=""> Here are the popular products from us </p>
                <div id="productList_popular">
                <?php
                   PopularProduct();
                ?>
                </div>
            </div>
        </div>
        <input type="button" id="viewAllLink"  value="View All Products >>" href="../php/productList_all.php" onclick="window.location.href='productList_all.php'">

    </div>

</section>

<!-- footer and go to top button
================================================== -->
<div id="footerPHP"></div>
</body>
</html>