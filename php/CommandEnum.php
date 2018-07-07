<?php
require_once("Enum.php");
class Command extends Enum {
    const __default = 0;
    
    const ActivateProduct = 1;
    const AddPaymentMethod = 2;
    const AddShoppingCart = 3;
    const CheckMailExisted = 4;
    const CheckProductNameExisted = 5;
    const DeleteCustomer = 6;
    const DeletePaymentMethod = 7;
    const DeleteProduct = 8;
    const DeleteProductRating = 9;
    const DeleteSalesman = 10;
    const DeleteShoppingCart = 11;
    const InsertProduct = 12;
    const Login = 13;
    const RateProduct = 14;
    const RegisterCustomer = 15;
    const RegisterSalesman = 16;
    const ShowAllProductRating = 17;
    const ShowProductDetail = 18;
    const ShowProductList = 19;
    const ShowRelatedProduct = 20;
    const ShowSelfProductRating = 21;
    const UpdateCustomerProfile = 22;
    const UpdatePassword = 23;
    const UpdatePaymentMethod = 24;
    const UpdateProduct = 25;
    const UpdateSalesmanProfile = 26;
    const UpdateShoppingCart = 27;
    const ShowPopularProduct = 28;
    const SearchProduct = 29;
    const ShowShoppingCart=30;
    const ShowAddressOptions=31;
    const ShowPaymentMethodOptions=32;
    const AddAddress=33;
}
?>