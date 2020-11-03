<?php
	
	include ('../php/DataBase.php');
	
	$logger = new Logger();
	$base_dir =  $_SERVER['DOCUMENT_ROOT'];
	$page_name =$_POST['page_id'];
	$path = $base_dir."/Data/page_data/$page_name.json";

	if (!file_exists($base_dir."/Data/page_data/")) 
	{
		mkdir($base_dir."/Data/page_data/", 0777, true);
		$logger->addLog("Creating page_data folder");
	}

	$comment_id = 0;

	// Load comments
	$comments = array();
	if (file_exists($path)) 
	{
		$contents = file_get_contents($path);
		$comments = json_decode($contents, true);
		$comment_id = $comments['last_id'] + 1;
	}

	// Add Comment
	if (isset($_POST['msg']) && $_POST['msg'] != "")
	{
		$date = new DateTime();
		$user_id = getUserName();

		if (!$user_id) 
		{
			$logger->addLog("User not registered");
			echo $_POST['msg'];
			exit;
		}

		$msg = $_POST['msg'];

		$comment = array(
			'name'	=> $user_id,
			'msg' 	=> $msg,
			'time'	=> $date->getTimestamp(),
		);

		$comments['last_id'] = $comment_id;
		$comments["$comment_id"] = $comment;

		$fp = fopen($path, 'w');
		fwrite($fp, json_encode($comments));
		fclose($fp);
	}

	$out_data = "";
	foreach($comments as $x => $x_value) 
	{
		if (isset($x_value['msg'])) 
		{
			$out_data = $out_data . $x_value['msg'] . "  -".$x_value['name']."<br>";
		}
	 	
	}

	echo $out_data;
?>

