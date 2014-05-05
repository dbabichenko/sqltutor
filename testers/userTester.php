<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include '../User.php';

echo "In userTester.php <br/>";
	/*
$testUser = new User('528637bd48497');
	
	echo $testUser->getUserID() . "<br/>";
	echo $testUser->getFirstName() . "<br/>";
	echo $testUser->getLastName() . "<br/>";
	echo $testUser->getEmail() . "<br/>";
	echo $testUser->getPassword() . "<br/>";
*/
	/*
userData = array("firstName"=>"Jordan","lastName"=>"Feldman", "email"=>"jsf37@pitt.edu", "password"=>"abc123");
	$testUser2 = new User(null,$userData,null);
	
	echo $testUser2->getUserID() . "<br/>";
*/
	

	$userData = array("email"=>"jsf37@pitt.edu", "password"=>"abc123");
	$testUser3 = new User(null,$userData,null);
	
	$testUser3->setGroupID("1");
	
	echo $testUser3->getUserID() . "<br/>";
	
	if($testUser3->getGroupID() == null){
		echo "groupID is null";
	}
	else{
		echo $testUser3->getGroupID();
	}
	
	
	
	
	
	
	



?>