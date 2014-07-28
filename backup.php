<?php
require_once 'inc/lib.php';

session_start();

	if ($_SESSION['user']) 
	{

		if (!$user = user_info($_SESSION['user'])) 
			{
			// User does not exist, redirect to login page
			header('Location: .');
			exit('Not Authorized');
			}	
	}


//get the details of a field for every user
function batchCheck($field)
{
	//get user list
	$userList = user_list();
	foreach ($userList as $userFile)
	{
		//if the file is not named empty
		if($userFile != "empty")
		{
		//get the user info from the current user ($u) and store it in an array ($ui)
		$userInfo = user_info($userFile);
		echo $userInfo[$field];
	}

	}
}
?>

<?php

						
				batchCheck('user');
?>