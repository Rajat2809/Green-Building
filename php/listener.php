<?php 
require_once('helper.php');

if(!isset($_REQUEST['action'])) {
	die('Invalid Request');
}

switch($_REQUEST['action']) {

	case 'grid' :
	{
		$opts = array();

		if(isset($_POST['priceMin'])&& isset($_POST['priceMax']))
		{
			$opts['priceMin'] = $_POST['priceMin'];
			$opts['priceMax'] = $_POST['priceMax'];
			$opts['custom'] = $_POST['custom'];

		}
		if(isset($_POST['review']))
		{
			$opts['review'] = $_POST['review'];
		}
		if(isset($_POST['categorySort']))
		{
			$opts['categorySort']=$_POST['categorySort'];
		}
		if(isset($_POST['categoryName']) && $_POST['categoryName']!='')
		{
			$opts['categoryName']=$_POST['categoryName'];
		}
		else
		{
			$opts['categoryName']="Lights";
		}
		
		generate_product_grids($opts);

		break;
	}
	case 'search' :
	{
		$optsSearch= array();
		$optsSearch['searchVal']=$_POST['searchVal'];
		$optsSearch['custom']=$_POST['custom'];
		generate_product_grids($optsSearch);
		
		break;
	}
	case 'categoryChange':
	{
		$optsCategory= array();
		
		if(isset($_POST['categoryName']))
		{
			$optsCategory['categoryName']=$_POST['categoryName'];
		}

		generate_product_grids($optsCategory);
		break;
	}
	case 'addToCart':
	{
		$optsCart=array();
		$optsCart['productName']=$_POST['productName'];
		$optsCart['brandName']=$_POST['brandName'];
		$optsCart['unitPrice']=$_POST['unitPrice'];
		$optsCart['quantity']=$_POST['quantity'];
		AddToCart($optsCart);
		break;
	}
	case 'removeFromCart':
	{
		$optsremoveCart=array();
		$optsremoveCart['productName']=$_POST['productName'];
		$optsremoveCart['brandName']=$_POST['brandName'];
		ShowShoppingCart($optsremoveCart);
		break;
	}
	case 'saveAddress':
	{
		$optsAddress=array();
		$optsAddress['fullName']=$_POST['fullName'];
		$optsAddress['address']=$_POST['address'];
		ShippingAddress($optsAddress);
		break;
	}
	case 'savePayment':
	{
		$optsPayment=array();
		$optsPayment['nameOnCard']=$_POST['nameOnCard'];
		$optsPayment['cardNumber']=$_POST['cardNumber'];
		$optsPayment['dateCard']=$_POST['dateCard'];
		$optsPayment['yearCard']=$_POST['yearCard'];
		$optsPayment['billingAddress']=$_POST['billingAddress'];
		PaymentOptions($optsPayment);
		break;
	}
}

?>

