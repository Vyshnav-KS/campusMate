<?php
  
  // Database MGMT

  include('utility.php');
  include('logger.php');

  // Function to register user
  function registerUser()
  {
    // Return value
    $return_val = array(
      'result' => true, // success
      'err'    => "",   // err msg
      'pass_err' => ""  // wrong pass err msg
    );

    // User data
    $usr_info = array(
      'name'  => ''
    );

    // Logger
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
    $pass = $_POST["pass"];
    
    if ($name == false) 
    {
      $return_val['result'] = false;
      $return_val['err'] = "*User name should not contain special characters.";
      return $return_val;
    }

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
      $file = fopen($folder_path."userInfo.dat", 'w');
      $usr_info['name'] = $name;
      $usr_info['hash'] = $hash;
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

    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $hash = crypt($name.$pass, "ZRsuP1Gi2112");

    $base_dir =  $_SERVER['DOCUMENT_ROOT'];

    // Chk existance
    if (!file_exists("$base_dir/Data/users/".$name."/userInfo.dat"))
    {
      $return_val['result'] = false;
      $return_val['err'] = "*Wrong username or password";
      return $return_val;
    }

    // Default : method of login (Cookie)
    // Fallback method : IP based (To be done)
    if (!isCookiesEnabled()) 
    {
      $logger->addLog("Error : Cookies not enabled, login_key");
    }

    // Set cookies
    setcookie("login_key", $hash, time() + (86400 * 30), "/");
    setcookie("login_id", $name, time() + (86400 * 30), "/");

    $logger->addLog("Login success : User $name logged in.");
    return $return_val;
  }

  // Get username of user
  // returns false if not signed in
  function getUserName()
  {
    $logger = new Logger();

    // Default : method of login (Cookie)
    // Fallback method : IP based (To be done)
    if (!isCookiesEnabled()) 
    {
      $logger->addLog("Error : Cookies not enabled");
      return false;
    }

    if(!isset($_COOKIE["login_key"]) || !isset($_COOKIE["login_id"])) 
    {
      $logger->addLog("No login key found for this user");
      return false;
    }

    $logger->addLog("Login key found for this user");
    $base_dir =  $_SERVER['DOCUMENT_ROOT'];
    $file_path = "$base_dir/Data/users/".$_COOKIE['login_id']."/userInfo.dat";

    if (!file_exists($file_path))
    {
      $logger->addLog("Error : User ".$_COOKIE['login_id']." does not exists.");
      return false;
    }

    $data = file_get_contents($file_path);
    $data = json_decode($data, true);

    if ($data['hash'] != $_COOKIE["login_key"]) 
    {
      $logger->addLog("Fatal Error : Password miss-match for user ".$_COOKIE['login_id']);
      return false;
    }

    return $_COOKIE['login_id'];
  }
?>