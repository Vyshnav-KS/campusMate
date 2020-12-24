<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <h1>Doc Editor</h1>

  <?php
    $file   = $_GET['file'];
    $id     = $_GET['id'];
    $type   = $_GET['type'];
    $branch = $_GET['branch'];

    if (!file_exists($file)) 
    {
      echo "<h1>Error : file not found</h1>";
      exit;
    }

    $data = file_get_contents($file);
    $data = json_decode($data, true);

    
  ?>


<!-- BOOOOOOKSSSSSS -->
<?php if ($type == "books") 
{
  // should chk if $data["$id"] isset
  $book = $data["$id"];

  $book_name    = $book['book_name'];
  $author_name  = $book['author_name'];
  $details      = $book['details'];
  $sem          = $book['sem'];
  ?>

  <!-- HTML CODE HERE -->
  <h1>Book Editor</h1>
  <form name = "myform" method="post" action = <?php echo "\"updater.php?file=$file&id=$id&type=$type\"";?> >
    Book name:&ensp; <input type="text" name="book_name" value= <?php echo "\"$book_name\"";?>>
    <br><br>
    Author name:&ensp; <input type="text" name="author_name" value=<?php echo "\"$author_name \"";?>>
    <br><br>
    Info:&ensp; <textarea name="details" rows="5" cols="40"><?php echo "$details";?></textarea>
    <br><br>
    Branch :&ensp;
    <input type="radio" name="branch" value="cse" <?php if($branch == "cse") { echo "checked";} ?>>CSE
    <input type="radio" name="branch" value="it" <?php if($branch == "it") { echo "checked";} ?>>IT
    <input type="radio" name="branch" value="me" <?php if($branch == "me") { echo "checked";} ?>>Mech
    <input type="radio" name="branch" value="civil" <?php if($branch == "civil") { echo "checked";} ?>>CIVIL
    <input type="radio" name="branch" value="ece" <?php if($branch == "ece") { echo "checked";} ?>>ECE
    <input type="radio" name="branch" value="eee" <?php if($branch == "eee") { echo "checked";} ?>>EEE
    <br><br>

    Semester :
    <select name = "sem">
    <?php
      for ($i = 1; $i <= 8; $i += 1)
      {
        if ($sem == "$i") 
        {
          echo "<option value = \"$i\" selected> Sem $i</option>";
        }
        else
        {
          echo "<option value = \"$i\"> Sem $i</option>";
        }  
        
      }
    ?>
    </select>
    <br>
    <label>Delete : <input type="checkbox" name="delete" value="Y"></label><br><br>

    <input type="submit" name="submit" value="Update">
    </form>
  <?php 
}
?>
<!-- End of books -->


<!-- Notes -->
<?php

if ($type == "notes") 
{
  ?>
  <!-- HTML CODE HERE -->

  <?php
}
?>

<!-- Papers -->
<?php

if ($type == "notes") 
{
  ?>
  <!-- HTML CODE HERE -->

  <?php
}
?>

</body>
</html>