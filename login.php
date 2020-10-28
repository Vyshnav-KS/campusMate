<!DOCTYPE HTML>  
<html>
<head>
<link rel ="stylesheet" href="css/login.css">
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
			// Redirect to index
			header("Location: index.html");
			exit;		
		}

		$err = $result['err'];	
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
