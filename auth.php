<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require 'User.php';

$db = new DbUtilities();

session_start();

$email = $db->cleanInput($_POST['txtEmail']);
$password = $db->cleanInput($_POST['txtPassword']);

if($email !== "" && $password !== ""){

/* 	Try to create User with sanatized inputs */
/* 	$userData = new User(null,array("email"=>"$email", "password"=>"$password"),null); */
	
	$userData = new User(null,array("email"=>"$email", "password"=>"$password"));


	if($userData->getUserID() !== null){
		/*
echo "User logged in!<br/>";
		echo $userData->getUserID() . "<br/>";
		echo $userData->getFirstName() . "<br/>";
		echo $userData->getLastName() . "<br/>";
		echo $userData->getEmail() . "<br/>";
		echo $userData->getPassword() . "<br/>";
*/
		
		$_SESSION['user'] = serialize($userData);
		
		if($_SESSION["errorMessage"] != null){
			unset($_SESSION["errorMessage"]);
		}
		
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu.php\">";
		

	}
	else{
		$errorMessage = '<div class="alert alert-warning">
                <strong>Oops!</strong> The credentials provided are incorrect. Please try again.
            </div>';
        $_SESSION["errorMessage"] = serialize($errorMessage);
		echo "<meta http-equiv=\"refresh\" content=\"10;URL=index.php\">";
	}

	
}
else{
	echo "We will create a user";
	//echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?warning=badUsernameOrPassword\">";
}



?>