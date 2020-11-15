<?php
  include('../../logger.php');
  $file   = $_GET['file'];
  $id     = $_GET['id'];
  $type   = $_GET['type'];

  $data = file_get_contents($file);
  $data = json_decode($data, true);
  
  $logger = new Logger();

  if (isset($_POST['delete'])) 
  {
    $logger->addLog("Alert : Entry $id was deleted from $file", '-');
    unset($data["$id"]);
    echo "<h1>Entry Deleted</h>";

    $fp = fopen($file, 'w');
    fclose($fp);
    $fp = fopen($file, 'w');
    fwrite($fp, json_encode($data));
  }
  else
  {
    $error = "";
    if ($type == "books") 
    {
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
      
      // Error chk
      if ($error != "") 
      {
        echo "Go back and fill details!!!!!!!!!";
        exit;
      }

      $book               = $data["$id"];
      $book['book_name']  = $_POST["book_name"];
      $book['author_name']= $_POST["author_name"];
      $book['details']    = $_POST["details"];
      $book['branch']     = $_POST['branch'];
      $book['sem']        = $_POST['sem'];

      $data["$id"] = $book;
      
      $fp = fopen($file, 'w');
      fclose($fp);
      
      $fp = fopen($file, 'w');
      fwrite($fp, json_encode($data));

      $logger->addLog("Alert : Book ".$book['book_name']." Was updated", '-');
      echo "<h1>Entry Updated</h>";
    }
    

  }


?>