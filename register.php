<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="css/register.css">
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
	<!--<h2>Register</h2>-->
	<p><span class="error"><?php echo $err;?></span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Hello There!</div>
      <div class='subtitle'>We're almost done. Before using our services you need to create an account.</div>
      <div class='input-fields'>
	  <input type="text" class='input-line full-width' name="name" placeholder="Username" value="<?php echo $name;?>">
	 <!-- <br><br>-->
	  <input type="password" placeholder="Password" class='input-line full-width' name="pass" value="">
	  <br><br>
	  <input type="password" placeholder="Verify  Password " class="input-line full-width" name="pass2" value=""><span class="error"><?php echo $pass_err;?></span>
	 <!-- <br><br>-->
	 </div>
	  <div class='spacing'>or continue with <span class='highlight'>Google+</span></div>
	  <div><!--<button class='ghost-round full-width'>-->
		  <input type="submit" class='ghost-round full-width' name="submit" value="Create Account">  
		<!--</button>--></div>
    </div></div></div>
	</form>
	</body>   <!-- git testing --> <!--using pull request--> <!-- just more testing ;) -->
</html>
