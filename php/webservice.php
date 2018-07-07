<?php
	require_once("DBComponent.php");
	// create the database component
    $db = 0;
	class AuthSoapServer
	{
		private $conn;
		private $db;
		private $authenticated = false;
		
		public function authenticate($header_params)
		{
			if($header_params->username == 'admin' && $header_params->password == hash('sha256','GTP@ssw0rd'))
			{
				$this->authenticated = true;
				return true;
			}
			else throw new SOAPFault('Wrong user/password combination',401);
		}
		public function __construct()
		{
			$this->conn = (is_null($this->conn)) ? self::connect() : $this->conn;
		}
		public function __destruct() 
		{
			if(!is_null($this->db))
				$this->db->Disconnect_DB();
		}
		
		public function checkAuthentication()
		{
			if($this->authenticated)
				return true;
			else
				return false;
		}
		
		function connect()
		{
			$this->db = new DBComponent();
			$this->db->Connect_DB();
			$this->conn = $this->db->GetDBConn();
			return $this->conn;
		}
		function ActivateProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			
			$product = $param_array[0];
			$brand = $param_array[1];
		
			$conn = $this->conn();
			
			$stmt = $conn->prepare("CALL  activateProduct(?,?);");
			$stmt->bind_param('ss',$product,$brand);
			$stmt->execute();		
			
			return true;
		}
	
		function addPaymentMethod($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$cardNumber = $param_array[1];
			$cardType=$param_array[2];
			$name = $param_array[3];
			$expiredYear = $param_array[4];
			$expiredMonth = $param_array[5];
			$billAddress = $param_array[6];
			

			$conn = $this->conn;
		
			$stmt = $conn->prepare("CALL  addPaymentMethod(?,?,?,?,?,?,?);");
			$stmt->bind_param('sssssss',$email,$cardNumber,$cardType,$name,$expiredYear,$expiredMonth,$billAddress);
			$stmt->execute();		
			
			return true;	
		}	
		function AddAddress($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$address = $param_array[1];
			$conn = $this->conn;
			$stmt = $conn->prepare("CALL  addAddress(?,?);");
			$stmt->bind_param('ss',$email,$address);
			$stmt->execute();		
			
			return true;	
		}	
		function AddShoppingCart($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
			$quality = $param_array[3];
			$totalPrice = $param_array[4];
	
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  addShoppingCart(?,?,?,?,?);");
			$stmt->bind_param('sssdd',$email,$product,$brand,$quality,$totalPrice);
			$stmt->execute();		
	
			return true;	
		}	
		
		function CheckMailExisted($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$mail = $param_array[0];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  checkEmailExisted(?,@email);");
			$stmt->bind_param('s', $mail);
			$stmt->execute();
			
			if (!($res = $conn->query("SELECT @email as email"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
			
			$row = $res->fetch_assoc();
			
			if (is_null($row['email'])) 
				return false;
			else	 
				return true;
		}	
		
		function CheckProductNameExisted($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$product = $param_array[0];
			$brand = $param_array[1];
	
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  checkProductNameExisted(?,?,@product);");
			$stmt->bind_param('ss', $product,$brand);
			$stmt->execute();
			
			if (!($res = $conn->query("SELECT @product as product"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
			
			$row = $res->fetch_assoc();
	
			if (is_null($row['product'])) 
				return false;
			else	 
				return true;
		}	
		
		function DeleteCustomer($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$id = $param_array[0];
	
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deleteCustomer(?);");
			$stmt->bind_param('s', $id);
			$stmt->execute();
			
			return true;
		}	
		
		function DeletePaymentMethod($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$cardNumber = $param_array[1];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deletePaymentMethod(?,?);");
			$stmt->bind_param('ss',$email,$cardNumber);
			$stmt->execute();		
			
			return true;
		}		
			
		function DeleteProduct($param_array)
		{	
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$product = $param_array[0];
			$brand = $param_array[1];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deleteProduct(?,?);");
			$stmt->bind_param('ss',$product,$brand);
			$stmt->execute();		
			
			return true;		
		}		
		
		function DeleteProductRating($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deleteProductRating(?,?,?);");
			$stmt->bind_param('sss',$email,$product,$brand);
			$stmt->execute();		
	
			return true;			
		}		
		
		function DeleteSalesman($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$id = $param_array[0];
		
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deleteSalesman(?);");
			$stmt->bind_param('s', $id);
			$stmt->execute();
			
			return true;
		}		
		
		function DeleteShoppingCart($param_array) 
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
		
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  deleteShoppingCart(?,?,?);");
			$stmt->bind_param('sss',$email,$product,$brand);
			$stmt->execute();		
			
			return true;
		}		
		
		function InsertProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$category = $param_array[0];
			$name = $param_array[1];
			$brand = $param_array[2];
			$pic = $param_array[3];
			$discription = $param_array[4];
			$price = $param_array[5];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  insertProduct(:category,:name,:brand,:pic,:discription,:price);");
			$stmt->bind_param(':category',$category);
			$stmt->bind_param(':name',$name);
			$stmt->bind_param(':brand',$brand);
			$stmt->bind_param(':pic',$pic);
			$stmt->bind_param(':discription',$discription);
			$stmt->bind_param(':price',$price);
			$stmt->execute();		
	
			return true;
		}	
		
		function Login($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$username = $param_array[0];
			$pwd = $param_array[1];
			
			$result = array();
	
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  login(?,?,@usetType);");
			$stmt->bind_param('ss', $username,$pwd);
			$stmt->execute();		
	
			if (!($res = $conn->query("SELECT @usetType as type"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
			
			$row = $res->fetch_assoc();
			
			if (is_null($row['type'])) 
				$result[] = array('status'=>false,'type'=>"");
			else	 
				$result[] = array('status'=>true,'type'=>$row['type']);
			
			return $result;
		}	
	
		function RateProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
			$rate = $param_array[3];
			$comment = $param_array[4];
		
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  rateProduct(?,?,?,?,?);");
			$stmt->bind_param('sssds',$email,$product,$brand,$rate,$comment);
			$stmt->execute();		
	
			return true;
		}	
	
		function RegisterCustomer($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$firstname = $param_array[0];
			$lastname = $param_array[1];
			$birthday = $param_array[2];
			$company = $param_array[3];
			$invitationcode = $param_array[4];
			$address = $param_array[5];
			$phone = $param_array[6];
			$email = $param_array[7];
			$password = $param_array[8];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  registerCustomer(?,?,?,?,?,?,?,?,?);");
			$stmt->bind_param('sssssssss',$firstname,$lastname,$birthday,$company,$invitationcode,$address,$phone,$email,$password);
			$stmt->execute();		
	
			return true;
		}		
		
		function RegisterSalesman($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$firstname = $param_array[0];
			$lastname = $param_array[1];
			$email = $param_array[2];
			$password = $param_array[3];
			$phone = $param_array[4];
			$address = $param_array[5];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  registerSalesman(?,?,?,?,?,?);");
			$stmt->bind_param('ssssss',$firstname,$lastname,$email,$password,$phone,$address);
			$stmt->execute();		
	
			return true;
		}		
	
		function SearchProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$keyWord = $param_array[0];
			
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL searchProduct(?);");
			$stmt->bind_param('s',$keyWord);
			
			$stmt->execute();
	
			$re = $stmt->get_result();	
	
			while ($row = $re->fetch_assoc()) {
				$result[] = array('product_name'=>$row['product_name'],'brand_name'=>$row['brand_name'],'picture'=>$row['picture'],'unit_price'=>$row['unit_price'],'rate_average'=>$row['rate_average'],'rate_amount'=>$row['rate_amount']);
			}
			
			return $result;		
		}
	
		function ShowAllProductRating($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$product = $param_array[0];
			$brand = $param_array[1];
			
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showAllProductRating(?,?);");
			
			$stmt->bind_param('ss', $product,$brand);
			$stmt->execute();
			
			$re = $stmt->get_result();	
	
			while ($row = $re->fetch_assoc()) {
				$result[] = array('first_name'=>$row['fisrt_name'],'last_name'=>$row['last_name'],'rate'=>$row['rate'],'comment'=>$row['comment'],'create_time'=>$row['create_time']);
			}	
	
			return $result;
		}	
	
		function ShowPopularProduct()
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL showPopularProduct();");
			
			$stmt->execute();
	
			$re = $stmt->get_result();	
	
			while ($row = $re->fetch_assoc()) {
				$result[] = array('product_category_name'=>$row['product_category_name'],'product_name'=>$row['product_name'],'brand_name'=>$row['brand_name'],'picture'=>$row['picture'],'unit_price'=>$row['unit_price'],'rate_average'=>$row['rate_average'],'rate_amount'=>$row['rate_amount']);
			}
			
			return $result;		
		}
	
		function ShowProductDetail($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$product = $param_array[0];
			$brand = $param_array[1];
			
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showProductDetail(?,?,@category,@product,@brand,@picture,@description,@price,@quantity,@rateAverage,@rateAmount);");
			
			$stmt->bind_param('ss',$product,$brand);
			$stmt->execute();
	
			if (!($res = $conn->query("SELECT @category as category,@product as product,@brand as brand,@picture as picture, @description as description,@price as price, @quantity as quentity, @rateAverage as rateAverage, @rateAmount as rateAmount"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
	
			while ($row = $res->fetch_assoc()) {
				$result[] = array('category'=>$row['category'],'product'=>$row['product'],'brand'=>$row['brand'],'picture'=>$row['picture'],'description'=>$row['description'],'price'=>$row['price'],'quantity'=>$row['quantity'],'rateAverage'=>$row['rateAverage'],'rateAmount'=>$row['rateAmount']);
			}	
			
			return $result;	
		}	
		
		function ShowProductList($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$category = $param_array[0];
			$sortingStrategy = $param_array[1];
			$minPrice = $param_array[2];
			$maxPrice = $param_array[3];
			$minRate = $param_array[4];
			$maxRate = $param_array[5];
			
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showProductList(?,?,?,?,?,?,@outQuery);");
			
			$stmt->bind_param('ssdddd',$category,$sortingStrategy,$minPrice,$maxPrice,$minRate,$maxRate);
			$stmt->execute();
			
			if (!($res = $conn->query("SELECT @outQuery as outQuery"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
			
			$tempRes = $res->fetch_assoc();
	
			$sql = $tempRes['outQuery'];
			
			if (!($res = $conn->query($sql))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
			
			// P.product_name, B.brand_name, P.picture, P.unit_price,', 'P.rate_average, P.rate_amount
			while ($row = $res->fetch_assoc()) {
				$result[] = array('product_name'=>$row['product_name'],'brand_name'=>$row['brand_name'],'unit_price'=>$row['unit_price'],'rate_average'=>$row['rate_average'],'rate_amount'=>$row['rate_amount']);
			}	
			
			return $result;	
		}	

	function ShowShoppingCart($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			
				
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showShoppingCart(?);");
			
			$stmt->bind_param('s',$email);
			$stmt->execute();
			
			$res=$stmt->get_result();
	
			while ($row = $res->fetch_assoc()) {
				$result[] = array('picture'=>$row['picture'],'product_name'=>$row['product_name'],'brand_name'=>$row['brand_name'],'quantity'=>$row['quantity'],'total_price'=>$row['total_price']);
			}	
			
			return $result;
		}
		function ShowAddressOptions($param_array)
		{

			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			
				
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showAddressOptions(?);");
			
			$stmt->bind_param('s',$email);
			$stmt->execute();
			
			$res=$stmt->get_result();
	
			while ($row = $res->fetch_assoc()) {
				$result[] = array('address'=>$row['address']);
			}	
			
			return $result;
		}
		function ShowPaymentMethodOptions($param_array)
		{

			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			
				
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  ShowPaymentMethodOptions(?);");
			
			$stmt->bind_param('s',$email);
			$stmt->execute();
			
			$res=$stmt->get_result();
	
			while ($row = $res->fetch_assoc()) {
				$result[] = array('card_number'=>$row['card_number'],'card_type_name'=>$row['card_type_name'],'name_on_card'=>$row['name_on_card'],'card_expired_year'=>$row['card_expired_year'],'card_expired_month'=>$row['card_expired_month'],'billing_address'=>$row['billing_address']);
			}	
			
			return $result;
		}
		
		function ShowRelatedProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$product = $param_array[0];
			$brand = $param_array[1];
			
			$conn = $this->conn;
			
			$result = array();
			
			$stmt = $conn->prepare("CALL  showRelatedProduct(?,?);");
			
			$stmt->bind_param('ss',$product,$brand);
			$stmt->execute();
			
			$re = $stmt->get_result();	
	
			while ($row = $re->fetch_assoc()) {
				$result[] = array('product_name'=>$row['product_name'],'brand_name'=>$row['brand_name'],'picture'=>$row['picture'],'unit_price'=>$row['unit_price'],'rate_average'=>$row['rate_average'],'rate_amount'=>$row['rate_amount']);
			}	
			
			return $result;	
		}	
		
		function ShowSelfProductRating($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
				
			$conn = $this->conn;
			
			$result = array();
	
			$stmt = $conn->prepare("CALL  showSelfProductRating(?,?,?,@rate,@comment,@time);");
			
			$stmt->bind_param('sss', $email,$product,$brand);
			$stmt->execute();
			
			if (!($res = $conn->query("SELECT @rate as rate,@comment as comment,@time as time"))) {
				echo "Fetch failed: (" . $conn->errno . ") " . $conn->error;
			}	
	
			while ($row = $res->fetch_assoc()) {
				$result[] = array('rate'=>$row['rate'],'comment'=>$row['comment'],'time'=>$row['time']);
			}	
			
			return $result;
		}	
		
		function UpdateCustomerProfile($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$firstname = $param_array[1];
			$lastname = $param_array[2];
			$birthday = $param_array[3];
			$company = $param_array[4];
			$invitationcode = $param_array[5];
			$address = $param_array[6];
			$phone = $param_array[7];
			$language = $param_array[8];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updateCustomerProfile(?,?,?,?,?,?,?,?,?);");
			$stmt->bind_param('sssssssss',$email,$firstname,$lastname,$birthday,$company,$invitationcode,$address,$phone,$language);
			$stmt->execute();		
			
			return true;
		}		
		
		function UpdatePassword($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$password = $param_array[1];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updatePassword(?,?);");
			$stmt->bind_param('ss',$email,$password);
			$stmt->execute();		
	
			return true;
		}		
		
		function UpdatePaymentMethod($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$cardNumber = $param_array[1];
			$name = $param_array[2];
			$expiredYear = $param_array[3];
			$expiredMonth = $param_array[4];
			$billAddress = $param_array[5];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updatePaymentMethod(?,?,?,?,?,?);");
			$stmt->bind_param('ssssss',$email,$cardNumber,$name,$expiredYear,$expiredMonth,$billAddress);
			$stmt->execute();		
			
			return true;	
		}		
		
		function UpdateProduct($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$name = $param_array[0];
			$oldBrand = $param_array[1];
			$newBrand = $param_array[2];
			$pic = $param_array[3];
			$description = $param_array[4];
			$price = $param_array[5];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updateProduct(?,?,?,?,?,?);");
			$stmt->bind_param('ssssss',$name,$oldBrand,$newBrand,$pic,$description,$price);
			$stmt->execute();		
			
			return true;
		}	
		
		function UpdateSalesmanProfile($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$firstname = $param_array[1];
			$lastname = $param_array[2];
			$address = $param_array[3];
			$phone = $param_array[4];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updateSalesmanProfile(?,?,?,?,?);");
			$stmt->bind_param('sssss',$email,$firstname,$lastname,$address,$phone);
			$stmt->execute();		
			
			return true;
		}		
	
		function UpdateShoppingCart($param_array)
		{
			if(!$this->checkAuthentication())
				throw new SOAPFault('Authenticated Failed',401);
			
			$email = $param_array[0];
			$product = $param_array[1];
			$brand = $param_array[2];
			$quality = $param_array[3];
			$totalPrice = $param_array[4];
			
			$conn = $this->conn;
			
			$stmt = $conn->prepare("CALL  updateShoppingCart(?,?,?,?,?);");
			$stmt->bind_param('sssss',$email,$product,$brand,$quality,$totalPrice);
			$stmt->execute();		
			
			return true;	
		}	
		
	}		
	
	// new SoapServer
	$svr = new SoapServer(null, array('uri'=>'http://127.0.0.1 '));
	$svr->setClass('AuthSoapServer');
		
	$svr->addFunction('checkAuthentication');	
	$svr->addFunction('ActivateProduct');
	$svr->addFunction('AddPaymentMethod');
	$svr->addFunction('AddShoppingCart');
	$svr->addFunction('CheckMailExisted');
	$svr->addFunction('CheckProductNameExisted');
	$svr->addFunction('DeleteCustomer');
	$svr->addFunction('DeletePaymentMethod');
	$svr->addFunction('DeleteProduct');
	$svr->addFunction('DeleteProductRating');
	$svr->addFunction('DeleteSalesman');
	$svr->addFunction('DeleteShoppingCart');
	$svr->addFunction('InsertProduct');
	$svr->addFunction('Login');
	$svr->addFunction('RateProduct');
	$svr->addFunction('RegisterCustomer');
	$svr->addFunction('RegisterSalesman');
	$svr->addFunction('ShowAllProductRating');
	$svr->addFunction('ShowPopularProduct');
	$svr->addFunction('ShowProductDetail');
	$svr->addFunction('ShowProductList');
	$svr->addFunction('ShowRelatedProduct');
	$svr->addFunction('ShowSelfProductRating');	
	$svr->addFunction('UpdateCustomerProfile');
	$svr->addFunction('UpdatePassword');
	$svr->addFunction('UpdatePaymentMethod');
	$svr->addFunction('UpdateProduct');
	$svr->addFunction('UpdateSalesmanProfile');
	$svr->addFunction('UpdateShoppingCart');
	$svr->addFunction('SearchProduct');
	$svr->addFunction('ShowShoppingCart');
	$svr->addFunction('ShowAddressOptions');
	$svr->addFunction('ShowPaymentMethodOptions');
	$svr->addFunction('AddAddress');

	$svr->handle();
?>