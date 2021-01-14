<?php

include("../DataBase.php"); 
include("evalRequest.php");

$function_map = array(
    "fun_login" => array(
        "name"          => "api_Login",
        "arg_c"         => "2",
        "args_types"    => array("str", "str")
        ),

    "fun_register" => array(
        "name"          => "api_Register",
        "arg_c"         => "2",
        "args_types"    => array("str", "str")
        ),

    "fun_test" => array(
        "name"          => "api_Test",
        "arg_c"         => "0"
        ),
    );

# Main -------------------------------------------------------------------
evalRequest($function_map);
# Api Functions ----------------------------------------------------------

function api_Register($args) {
    $_POST["name"] = $args["p0"];
    $_POST["pass"] = $args["p1"];
    $_POST["pass2"] = $args["p1"];

    $result = registerUser();
    echo json_encode($result);
}


function api_Login($args) {
    $return_val = array(
	    'result' => true,
	    'err'    => "",
	    );

    $logger = new Logger();

    $name = $args["p0"];
    $pass = $args["p1"];
    $hash = password_hash($name.$pass, PASSWORD_DEFAULT);
    $base_dir =  $_SERVER['DOCUMENT_ROOT'];

    // Chk existance
    if (!file_exists("$base_dir/Data/users/".$name."/userInfo.dat"))
    {
	$return_val['result'] = false;
	$return_val['err'] = "Wrong username or password";
	echo json_encode($return_val);
        return;
    }

    $data = file_get_contents("$base_dir/Data/users/".$name."/userInfo.dat");
    $data = json_decode($data, true);

    if (!password_verify($name.$pass, $data['hash'])) 
    {
	$return_val['result'] = false;
	$return_val['err'] = "Wrong username or password";
	echo json_encode($return_val);
        return;
    }

    $logger->addLog("Login success : User $name logged in.");
    echo json_encode($return_val);
}
