<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();


if(isset($_SESSION['user'])){
	require 'User.php';
	
	
	$testUser = unserialize($_SESSION['user']);
		
	
	echo "<h1>Test Unserialize</h1>";
	
	echo $testUser->getUserID() . "<br/>";
	echo $testUser->getGroupID() . "<br/>";
	echo $testUser->getFirstName() . "<br/>";
	echo $testUser->getLastName() . "<br/>";
	echo $testUser->getEmail() . "<br/>";
	echo $testUser->getPassword() . "<br/>";
	
	$testUser->setFirstName("Erin");

	var_dump($_SESSION['user']);
	$testUser2 = unserialize($_SESSION['user']);
	
	var_dump($testUser2);
	echo $testUser2->getFirstName() . "<br/>";
	
	
	
	
}
?>