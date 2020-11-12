<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width =device-width, initial-scale =1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href ="css/semester.css">
	<script src="js/script.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cucek</title>
</head>
<body>

		  <nav id ="HOME">
			<div class="logo">
	  Our Logo</div>
	  <label for="btn" class="icon">
			  <span class="fa fa-bars"></span>
			</label>
			<input type="checkbox" id="btn">
			<ul>
	  <li><a href="#HOME">Home</a></li>
	  <li><a href="#ABOUT">About</a></li>
	  <li> <a href="#CONTACT">Contact</a></li>
	  <li><a href="login.php">Login</a></li>
	  <li><a href="register.php">Signup</a></li>
	  </ul>
	  </nav>

<!-------------------------------------------PHP CODE -->
<?php
	$branch = "CSE";
	if (isset($_GET['branch'])) 
	{
		$branch = $_GET['branch'];	
	}
	else
	{
		// Error
	}
	
?>
<!-------------------------------------------------  -->

<div class="wrapper">

<div class="header">
	<h1 class="header__title">SELECT YOUR BRANCH</h1>

</div>


 <div class="cards">			
	<div class=" card [ is-collapsed ] ">
		<a href=<?php echo "\"category.php?branch=$branch&sem=1\"" ?> style="text-decoration: none;">
		<div class="card__inner [ js-expander ]">
			<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-folder-100.png"></span><br>
			semester 1
		</div></a>
	</div>
</div>

<div class="cards">			
	<div class=" card [ is-collapsed ] ">
		<a href=<?php echo "\"category.php?branch=$branch&sem=1\"" ?> style="text-decoration: none;">
		<div class="card__inner [ js-expander ]">
			<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-folder-100.png"></span><br>
			semester 1
		</div></a>
	</div>
</div>

<div class="cards">			
	<div class=" card [ is-collapsed ] ">
		<a href=<?php echo "\"category.php?branch=$branch&sem=1\"" ?> style="text-decoration: none;">
		<div class="card__inner [ js-expander ]">
			<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-folder-100.png"></span><br>
			semester 1
		</div></a>
	</div>
</div>
</div>

	




</body>
</html>
      
