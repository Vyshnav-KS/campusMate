<?php
  include('utility.php');

  
  function registerUser($data)
  {
    $return_val = array(
      'result' => true,
      'err'    => "",
      'pass_err' => ""
    );

    $usr_info = array(
      'name'  => ''
    );

    // Chk all fields are filled
    if (empty($data["name"]) || empty($data["pass"]) || empty($data["pass2"])) 
		{
      $return_val['result'] = false;
      $return_val['err'] = "*Please fill data";
      return $return_val;
    }
    
		// Compare pass1 and pass2
		else if ($data["pass"] != $data["pass2"])
		{
      $return_val['result'] = false;
      $return_val['pass_err'] = "*Password did not match";
      return $return_val;
    }
    

    $name = formatString($_POST["name"]);
    $pass = formatString($_POST["pass"]);
    $hash = crypt($name.$pass, "ZRsuP1Gi2112");

    $base_dir =  $_SERVER['DOCUMENT_ROOT'];

    // User dir
    $folder_path = "$base_dir/Data/users/".$name."/";

    // Chk username availability
    if (file_exists($folder_path))
    {
      $err = "*Please select different user name.";
    }
    // Create new user
    else
    {
      mkdir($folder_path, 0777, true);
      $file = fopen($folder_path.$hash, 'w');
      fwrite($file, "1");
      fclose($file);

      $file = fopen($folder_path."userInfo.dat", 'w');
      $usr_info['name'] = $name;
      fwrite($file, json_encode($usr_info));
      fclose($file);
    }

    return $return_val;
  }
?>