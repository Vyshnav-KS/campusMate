<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<meta name="viewport" content="width =device-width, initial-scale =1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href ="../../../css/semester.css">
<script src="../../../js/script.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Cucek</title>
</head>
<body>

<nav id ="HOME">
<div class="logo">
CUCEKMATE</div>
<label for="btn" class="icon">
<span class="fa fa-bars"></span>
</label>
<input type="checkbox" id="btn">
<ul>
<li><a href="../../../index.html">Home</a></li>
<li><a href="../../../index.html">About</a></li>
<li> <a href="#CONTACT">Contact</a></li>
<li><a href="login.php">Login</a></li>
<li><a href="register.php">Signup</a></li>
</ul>
</nav>

<h1 class="headingOne">Document uploader : </h1>
<h1 class="headingOne">Select Document type</h1>

<section class="cards-wrapper">

<div class="wrapper">

<div class="header">
	<h1 class="header__title">SELECT</h1>

</div>
		<div class="cards">	
				<div class=" card [ is-collapsed ] ">
					<a href="bookUploaderMenu.php">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="../../../images/icons/icons8-books-64.png"></span><br>
						E-BOOKS
					</div></a>
				</div>

				<div class=" card [ is-collapsed ] ">
					<a href="notesUploadMenu.php">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="../../../images/icons/icons8-notepad-80.png"></span><br>
						NOTES
					</div></a>
				</div>

				<div class=" card [ is-collapsed ] ">
					<a href="paperUploaderMenu.php">
					<div class="card__inner [ js-expander ]">
						<span class="cardLink"><img class="cardIcon" src="../../../images/icons/icons8-documents-64.png"></span><br>
						QUESTION PAPERS
					</div></a>
				</div>
</div>
</div>

</section>

</body>
</html>

