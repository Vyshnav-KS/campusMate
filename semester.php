<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width =device-width, initial-scale =1.0">
	<script src="js/script.js"></script>
	<link rel="stylesheet" href ="css/semseter.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>SEMSTERS</title>
</head>
<body>

	
	<div class="topNavbar" id = "myTopnavbar">
		<a href="#HOME">HOME</a>
		<a href="#ABOUT">ABOUT</a>
		<a href="#CONTACT">CONTACT</a>
		<a href="#FEEDBACK">FEEDBACK</a>
		<div class = "inPut">
		<a class="login" href ="login.php">LOGIN</a>
		<a class ="signup" href ="register.php">SIGNUP</a>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="topNavfn()">
			<i class="fa fa-bars"></i>
		</a>
	  </div> 
	
	
	  <div class="header">
		  <a href="#LOGO" class="logo">LOGO</a>
		</div>
	

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
	
<h1 class="headingOne">SEMSTERS</h1>
    	
	<section class="cards-wrapper">
	
		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=1\"" ?>>
				<h1>S1</h1>
			</a>
		</div>

		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=2\"" ?>>
				<h1>S2</h1>
			</a>
		</div>

		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=3\"" ?>>
				<h1>S3</h1>
			</a>
		</div>

		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=4\"" ?>>
				<h1>S4</h1>
			</a>
		</div>


		<div class="card-grid-space">
		  <a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=5\"" ?>>
			  <h1>S5</h1>
		  </a>
		</div>

		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=6\"" ?>>
				<h1>S5</h1>
			</a>
		</div>
		
		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=7\"" ?>>
				<h1>S6</h1>
			</a>
		</div>

		<div class="card-grid-space">
			<a class="card" href= <?php echo "\"downloadPage.php?branch=$branch&sem=8\"" ?>>
				<h1>S7</h1>
			</a>
		</div>

	</section>



</body>
</html>
      
