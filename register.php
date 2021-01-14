<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="css/login.css">
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

<section class="login-page">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="box">
<div class="form-head">
<h2>Sign-up</h2>
</div>
<p><span class="error"><?php echo $err;?></span></p>
<div class="form-body">
<input type="text" name="name" placeholder="Username" value="<?php echo $name;?>"/>
<input type="password" placeholder="Password"  name="pass" value=""/>
<input type="password" placeholder="Verify  Password "  name="pass2" value=""><span class="error"><?php echo $pass_err;?></span>
</div>
<div class="form-footer">
<button type="submit" name="submit">Sign In</button>
</div>

<div class="login-help">
<a href="login.php">Login</a> • <a href="index.html">Back to home.</a>
</div>
</div>
</form>
</section>

</body>   <!-- git testing --> <!--using pull request--> <!-- just more testing ;) -->
</html>





