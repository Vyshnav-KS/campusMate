<!DOCTYPE HTML>  
<html>
<head>
<link rel ="stylesheet" href="login.css">
<?php

  include("php/utility.php");

  $err = "";
  $name = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
	if (empty($_POST["name"]) || empty($_POST["pass"]) ) 
	{
		$err = "*Please fill data";
	} 
	else 
	{
	  $name = formatString($_POST["name"]);
	  $pass = formatString($_POST["pass"]);
	  $hash = crypt($name.$pass, "ZRsuP1Gi2112");

	  if (!file_exists("Data/users/".$name."/".$hash))
	  {
	  	$err = "*Wrong username or password";
	  }
	  else
	  {
	    // Load Data
	  	// Redirect to some other page
	  	
	  }
	}
  }
  

?>

</head>
	<body class ="loginBody">  
	<div class ="loginBorder">
	<div class ="loginSection">
	<h2 class="login">Login</h2>
	<p><span class="error"><?php echo $err;?></span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <span class="userName">Username :</span> <input type="text" name="name" value="<?php echo $name;?>">
	  <br><br>
	  <span class="passWord"> Password :</span> <input type="password" name="pass" value="">
	  <br><br>
		  <input class="subMit" type="submit" name="submit" value="Submit">  
	</form>
	</div>
</div>      
	</body>
</html>
