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
			CAMPUS MATE</div>
	  <label for="btn" class="icon">
			  <span class="fa fa-bars"></span>
			</label>
			<input type="checkbox" id="btn">
			<ul>
	  <li><a href="index.html">Home</a></li>
	  <li><a href="index.html">About</a></li>
	  <!--<li> <a href="#CONTACT">Contact</a></li>
	  <li><a href="login.php">Login</a></li>
	  <li><a href="register.php">Signup</a></li>-->
	  </ul>
	  </nav>

<!-------------------------------------------PHP CODE -->
<?php
  $branch = "CSE";
  $sem = 1;
	if (isset($_GET['branch'])) 
	{
		$branch = $_GET['branch'];	
	}
	else
	{
		// Error
  }
	if (isset($_GET['sem'])) 
	{
		$sem = $_GET['sem'];	
	}
	else
	{
		// Error
  }
	
?>
<!-------------------------------------------------  -->
	<br>
<h1 class="headingOne">Category</h1>
    	

	<div class="wrapper">

<div class="header">
	<h1 class="header__title">SELECT</h1>

</div>
		<div class="cards">	
				<div class=" card [ is-collapsed ] ">
					<a href=<?php echo "\"downloadPage.php?branch=$branch&sem=$sem&type=books\"" ?> style="text-decoration: none;">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-books-64.png"></span><br>
						E-BOOKS
					</div></a>
				</div>

				<div class=" card [ is-collapsed ] ">
					<a href=<?php echo "\"downloadPage.php?branch=$branch&sem=$sem&type=notes\"" ?> style="text-decoration: none;">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-notepad-80.png"></span><br>
						NOTES
					</div></a>
				</div>

				<div class=" card [ is-collapsed ] ">
					<a href=<?php echo "\"downloadPage.php?branch=$branch&sem=$sem&type=questionpapers\"" ?> style="text-decoration: none;">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="images/icons/icons8-documents-64.png"></span><br>
						QUESTION PAPERS
					</div></a>
				</div>
</div>
</div>



</br></br>

<!--footer-->

<footer class="footer-distributed">

	<div class="footer-left">

		<h3><span class = "footerlogo">CAMPUS MATE</span></h3>

		<p class="footer-links">
			<a href="index.html">Home</a>
			·
		<!--	<a href="#">dhdhhd</a> 
			·
			<a href="#">hfhhhf</a>
			· -->
			<a href="index.html">About</a>
			·
			<a href="https://forms.gle/HZfRgycnb11wehym6">Feedback</a>
			·
			<!--<a href="#">Contact</a>-->
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
      
