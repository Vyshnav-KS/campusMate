<?php
  include('logger.php');

  if (empty($_GET["file"])) 
  {
    $logger = new Logger();
    $logger->addLog("Error : File name not set", 'e');
    exit;
  }

  $base_dir =  $_SERVER['DOCUMENT_ROOT'];
  $file = $base_dir."/".$_GET["file"];
  if (!file_exists($file)) 
  {
    $logger = new Logger();
    $logger->addLog("Error : File $file does not exists.", 'e');
    exit;
  }
  
  $filetype = filetype($file);
  $filename = basename($file);
  header("Content-Type: ".$filetype);
  header("Content-Length: ".filesize($file));
  header("Content-Disposition: attachment; filename=".$filename);
  readfile($file);
?>
