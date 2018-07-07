<?php
    session_start();
    session_destroy();
    $_SESSION['loggedin'] = 0;
    header("Location:signIn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Green Building - Sign Out</title>
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
</head>

<body>
<!-- Top Bar
================================================== -->
<div id="headerPHP"></div>
<h4>Sign Out page</h4>
<h3>THis is In construction</h3>
<h2>Please visit again</h2>

<!-- footer and go to top button
================================================== -->
<div id="footerPHP"></div>
</body>
</html>