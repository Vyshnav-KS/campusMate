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

function api_Login($args) {
}

function api_Register($args) {
    $_POST["name"] = $args["p0"];
    $_POST["pass"] = $args["p1"];
    $_POST["pass2"] = $args["p1"];

    $result = registerUser();
    echo json_encode($result);
}

function api_Test() {
    $result = array();
    $result["result"]   = True;
    $result["err_msg"]  = "This is working!!!!.";
    return $result;
}
?>
