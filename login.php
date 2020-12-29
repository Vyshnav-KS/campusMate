<!DOCTYPE HTML>  
<?php
//---------------------PHP code included before HTML OUTPUT --------------------------->
//<!---------------------This is done to set cookies 			--------------------------->

include('php/DataBase.php');

$err = "";
$name = "";

$next_page = "index.html";
if (!empty($_GET['page']))
{
    $next_page = $_GET['page'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (!empty($_POST["name"])) 
    {
	$name = $_POST["name"];
    } 

    $result = loginUser();
    if ($result['result'] == true) 
    {
	// Redirect to page
	header("Location: $next_page");
	exit;		
    }

    $err = $result['err'];	
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href="css/login.css">
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
</head>


<body>
	
	<div id="form_wrapper">
	  <div id="form_left">
		<img src="images/compicon.png" alt="computer icon" />
	  </div>
	  <div id="form_right">
		
		<h1>Login</h1>
		<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?page=$next_page";?>">
		<p><span class="error"><?php echo $err;?></span></p>
		<div class="input_container">
		  <i class="fas fa-user"></i>
		  <input
			id="field_email"
			class="input_field"
			type="text" name="name" 
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
		
		
		<input
		type="submit" value="Login"
		  id="input_submit"
		  class="input_field"
		/>
	</form>
		<span><a href="register.php">Signup</a></span>
		<span id="create_account">
		  <a href="index.html">Back to home ➡ </a>
		</span>
	  </div>
	</div>

</body>
</html>
