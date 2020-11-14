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
	  <li><a href="index.html">Home</a></li>
	  <li><a href="index.html">About</a></li>
	  <li> <a href="#CONTACT">Contact</a></li>
	  <!--<li><a href="login.php">Login</a></li>
	  <li><a href="register.php">Signup</a></li>-->
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
	<h1 class="header__title">SELECT YOUR SEMESTER</h1>

</div>
<div class="cards">	
	<?php
		for ($i=1; $i <= 8; $i+= 1) 
		{ 
	?>

					
				<div class=" card [ is-collapsed ] ">
					<a href=<?php echo "\"category.php?branch=$branch&sem=$i\"" ?> style="text-decoration: none;">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-folder-100.png"></span><br>
						semester <?php echo $i ?>
					</div></a>
				</div>
			

	<?php 
		}
	?>

				<div class=" card [ is-collapsed ] ">
					<a href="#" style="text-decoration: none;">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-syllabus-80.png"></span><br>
						syllabus
					</div></a>
				</div>
	</div>	
</div>


<!--footer-->

<footer class="footer-distributed">

	<div class="footer-left">

		<h3><span class = "footerlogo">Company</span><span>logo</span></h3>

		<p class="footer-links">
			<a href="#">Home</a>
			·
			<a href="#">About</a>
			·
			<a href="https://forms.gle/HZfRgycnb11wehym6">Feedback</a>
		</p>

		<p class="footer-company-name">Company Name © 2020</p>

		<div class="footer-icons">

			<a href="#"><i><img class= "icongh" src="images/icons/github.png"></i></a>
			<a href="#"><i><img class="icongm" src="images/icons/gmail.png"></i></a>

		</div>

	</div>

	<div id="CONTACT" class="footer-right">

		<p>Contact Us</p>

		<form action="#" method="post">

			<input type="text" name="email" placeholder="Email">
			<textarea name="message" placeholder="Message"></textarea>
			<button>Send</button>

		</form>

	</div>

</footer> 

</body>
</html>
      
