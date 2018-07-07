<?php
require_once("CommandEnum.php");
require_once('DBComponent.php'); 
class AuthSoapClient 
{
	public function __construct()
	{
		$params = array(
			'location'=>$GLOBALS["location"],
			'uri'=>$GLOBALS['uri'],
			'trace'=>true);
		
		$this->instance = new SoapClient(null,$params);
		// set header
		$auth_params  = new stdClass();
		$auth_params->username = 'admin';
		$auth_params->password = hash('sha256','GTP@ssw0rd');
		
		$header_params = new SoapVar($auth_params,SOAP_ENC_OBJECT);
		$header = new SoapHeader('GT','authenticate',$header_params,false);
		$this->instance->__setSoapHeaders(array($header));
		
	}	
	
	public function __getLastResponse()
	{
		return $this->instance->__getLastResponse(); 
	}
	
	public function SoapCommand($commandType,$param_array)
	{
		switch($commandType)
		{
			case Command::ActivateProduct:
				return $this->instance->__soapCall('ActivateProduct',array($param_array));
			case Command::AddPaymentMethod:
				return $this->instance->__soapCall('AddPaymentMethod',array($param_array));
			case Command::AddShoppingCart:
				return $this->instance->__soapCall('AddShoppingCart',array($param_array));
			case Command::CheckMailExisted:
				return $this->instance->__soapCall('CheckMailExisted',array($param_array));
			case Command::CheckProductNameExisted:
				return $this->instance->__soapCall('CheckProductNameExisted',array($param_array));
			case Command::DeleteCustomer:
				return $this->instance->__soapCall('DeleteCustomer',array($param_array));
			case Command::DeletePaymentMethod:
				return $this->instance->__soapCall('DeletePaymentMethod',array($param_array));
			case Command::DeleteProduct:
				return $this->instance->__soapCall('DeleteProduct',array($param_array));
			case Command::DeleteProductRating:
				return $this->instance->__soapCall('DeleteProductRating',array($param_array));
			case Command::DeleteSalesman:
				return $this->instance->__soapCall('DeleteSalesman',array($param_array));
			case Command::DeleteShoppingCart:
				return $this->instance->__soapCall('DeleteShoppingCart',array($param_array));
			case Command::InsertProduct:
				return $this->instance->__soapCall('InsertProduct',array($param_array));
			case Command::Login:
				return $this->instance->__soapCall('Login',array($param_array));
			case Command::RateProduct:
				return $this->instance->__soapCall('RateProduct',array($param_array));
			case Command::RegisterCustomer:
				return $this->instance->__soapCall('RegisterCustomer',array($param_array));
			case Command::RegisterSalesman:
				return $this->instance->__soapCall('RegisterSalesman',array($param_array));
			case Command::ShowAllProductRating:
				return $this->instance->__soapCall('ShowAllProductRating',array($param_array));
			case Command::ShowProductDetail:
				return $this->instance->__soapCall('ShowProductDetail',array($param_array));
			case Command::ShowProductList:
				return $this->instance->__soapCall('ShowProductList',array($param_array));
			case Command::ShowRelatedProduct:
				return $this->instance->__soapCall('ShowRelatedProduct',array($param_array));
			case Command::ShowSelfProductRating:
				return $this->instance->__soapCall('ShowSelfProductRating',array($param_array));
			case Command::UpdateCustomerProfile:
				return $this->instance->__soapCall('UpdateCustomerProfile',array($param_array));
			case Command::UpdatePassword:
				return $this->instance->__soapCall('UpdatePassword',array($param_array));
			case Command::UpdatePaymentMethod:
				return $this->instance->__soapCall('UpdatePaymentMethod',array($param_array));
			case Command::UpdateProduct:
				return $this->instance->__soapCall('UpdateProduct',array($param_array));
			case Command::UpdateSalesmanProfile:
				return $this->instance->__soapCall('UpdateSalesmanProfile',array($param_array));
			case Command::UpdateShoppingCart:
				return $this->instance->__soapCall('UpdateShoppingCart',array($param_array));
			case Command::ShowPopularProduct:
				return $this->instance->__soapCall('ShowPopularProduct',array());	
			case Command::SearchProduct:
				return $this->instance->__soapCall('SearchProduct',array($param_array));				
			case Command::ShowShoppingCart:
				return $this->instance->__soapCall('ShowShoppingCart',array($param_array));				
			case Command::ShowAddressOptions:
				return $this->instance->__soapCall('ShowAddressOptions',array($param_array));		
			case Command::ShowPaymentMethodOptions:
				return $this->instance->__soapCall('ShowPaymentMethodOptions',array($param_array));		
			case Command::AddAddress:
				return $this->instance->__soapCall('AddAddress',array($param_array));		
			case Command::__default:
				throw new SOAPFault('Wrong Command',401);
			
		}
	}
}
?>