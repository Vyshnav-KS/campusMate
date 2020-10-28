<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>


<!------------------------PHP-------------------------------------------------------->
<?php

  include("php/DataBase.php");
  
	// Error text
	$err = "";
	// Password error text
	$pass_err = "";
	// username text
  $name = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
		// Chk all fields are filled
		if (!empty($_POST["name"])) 
		{
			$name = $_POST["name"];
		}

		// Register User
		$result = registerUser($_POST);
		// Check result
		if ($result['result'] == true) 
		{
			// Redirect to login page
			header("Location: login.php");
			exit;  
		}
		else
		{
			// Get error text
			$err = $result['err'];
			// Get Password miss-match error text
			$pass_err = $result['pass_err'];
		}
  }
?>

<!------------------------HTML-------------------------------------------------------->

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
	</body>   <!-- git testing -->
</html>
