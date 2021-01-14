<?php


function evalRequest(&$function_map) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fun_name   = $_POST["fun_name"];
        $result     = array( "result" => True, "err_msg" => "");

        // Check request function
        if ($fun_name == "") {
            $result["result"]   = False;
            $result["err_msg"]  = "Function name not provided in request.";
            echo json_encode($result);
            exit;
        } 
        else if (in_array($fun_name, $function_map)) {
            $result["result"]   = False;
            $result["err_msg"]  = "Function $fun_name not found.";
            echo json_encode($result);
            exit;
        }

        // Argument Checks
        $arg_c = $function_map[$fun_name]["arg_c"];
        if($arg_c != $_POST["arg_c"]){
            $result["result"]   = False;
            $result["err_msg"]  = "Invalid argument count, expected $arg_c";
            echo json_encode($result);
            exit;
        }

        // Get Arguments if there are arguments
        if($arg_c != 0){
            $args = array();
            $args_types = $function_map[$fun_name]["args_types"];
            for($i = 0; $i < $arg_c ; $i++)
            {
                switch($args_types[$i]) {
                    case "str":
                        $args["p$i"] = $_POST["arg_$i"];
                        break;
                    case "int":
                        $args["p$i"] = (int)$_POST["arg_$i"];
                        break;
                }
            }

            $result = $function_map[$fun_name]["name"]($args);
        }
        else {
            $result = $function_map[$fun_name]["name"]();
        }

        // Output result
        echo json_encode($result);
    }
}
?>
