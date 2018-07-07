$(function() {
// $(document).ready(function () {
    $("#footerPHP").load("../php/PHPfooter.php");

    $('#headerPHP').load("../php/PHPheader.php", function(){
        $('#myNavbar li').removeClass('active');
        // $(this).addClass('active');
        // $('#navProducts').addClass( 'active' );

        var sub_index = "index",
            sub_product = "product",
            sub_aboutUs = "aboutUs",
            sub_contactUs = "contactUs",
            sub_signIn = "signIn";
            sub_register = "register";
            sub_account = "Account";
            sub_shopping = "shopping";

        var Murl = location.pathname;

        if (Murl.includes(sub_index)) {
            $('#navHome').addClass( 'active' );
        }
        else if (Murl.includes(sub_product)) {
            $('#navProducts').addClass( 'active' );
        }
        else if (Murl.includes(sub_aboutUs)) {
            $('#navAbout').addClass( 'active' );
        }
        else if (Murl.includes(sub_contactUs)) {
            $('#navContact').addClass( 'active' );
        }
        else if (Murl.includes(sub_signIn) || Murl.includes(sub_register)) {
            $('#navSign').addClass( 'active' );
        }
        else if (Murl.includes(sub_account)) {
            $('#navAccount').addClass( 'active' );
        }
        else if (Murl.includes(sub_shopping)) {
            $('#navShopping').addClass( 'active' );
        }
    });
});