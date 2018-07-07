
<?php
   require_once("DBComponent.php");
    require_once("AuthSoapClient.php");
    require_once("CommandEnum.php");

    $client = new AuthSoapClient(
        null, 
        array(
            'location'=>$GLOBALS["location"],
            'uri'=>$GLOBALS['uri'],
            'trace'=>true
        )
    );
    
    if(isset($_POST['submit']))
    {
        $reg_fName = $_POST['reg_fName'];
        $reg_lName = $_POST['reg_lName'];
        $reg_compName = $_POST['reg_compName'];
        $reg_birth = $_POST['reg_birth'];
        $reg_address = $_POST['reg_address'];
        $reg_invCode = $_POST['reg_invCode'];
        $reg_phone = $_POST['reg_phone'];
        $reg_email = $_POST['reg_email'];
        $reg_pass1 = $_POST['reg_pass1'];
        $reg_pass2 = $_POST['reg_pass2'];

        if (empty($_POST['reg_compName'])){
                    $reg_compName="NULL";
        }
        if (empty($_POST['reg_invCode'])){
                    $reg_invCode="NULL";
        }

        if($reg_pass1 == $reg_pass2) {
        $result=$client->SoapCommand(Command::RegisterCustomer,array($reg_fName,$reg_lName,$reg_birth,$reg_compName,$reg_invCode,$reg_address,$reg_phone,$reg_email,hash('sha256',$reg_pass1)));

//            echo $sql;

            if(!$result)
            	{
            		echo "Something Wrong";
            		exit;
            	}
            	else
            	{
            	    echo "New record inserted successfully";
            	}
        }
        else {
            echo "Error: Password and Re-typed Password do not match.";
        }

    }
?>