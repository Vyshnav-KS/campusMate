<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <?php

    $type = "books";
    if (isset($_GET['type'])) 
    {
      $type = $_GET['type'];
    }
  ?>

  <h1> <?php echo $type?> Configuration Menu</h1>

  <!-- Options  -->
  <form name = "myform" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Branch :
  <select name = "branch">
    <option value = "cse"> CSE </option>
    <option value = "it"> IT </option>
    <option value = "me"> ME </option>
    <option value = "ece"> ECE </option>
    <option value = "eee"> EEE </option>
    <option value = "civil"> CIVIL </option>
  </select>

  Sem :
  <select name = "sem">
  <?php
    for ($i = 1; $i <= 8; $i += 1)
    {
      echo "<option value = \"$i\"> Sem $i</option>";
    }
  ?>
  </select>
  <input type="submit" name="submit" value="Submit"> 
  </form>
  <!-- Options end -->

  <h2>Select Doc : </h2>

  <!-- Handle post -->
  <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $branch = $_POST['branch'];
      $sem    = $_POST['sem'];

      $base_dir   =  $_SERVER['DOCUMENT_ROOT'];
      $file_path  = "$base_dir/Data/pages/$branch".$sem."_$type.json";

      $data = file_get_contents($file_path);
      $data = json_decode($data, true);
      
      $i = 1;
      foreach ($data as $id => $dict) 
      {
        if ($type == "books") 
        {
          $book_name = $dict['book_name'];
          echo "<p> $i) <a href =\"docEditor.php?file=$file_path&id=$id&branch=$branch&type=$type\" > $book_name </a></p>";        
        }
        else if ($type == "notes") 
        {
          $note_name = $dict['note_name'];
          echo "<p> $i) <a href =\"docEditor.php?file=$file_path&id=$id&branch=$branch&type=$type\" > $note_name </a></p>";        
        }
        else if ($type == "papers") 
        {
          $paper_name = $dict['paper_name'];
          echo "<p> $i) <a href =\"docEditor.php?file=$file_path&id=$id&branch=$branch&type=$type\" > $paper_name </a></p>";        
        }
        
        $i += 1;
      }
    }
  ?>


</body>
</html>