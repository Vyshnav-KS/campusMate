<?php
  include('utility.php');
  include('logger.php');

  // Function to register user
  function registerUser()
  {
    $return_val = array(
      'result' => true,
      'err'    => "",
      'pass_err' => ""
    );

    $usr_info = array(
      'name'  => ''
    );

    $logger = new Logger();
    $logger->addLog("Registering new user");

    // Chk all fields are filled
    if (empty($_POST["name"]) || empty($_POST["pass"]) || empty($_POST["pass2"])) 
		{
      $return_val['result'] = false;
      $return_val['err'] = "*Please fill data";
      return $return_val;
    }
    
		// Compare pass1 and pass2
		else if ($_POST["pass"] != $_POST["pass2"])
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
      $return_val['result'] = false;
      $return_val['err'] = "*Please select different user name.";
      $logger->addLog("Registration Failed : User $name already exists");
      return $return_val;
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

    $logger->addLog("Registration success : User $name was created.");
    return $return_val;
  }

  // Function to login user
  function loginUser()
  {
    $return_val = array(
      'result' => true,
      'err'    => "",
    );

    $logger = new Logger();

    if (empty($_POST["name"]) || empty($_POST["pass"]) ) 
    {
      $return_val['result'] = false;
      $return_val['err'] = "*Please fill data";
      return $return_val;
    } 

    $name = formatString($_POST["name"]);
    $pass = formatString($_POST["pass"]);
    $hash = crypt($name.$pass, "ZRsuP1Gi2112");

    $base_dir =  $_SERVER['DOCUMENT_ROOT'];

    if (!file_exists("$base_dir/Data/users/".$name."/".$hash))
    {
      $return_val['result'] = false;
      $return_val['err'] = "*Wrong username or password";
      return $return_val;
    }

    $ip = getClientIP();
    $IP_list_folder = "$base_dir/Data/IP_lists/";

    if (!file_exists($IP_list_folder))
    {
      mkdir($IP_list_folder, 0777, true);
    }

    $file = fopen($IP_list_folder.$ip, 'w');
    fwrite($file, $name);
    fclose($file);

    $logger->addLog("Login success : User $name logged in.");

    return $return_val;
  }


  function getUserName()
  {
    $ip = getClientIP();
    if ($ip == "") 
    {
      $logger = new Logger();
      $logger->addLog("Error : unable to get client IP.");
      return "";
    }

    $base_dir =  $_SERVER['DOCUMENT_ROOT'];
    $path = "$base_dir/Data/IP_lists/";

    if (!file_exists($path))
    {
      return "";
    }

    return file_get_contents($path);
  }
?>