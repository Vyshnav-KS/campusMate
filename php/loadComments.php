<?php

	include("logger.php");
	
	$base_dir =  $_SERVER['DOCUMENT_ROOT'];
	$page_name =$_GET['q'];
	$path = $base_dir."/Data/page_data/$page_name.rcht";

	if (!file_exists($path))
	{
		$logger = new Logger();
		$logger->addLog("Error : unable to find $path");
		$logger->addLog("");
		exit;
	}

	$contents = file_get_contents($path);
	$comments = json_decode($contents, true);

	$out_data = "";

	// Comment structure
	// name : username	msg : message	key : timestamp

	foreach($comments as $x => $x_value) 
	{
	  $out_data = $out_data . $x_value . "<br>";
	}

	echo $out_data;
?>

