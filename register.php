<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="css/login.css">
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
		$result = registerUser();
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
	<div class="login-card">
    <h1>Sign-up</h1><br>
	<!--<h2>Register</h2>-->
	<p><span class="error"><?php echo $err;?></span></p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


	  <input type="text"  name="name" placeholder="Username" value="<?php echo $name;?>">
	 <!-- <br><br>-->
	  <input type="password" placeholder="Password"  name="pass" value="">
	  <br><br>
	  <input type="password" placeholder="Verify  Password "  name="pass2" value=""><span class="error"><?php echo $pass_err;?></span>
	 <!-- <br><br>-->
	 <input type="submit" class="login login-submit" name="submit" value="Create Account"> 
	 </form>
	
	  <!--<div class='spacing'>or continue with <span class='highlight'>Google+</span></div>-->
      <div class="login-help">
    <a href="login.php">Login</a> • <a href="#">G+</a>
  </div>
</div>
	
	</body>   <!-- git testing --> <!--using pull request--> <!-- just more testing ;) -->
</html>
