
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

include("../../DataBase.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $logger = new Logger();
  if (empty($_POST["book_name"])) 
  {
    $error = "Book Name is required ";
  }
  if (empty($_POST["author_name"])) 
  {
    $error = $error."Author name is required ";
  }
  if (empty($_POST["details"])) 
  {
    $error = $error."Info is required ";
  }
  if (empty($_POST["branch"])) 
  {
    $error = $error."Branch is required ";
  }
  if (empty($_FILES["file"]["name"]))
  {
    $error = $error."file not uploaded ";
  }

  if ($error == "") 
  {
    $sem = $_POST['sem'];
    $branch = $_POST['branch'];
    $base_dir =  $_SERVER['DOCUMENT_ROOT'];
    $folder_path = "$base_dir/Data/files/s$sem".$branch."/";

    $target_file = $folder_path . basename($_FILES["file"]["name"]);
    if (file_exists($target_file))
    {
      $error = $error."File already exists ";
      $logger->addLog("Error : someone tried to upload existing file.", 'e');
    }
    // Create Folder if not exists
    if (!file_exists($folder_path))
    {
      mkdir($folder_path, 0777, true);
    }
  }

  // No error
  if ($error == "") 
  {
    $user = getUserName();
    if (!$user) 
    {
      $cur_page = $_SERVER["PHP_SELF"];
      header("Location: ../../../login.php?page=$cur_page");
      exit;
    }
    if (!isAdmin($user)) 
    {
      echo "<h1>OOPS! You are not Admin. Plz Contact Raptor for Admin rights</h>";
      $logger->addLog("Error : $user was not allowed to upload file");
      exit;
    }
    else
    {
      $file_data = array();
      $file_data['sem']           = $sem;
      $file_data['book_name']     = $_POST["book_name"];
      $file_data['author_name']   = $_POST["author_name"];
      $file_data['subject_name']  = "";
      $file_data['details']       = $_POST["details"];
      $file_data['file']          = $target_file;

      // Save Config
      $count = 1;
      $database_path  = "$base_dir/Data/pages/$branch".$sem."_books.json"; // Data/pages/cse3_books.json
      if (file_exists($database_path)) 
      {
        $database       = file_get_contents($database_path);
        $database       = json_decode($database, true);
        $count          = sizeof($database) + 1;
      }

      $database["b$count"] = $file_data;
      
      // Trucate file
      $file = fopen($database_path, 'w');
      fclose($file);

      $file = fopen($database_path, 'w');
      fwrite($file, json_encode($database));
      fclose($file);

      // Save File
      if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
      {
        $error = "Error Failed to upload file";
        $logger->addLog("Error : File submitted by $user was not uploaded", 'e');
      }
      else
      {
        $book_name = $_POST["book_name"];
        $logger->addLog("Book uploaded : $user uploaded book $book_name", '+');
      }

    }
  }
  else
  {

  }
}

?>


<h1>Book Upload Menu</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <span class="error"><?php echo $error;?></span>
  <br><br>
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

  <br><br><br><br>
  Upload Document :
  <input type="file" name="file" id="file">
  <br><br>&ensp;&ensp;
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
