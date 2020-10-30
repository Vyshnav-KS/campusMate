<?
  include('logger.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
		if (empty($_POST["filename"])) 
		{
      $logger = new Logger();
      $logger->addLog("Error : File name not set");
			exit;
    }

    $base_dir =  $_SERVER['DOCUMENT_ROOT'];
    $file = $base_dir."/Data/Files".$_POST["filename"];
    if (!file_exists($file)) 
    {
      $logger = new Logger();
      $logger->addLog("Error : File $file does not exists.");
			exit;
    }
    
    $filetype = filetype($file);
    $filename = basename($file);
    header("Content-Type: ".$filetype);
    header("Content-Length: ".filesize($file));
    header("Content-Disposition: attachment; filename=".$filename);
    readfile($file);
  }
?>
