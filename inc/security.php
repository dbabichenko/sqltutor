<?php
require('User.php');

session_start();

$user = unserialize($_SESSION['user']);

if(!$user){
	$errorMessage = '<div class="alert alert-danger">
			                <strong>Warning</strong> You are not authorized to view this page. Please login first.
			            </div>';
	$_SESSION["errorMessage"] = serialize($errorMessage);
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
elseif($user->getUserID() != null){
	$message = "";
	$firstName = $user->getFirstName();
	$lastName = $user->getLastName();
}


if(isset($_SESSION["errorMessage"])){
	$message = unserialize($_SESSION["errorMessage"]);
}