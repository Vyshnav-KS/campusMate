<!DOCTYPE HTML>  
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous"
/>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400"
  rel="stylesheet"
/>
<style>
.error {color: #FF0000;}
</style>


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
	
	<div id="form_wrapper">
	  <div id="form_left">
		<img src="images/compicon.png" alt="computer icon" />
	  </div>
	  <div id="form_right">
		
		<h1>Signup</h1>
		<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p><span class="error"><?php echo $err;?></span></p>
		<div class="input_container">
		  <i class="fas fa-user"></i>
		  <input
			id="field_email"
			class="input_field"
			type="text" 
			name="name" 
			placeholder="Username" 
			value="<?php echo $name;?>"
		  />
		
		</div>
		<div class="input_container">
		  <i class="fas fa-lock"></i>
		  <input
			id="field_password"
			class="input_field"
			type="password" 
			placeholder="Password"  
			name="pass" value=""
		  />
		</div>
		<div class="input_container">
		  <i class="fas fa-lock"></i>
		  <input
			id="field_password"
			class="input_field"
			type="password" 
			placeholder="Verify  Password "  
			name="pass2" value=""
		  />
		  <span class="error"><?php echo $pass_err;?></span>
		</div>
		<input
		  type="submit"
		  value="Signup"
		  id="input_submit"
		  class="input_field"
		/>
	</form>
		<span><a href="login.php">Login</a></span>
		<span id="create_account">
		  <a href="index.html">Back to home ➡ </a>
		</span>
	  </div>
	</div>
  </body>
</html>





