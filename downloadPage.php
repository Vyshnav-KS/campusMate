<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width =device-width, initial-scale =1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script href="js/dist/script.dev.js" ></script>
	<link rel="stylesheet" href ="css/LinkPage.css">
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
	  <li>
				<!--<label for="btn-1" class="show">About +</label>-->
				<a href="#ABOUT">About</a>
				<!--<input type="checkbox" id="btn-1">
				<ul>
	  <li><a href="#">Pages</a></li>
	  <li><a href="#">Elements</a></li>
	  <li><a href="#">Icons</a></li>
	  </ul>-->
	  </li>
	  <li>
			<!--	<label for="btn-2" class="show">Services +</label> -->
				<a href="#CONTACT">Contact</a>
			<!--	<input type="checkbox" id="btn-2">
				<ul>
	  <li><a href="#">Menu 1</a></li>
	  <li><a href="#">Menu 2</a></li>
	  <li>
					<label for="btn-3" class="show">More +</label> 
					<a href="#">More <span class="fa fa-plus"></span></a>
					<input type="checkbox" id="btn-3">
					<ul>
	  <li><a href="#">Submenu-1</a></li>
	  <li><a href="#">Submenu-2</a></li>
	  <li><a href="#">Submenu-3</a></li>
	  </ul>
	  </li>
	  </ul>-->
	  </li>
	  <li><a href="login.php">Login</a></li>
	  <li><a href="register.php">Signup</a></li>
	  </ul>
	  </nav>

    <?php

			$branch = "cse";
			$sem = "1";
			$type = "books";

			isset($_GET['branch']) && $branch = $_GET['branch'];
			isset($_GET['sem']) 	 && $sem = $_GET['sem'];
			isset($_GET['type']) 	 && $type = $_GET['type'];


			echo "<div class=\"h1\"><h1>$branch semester $sem : $type </h1></div>";
			
      $file = "Data/pages/".$branch.$sem."_".$type.".json";
      if (!file_exists($file)) 
      {
				goto last_line;
			}
			
			$data = file_get_contents($file);
			$data = json_decode($data, true);

			// Html generator
			foreach ($data as $key => $value) 
			{
				if ($type == "books")
				{
					$book_name 		= $value['book_name'];
					$subject_name = $value['subject_name'];
					$author_name	= $value['author_name'];
					$details 			= $value['details'];
					$file 				= $value['file'];
	
					$out_data = "<div class=\"Bookshelf-Container\"><ul class=\"Bookshelf\">";
					$out_data = $out_data."<li><a class=\"subjectName\" >$subject_name</a></li>";
					$out_data = $out_data."<li><a class=\"BookName\">$book_name</a></li>";
					$out_data = $out_data."<li><a class=\"AuthorName\">by $author_name</a></li>";
					$out_data = $out_data."<li ><a class=\"BookDetails\">Details : $details</a></li>"."";
					$out_data = $out_data."<li class = \"AfterButton\"><button class=\"downloadButton\" onclick=\"document.location='php/downloader.php?file=$file'\">Download</button></li></ul></div><br>";
	
					echo $out_data;
				}
				else if ($type == "notes") 
				{
					$note_name 	= $value['note_name'];
					$subject 		= $value['subject'];
					$details		= $value['details'];
					$file				= $value['file'];

					$out_data = "<div class=\"Bookshelf-Container\"><ul class=\"Bookshelf\">";
					$out_data = $out_data."<li><a class=\"subjectName\" >$subject</a></li>";
					$out_data = $out_data."<li><a class=\"BookName\">$note_name</a></li>";
					$out_data = $out_data."<li ><a class=\"BookDetails\">Details : $details</a></li>"."";
					$out_data = $out_data."<li class = \"AfterButton\"><button class=\"downloadButton\" onclick=\"document.location='php/downloader.php?file=$file'\">Download</button></li></ul></div><br>";
	
					echo $out_data;
				}
				else if ($type == "papers") 
				{
					$paper_name 	= $value['paper_name'];
					$subject 		= $value['subject'];
					$details		= $value['details'];
					$file				= $value['file'];

					$out_data = "<div class=\"Bookshelf-Container\"><ul class=\"Bookshelf\">";
					$out_data = $out_data."<li><a class=\"subjectName\" >$subject</a></li>";
					$out_data = $out_data."<li><a class=\"BookName\">$paper_name</a></li>";
					$out_data = $out_data."<li ><a class=\"BookDetails\">Details : $details</a></li>"."";
					$out_data = $out_data."<li class = \"AfterButton\"><button class=\"downloadButton\" onclick=\"document.location='php/downloader.php?file=$file'\">Download</button></li></ul></div><br>";
	
					echo $out_data;
				}
			}

			last_line:
    ?>


	  <!-- <div class="Bookshelf-Container">
		<ul class="Bookshelf">	
			<li><a class="subjectName" href="#">Subject Name</a></li>
			<li><a class="BookName" href="#">Book Name</a></li>
			<li><a class="AuthorName" href="#">Author Name</a></li>
			<li ><a class="BookDetails" href="#">Details</a></li>
			<li class = "AfterButton"><button class="downloadButton">Download</button></li>
		</ul>
	  </div><br> -->


	
<!--footer-->

<footer class="footer-distributed">

	<div class="footer-left">

		<h3><span class = "footerlogo">Company</span><span>logo</span></h3>

		<p class="footer-links">
			<a href="#">Home</a>
			·
		<!--	<a href="#">dhdhhd</a> 
			·
			<a href="#">hfhhhf</a>
			· -->
			<a href="#">About</a>
			·
			<a href="https://forms.gle/HZfRgycnb11wehym6">Feedback</a>
			·
			<!--<a href="#">Contact</a>-->
		</p>

		<p class="footer-company-name">Company Name © 2020</p>

		<div class="footer-icons">

			<a href="#"><i><img class= "icongh" src="images/icons/github.png"></i></a>
			<a href="#"><i><img class="icongm" src="images/icons/gmail.png"></i></a>
			<!--<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-github"></i></a>-->

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
      
