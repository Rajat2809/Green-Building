<?php ?>
<!-- footer
================================================== -->
<style>
    #goToTop {
        display: none;
        position: fixed;
        bottom: 60px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color:rgba(204, 204, 204, 0.6);
        cursor: pointer;
        padding: 10px;
        border-radius: 2px;
        font-size: 12px;
        width:45px;
        height:45px;
        transition: 400ms;
    }
</style>
<script>
    $(function() {

        $("#goToTop").hover(function () {
            $(this).css({
                "background-color": "#2cb1ba",
                "color": "white"
            })
        }, function () {
            $(this).css({
                "background-color": "rgba(204, 204, 204, 0.6)",
                "color": "#b3b3b3"
            })
        }).click(function () {
            $('#goToTop').css({
                "background-color": "#2cb1ba",
                "color": "white"
            });

            $('body,html').animate({
                scrollTop: 0
            }, 800, function () {
                $('#goToTop').css({
                    "background-color": "rgba(204, 204, 204, 0.6)",
                    "color": "#b3b3b3"
                });
            });
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#goToTop').fadeIn();
            } else {
                $('#goToTop').fadeOut();
            }
        });
    });
</script>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h5 class="widgetheading">INTRODUCTION</h5>
                    <address>
                        <span><img class="bottomImg" src="../assets/images/icons/company.png"></span><strong><b> Just Light Technology Inc.</b></strong><br>
                        <span><img class="bottomImg" src="../assets/images/icons/address.png"></span>  46560 Fremont Blvd, Suite 105, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fremont, CA, US 94538.</address>
                    <p>
                        <span><img class="bottomImg" src="../assets/images/icons/phone.png"></span> +1 (510) 488 3676 <br>
                        <span><img class="bottomImg" src="../assets/images/icons/email.png"></span><a itemprop="email" href="mailto:http://contact@justlight.net">  contact@justlight.net</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h5 class="widgetheading">QUICK LINKS</h5>
                    <ul class="link-list">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="aboutUs.php">About Us</a></li>
                        <li><a href="contactUs.php">Contact Us</a></li>
                        <li><a href="signIn.php">Sign In | Register</a></li>
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
    <span><img src="../assets/images/icons/top.png" alt="top icon" height="20" width="20"></span>
</button>
