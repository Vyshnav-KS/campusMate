<!DOCTYPE HTML>  
<!---------------------PHP code included before HTML OUTPUT --------------------------->
<!---------------------This is done to set cookies 			--------------------------->
<?php

  include('php/DataBase.php');

  $err = "";
  $name = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
  	{
		if (!empty($_POST["name"])) 
		{
			$name = $_POST["name"];
		} 

		$result = loginUser();
		if ($result['result'] == true) 
		{
			// Redirect to the page
			if (isset($_GET['page']))
			{
				// Redirect to index
				header("Location: " . $_GET['page']);
				exit;
			}
			// Redirect to index
			header("Location: index.html");
			exit;		
		}

		$err = $result['err'];	
	}
?>

<!-------------------------------------HTML--Code-Here----------------------------------------->
<html>
<head>
<link rel ="stylesheet" href="css/login.css">

</head>
	<body>  
	<div class="login-card">
    <h1>Log-in</h1><br>
	<p><span class="error"><?php echo $err;?></span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" name="name" placeholder="Username" value="<?php echo $name;?>">
	 
	<input type="password" placeholder="Password" name="pass" value="">
	  
		  <input class="login login-submit" type="submit" name="submit" value="Login">
	</form>
	<div class="login-help">
    <a href="register.php">Register</a> • <a href="index.html">Back to home.</a>
  </div>
	
</div>      
	</body>
</html>
