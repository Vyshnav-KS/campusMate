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
<link rel ="stylesheet" href="css/login.css">
</head>
<body>

<section class="login-page">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?page=$next_page";?>">
<div class="box">
<div class="form-head">
<h2>Member Login</h2>
</div>
<p><span class="error"><?php echo $err;?></span></p>
<div class="form-body">
<input type="text" name="name" placeholder="Username" value="<?php echo $name;?>"/>
<input type="password" placeholder="Password" name="pass" value="" />
</div>
<div class="form-footer">
<button type="submit" value="Login">Sign In</button>
</div>

<div class="login-help">
<a href="register.php">Register</a> • <a href="index.html">Back to home.</a>
</div>
</div>
</form>
</section>

</body>
</html>
