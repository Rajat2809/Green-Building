<?php require_once('helper.php'); ?>
    <!-- <!DOCTYPE html> -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Green Building - All Products Lists</title>
        <meta name="description" content="Home page of Green Building Project">
        <meta name="author" content="lq3297401 / https://github.com/lq3297401">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel='icon' href='../assets/images/icons/tempLogo.ico' type=‘image/x-ico’>
        <link rel="stylesheet" href="../assets/cssLib/bootstrap.min.css">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/productList_all.css">
        <link rel="stylesheet" href="../css/favicon-css/font-awesome.css">
    </head>

    <body>
        <!-- javascript
        ================================================== -->
        <script src="../assets/jsLib/jquery.min.js"></script>
        <script src="../assets/jsLib/bootstrap.min.js"></script>
        <script src="../js/scrollup.js"></script>
        <script src="../js/PHPheaderFooter.js"></script>
        <script src="../js/productDetail.js"></script>

    <!-- Top Bar
        ================================================== -->
        <div id="headerPHP"></div>

    <!-- product Section
        ================================================== -->
        <section id="product">
        <!-- features top
            ================================================== -->
            <div class="features" id="features_top">
                <div class="cherry-box">
                    <div class="container">
                        <div class="row row-edge">
                            <div class="col-md-12 full-width">
                                <div class="row">

                                    <div id="product_light" class=" item-1 clearfix odd col-md-5ths categorySelect" data-onselect="1">
                                        <div class="servcircle">
                                            <img id="productImg_light" src="../assets/images/products/light.png" alt="light">
                                            <h4 class="">Lights</h4>
                                        </div>
                                    </div>

                                    <div id="product_airCondition" class=" item-2 clearfix even col-md-5ths categorySelect" data-onselect="0">
                                        <div class="servcircle">
                                            <img id="productImg_airCondition" src="../assets/images/products/airCondition.png" alt="air condition">
                                            <h4 class="">Air Conditions</h4>
                                        </div>
                                    </div>

                                    <div id="product_solarPanel" class=" item-3 clearfix odd col-md-5ths categorySelect" data-onselect="0">
                                        <div class="servcircle">
                                            <img id="productImg_solarPanel" src="../assets/images/products/solarPanel.png" alt="solar panel">
                                            <h4 class="">Solar Panel</h4>
                                        </div>
                                    </div>

                                    <div id="product_energyStorage" class=" item-4 clearfix even col-md-5ths categorySelect" data-onselect="0">
                                        <div class="servcircle">
                                            <img id="productImg_energyStorage" src="../assets/images/products/energyStorage.png" alt="energy storage">
                                            <h4 class="">Energy Storage</h4>
                                        </div>
                                    </div>

                                    <div id="product_windowFirm" class=" item-5 clearfix odd col-md-5ths categorySelect" data-onselect="0">
                                        <div class="servcircle">
                                            <img id="productImg_windowFirm" src="../assets/images/products/windowFirm.png" alt="window firm">
                                            <h4 class="">Window Firm</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--You can start from here-->
        <section id="mainList">
        <!-- viewAllProducts
            ================================================== -->
            <div id="viewAllProducts" class="text-center" style="margin-top: 2%">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-8" id="SearchBar">
                                <div class="search">
                                    <input id="searchVal" type="search" class="searchTerm col-md-11 text-left" placeholder="Search" style="min-width: 285px">
                                    <button type="submit" class="searchButton col-md-1">
                                        <i id="searchButton" class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4" id="SortFeature" name="SortFeature">
                                <select class="form-control FilterChange searchDetail " name="SortControl">
                                    <option value="PLH">Price(Low-High)</option>
                                    <option value="PHL">Price(High-Low)</option>
                                    <option value="RHL">Avg. Customer Review(High - Low)</option>
                                    <option value="PNAZ">Category(A-Z)</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row container">
                            <div class="col-md-2">
                                <div id="searchFilter">
                                    <a href="productList_all.php" id="resetAll" class="searchTitle">Reset All</a><br>
                                    <div id="divPrice">
                                        <label class="lblFiltter searchTitle">Price ($)</label><br>
                                        <label class="lblPrice searchDetail"><input class="FilterChange" type="radio" name="price"  value="25"> Under USD 25</label><br>
                                        <label class="lblPrice searchDetail"><input class="FilterChange" type="radio" name="price" value="25,50" > USD 25 to USD 50</label><br>
                                        <label class="lblPrice searchDetail"><input class="FilterChange" type="radio" name="price" value="50,100" > USD 50 to USD 100</label><br>
                                        <label class="lblPrice searchDetail"><input class="FilterChange" type="radio" name="price" value="100" > Over USD 100</label><br>
                                        <label class="lblPrice searchDetail">  <input class="FilterChange" type="radio" name="price" value="0" > Custom</label><br>

                                        <div class="row" id="inputControls">
                                            <input id="MinPrice" class="form-control form-control-inline" type="number" min="0" max="1000" placeholder="Low" disabled="disabled"/>
                                            <label id="lblTo" for="MaxPrice" class="text-center">to</label>
                                            <input id="MaxPrice" class="form-control form-control-inline" type="number" min="0" max="1000" placeholder="High" disabled="disabled"/>
                                            <input id="btnPriceFiltter" class="form-control form-control-inline" type="button" value=">" disabled="disabled"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="divReview" class="searchTitle">
                                        <label class="lblFiltter searchTitle">Avg. Customer Review</label><br>
                                        <label class="lblReview searchDetail"><input class="FilterChange" type="radio" name="review"  value="4"> 4 stars and up</label><br>
                                        <label class="lblReview searchDetail"><input class="FilterChange" type="radio" name="review" value="3" > 3 stars and up</label><br>
                                        <label class="lblReview searchDetail"><input class="FilterChange" type="radio" name="review" value="2" > 2 stars and up</label><br>
                                        <label class="lblReview searchDetail"><input class="FilterChange" type="radio" name="review" value="1" > 1 stars and up</label><br>
                                    </div>
                                 </div>
                            </div>

                            <div class="col-md-10">
                                <div id="productList_single" class='clearfix'>
                                    <?php generate_product_grids(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer and go to top button
            ================================================== -->
        <div id="footerPHP"></div>
    </body>
    </html>

