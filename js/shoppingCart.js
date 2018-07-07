$(function () {
	 jQuery(document).on('click','.removeSingleItem',function(e){
               var productName= jQuery(this).attr("data-productName");
               var brandName= jQuery(this).attr("data-brandName");
               
                
            $.post('../php/listener.php',{ action : 'removeFromCart',productName,brandName},function(data){
            	window.location = '../php/shoppingCart.php';
                // jQuery('.shoppingCartDetails').html(data);
                // jQuery('.shoppingCartDetails').animate({ opacity:1},'normal');
            })   
                
      });
	  jQuery(document).on('click','#saveToAddress',function(e){
	  	var fullName=jQuery('#fullName').val();
	  	var address=jQuery('#address').val();
	  	jQuery('#ShippingAddress').animate({ opacity:0.5 },'normal');

	  	 $.post('../php/listener.php',{ action : 'saveAddress',fullName,address},function(data){
	  	 	jQuery('#changeAddressArea').css("display", "none");
	  	 	jQuery('#address').val('');
	  	 	jQuery('#fullName').val('');
	  	 	jQuery('#ShippingAddress').html(data);
                jQuery('#ShippingAddress').animate({ opacity:1},'normal');
	  	 })
	  });
	  jQuery(document).on('click','#saveToPayment',function(e){
	  	var nameOnCard=jQuery('#nameOnCard').val();
	  	var cardNumber=jQuery('#cardNumber').val();
	  	var dateCard=jQuery('#dateCard').val();
	  	var yearCard=jQuery('#yearCard').val();
	  	var billingAddress=jQuery("input[name='shipping']:checked").val();
	  	jQuery('#addPayment').animate({ opacity:0.5 },'normal');
	  	 $.post('../php/listener.php',{ action : 'savePayment',nameOnCard,cardNumber,dateCard,yearCard,billingAddress},function(data){
	  	 	jQuery('#changePaymentArea').css("display", "none");
	  	 	jQuery('#nameOnCard').val('');
	  	 	jQuery('#cardNumber').val('');
	  	 	jQuery('#dateCard').val('');
	  	 	jQuery('#yearCard').val('');
	  	 	jQuery('#cvv').val('');
	  	 	jQuery('#addPayment').html(data);
                jQuery('#addPayment').animate({ opacity:1},'normal');
	  	 })
	  });
});