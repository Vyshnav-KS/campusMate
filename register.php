<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>

<?php

  include("php/utility.php");

  $err = "";
  $pass_err = "";
  $name = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
	if (empty($_POST["name"]) || empty($_POST["pass"]) || empty($_POST["pass2"])) 
	{
	  $err = "*Please fill data";
	}
	else if ($_POST["pass"] != $_POST["pass2"])
	{
	  $name = $_POST["name"];
	  $pass_err = "*Password did not match";
	} 
	else
	{
	  $name = formatString($_POST["name"]);
	  $pass = formatString($_POST["pass"]);
	  $hash = crypt($name.$pass, "ZRsuP1Gi2112");

	  $folder_path = "Data/users/".$name."/";

	  if (file_exists($folder_path))
	  {
	  	$err = "*Please select different user name.";
	  }
	  else
	  {
	    mkdir($folder_path, 0777, true);
	    $file = fopen("$folder_path.$hash", 'w');
	    fclose($file);

	    $file = fopen('$folder_path."userInfo.dat"', 'w');

	    $data = array(
	    	'name' => "$name",
	    );

	    fwrite($file, json_encode($data));
		fclose($file);
		header("Location: login.php");
		exit;  
	  }
	}
  }
  

?>

</head>
	<body>  
	<h2>Register</h2>
	<p><span class="error"><?php echo $err;?></span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  Username : <input type="text" name="name" value="<?php echo $name;?>">
	  <br><br>
	  Password : <input type="password" name="pass" value="">
	  <br><br>
	  Verify  Password : <input type="password" name="pass2" value=""><span class="error"><?php echo $pass_err;?></span>
	  <br><br>
	 	 <input type="submit" name="submit" value="Submit">  
	</form>
	</body>
</html>
