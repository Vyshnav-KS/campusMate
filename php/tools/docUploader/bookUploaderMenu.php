
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  


<h1>Book Upload Menu</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Book name:&ensp; <input type="text" name="book_name" value="">
  <br><br>
  Author name:&ensp; <input type="text" name="author_name" value="">
  <br><br>
  Info:&ensp; <textarea name="details" rows="5" cols="40"></textarea>
  <br><br>
  Branch :&ensp;
  <input type="radio" name="branch" value="cse">CSE
  <input type="radio" name="branch" value="it">IT
  <input type="radio" name="branch" value="me">Mech
  <input type="radio" name="branch" value="civil">CIVIL
  <input type="radio" name="branch" value="ece">ECE
  <input type="radio" name="branch" value="eee">EEE
  <br><br>

  Semester :
  <select name = "sem">
  <?php
    for ($i = 1; $i <= 8; $i += 1)
    {
      echo "<option value = \"$i\"> Sem $i</option>";
    }
  ?>
  </select>
  <br><br>&ensp;&ensp;
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
