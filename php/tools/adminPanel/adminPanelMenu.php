
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

$users = getUsers();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $logger = new Logger();

	$pass = $_POST["master_pass"];
	$hashed_password = crypt($pass, 'ZRsuP1Gi2112');
	$admin_code_hashed = 'ZR9Hrza4e8dJY';

	if ($admin_code_hashed != $hashed_password) 
	{
    echo "<h1>Wrong Master password : Good Luck next time</h>";
    exit;
  }

  foreach ($users as $user_name => $user_data) 
  {
    if(isset($_POST["$user_name"]))
    {
      if (!isset($user_data['is_admin']) || $user_data['is_admin'] == false) 
      {
        $logger->addLog("Admin Added : $user_name is now admin", '+');
        $user_data['is_admin'] = true;

        //Update Data
        updateUserData($user_name, $user_data);
      }
    }
    else
    {
      if (isset($user_data['is_admin']) && $user_data['is_admin'] == true) 
      {
        $logger->addLog("Admin Removed : $user_name is not admin anymore", '-');
        $user_data['is_admin'] = false;

        //Update Data
        updateUserData($user_name, $user_data);
      }
    }
    if(isset($_POST["del_$user_name"]))
    {
      deleteUser($user_name);
    }
  }

  // Reload data
  $users = getUsers();
}

?>


<h1>Admin Panel</h1>
<h2>Users | Is Admin | Delete User </h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <?php

    $i = 1;

    foreach ($users as $user_name => $user_data) 
    {
      if (isset($user_data['is_admin']) && $user_data['is_admin'] == true) 
      {
        echo "<label>$i). $user_name &emsp;Admin : <input type=\"checkbox\" name=\"$user_name\" value=\"Y\" checked></label>";
      }
      else
      {  
        echo "<label>$i). $user_name &emsp;Admin : <input type=\"checkbox\" name=\"$user_name\" value=\"Y\"></label>";
      }

      echo " Delete : <input type=\"checkbox\" name=\"del_$user_name\" value=\"Y\"></label><br><br>";

      $i += 1;
    }
  ?>
  <br><br>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="master_pass">Enter Master Password </label>
	  <div class="col-md-4">
	    <input id="master_pass" name="master_pass" type="password" placeholder="Enter Admin code" class="form-control input-md" required="">
	  </div>
	</div> <br>  
  
  <input type="submit" name="submit" value="Update"> 
</form>

</body>
</html>
