<html>
<head></head>
<body>
<?php
require_once("DBComponent.php");
require_once("AuthSoapClient.php");
require_once("CommandEnum.php");
session_start();
// create the database component
// $db = new DBComponent();
// $db->Connect_DB();

$client = new AuthSoapClient(
    null,
    array(
        'location' => $GLOBALS["location"],
        'uri' => $GLOBALS['uri'],
        'trace' => true
    )
);

$SignInUser = $_POST['SignInUser'];
$SignInPass = hash('sha256', $_POST['SignInPass']);


if (!is_null($SignInUser) && !is_null($SignInPass)) {
    // $sql="Select users_type_id from Users where email='$SignInUser' and `password`='$SignInPass' and deleted=0 limit 1;";
    $loginStatus = array();

    $loginStatus = $client->SoapCommand(Command::Login, array($SignInUser, $SignInPass));
    if ($loginStatus[0]["status"])
        echo "Login Successed! <br>The user type is : " . $loginStatus[0]["type"];
    else
        echo "Login Failed!";

    print_r($loginStatus);

    // $UserData=$result->fetch_assoc();
    $UserTypeID = $loginStatus[0]["type"];
    echo "Status User" . $UserTypeID;

    if (is_null($UserTypeID)) {
        echo "Something Wrong";
        exit;
    } else {

        switch ($UserTypeID) {
            case 'Administrator':
                $_SESSION['loggedin'] = 1;
                $_SESSION["userid"] = $SignInUser;
                header('Location: AdministratorAccount.php');
                break;
            case 'Customer':
                $_SESSION['loggedin'] = 1;
                $_SESSION["userid"] = $SignInUser;
                header('Location: CustomerAccount.php');
                break;
            case 'Salesman':
                $_SESSION['loggedin'] = 1;
                $_SESSION["userid"] = $SignInUser;
                header('Location: SalesmanAccount.php');
                break;
            default:
                echo " User " . $SignInUser . " Not Found or Wrong Password!";
        }

    }
}


?>
</body>
</html>