<?php
  include('../../DataBase.php');
  $file   = $_GET['file'];
  $id     = $_GET['id'];
  $type   = $_GET['type'];

  $user_name = getUserName();
  if (!$user_name) 
  {
    echo "<h1>Please log in first!! <a href = \"../../../login.php\"> Login </a></h>";
    exit;
  }

  if (!isAdmin($user_name)) 
  {
    echo "<h1>OOps you are not admin!</h>";
    exit;
  }

  $data = file_get_contents($file);
  $data = json_decode($data, true);
  
  $logger = new Logger();

  if (isset($_POST['delete'])) 
  {
    $logger->addLog("Alert : Entry $id was deleted from $file", '-');
    
    if (!unlink($data["$id"]['file'])) 
    {
      $fname = $data["$id"]['file'];
      $logger->addLog("Error : Unable to delete file $fname", 'e');
    } 

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
        echo "<h1>Go back and fill details!!!!!!!!!</h1>";
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