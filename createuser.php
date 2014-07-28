<?php
require('inc/security.php');
$pageTitle = "Create User";
require("layout/header.php");
require("utilities/stringutils.php");

$userID = "";
$txtFirstName = "";
$txtLastName = "";
$txtEmail = "";
$txtPassword = "";
	
$db = new DbUtilities;

//echo "User ID from GET: " . $_GET["userID"] . "<br />";
//echo "User ID from POST: " . $_POST["userID"] . "<br />";

if(count($_POST) > 0){
	$userID = $_POST["userID"];
	$txtFirstName 	= $_POST["txtFirstName"];
	$txtLastName 	= $_POST["txtLastName"];
	$txtEmail 		= $_POST["txtEmail"];
	$txtPassword 	= $_POST["txtPassword"];
	$passwordHash 	= crypt($txtPassword);
	
	if($userID == ""){
		$userID = uniqid();
		$sql = "INSERT INTO sqltutor.users (userId, firstName, lastName, email, password) VALUES ";
		$sql .= "('" . $userID . "', '" . $txtFirstName . "',";
		$sql .= "'" . $txtLastName . "',";
		$sql .= "'" . $txtEmail . "',";
		$sql .= "'" . $passwordHash . "')";
		$db->executeQuery($sql);
		echo $sql . "<br />";
	}
	else{
		$sql = "UPDATE sqltutor.users SET firstName = '" . $txtFirstName . "',";
		$sql .= "lastName = '" . $txtLastName . "',";
		$sql .= "email = '" . $txtEmail . "' ";
		$sql .= "WHERE userId = '" . $userID . "'";
		$db->executeQuery($sql);
		echo $sql . "<br />";
	}
}
if(count($_GET) > 0){
	if(in_array("userID", $_GET)){
		$userID = $_GET["userID"];	
	}
	$sql = "SELECT * FROM sqltutor.users WHERE userId = '" . $userID . "'";
	echo $sql . "<br />";
	$userInfo = $db->getDataset($sql);
	echo count($userInfo);
	if(count($userInfo) > 0){
		echo "Here";
		$userID = $userInfo[0]["userId"];
		$txtFirstName = $userInfo[0]["firstName"];
		$txtLastName = $userInfo[0]["lastName"];
		$txtEmail = $userInfo[0]["email"];
	}
}

$submitButtonText = "Create User";
if($userID != ""){
	$submitButtonText = "Update User";
}

echo "UserID: " . $userID . "<br />";

echo "
<form name='frmCreateUser' method='POST' action='createuser.php'>
	<input type='hidden' name='userID' id='userID' value='$userID' />
    <table class='formTable'>
        <tr>
            <td>First Name:</td>
            <td><input type='text' id='txtFirstName' name='txtFirstName' value='$txtFirstName' class='textField' />
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type='text' id='txtLastName' name='txtLastName' value='$txtLastName' class='textField' />
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type='text' id='txtEmail' name='txtEmail' value='$txtEmail' class='textField' />
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type='password' id='txtPassword' name='txtPassword' value='' class='textField' />
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type='password' id='txtPasswordConfirm' name='txtPasswordConfirm' value='' class='textField' />
        </tr>
        <tr>
            <td colspan='2' align='right'><input type='submit' id='btnSubmit' name='btnSubmit' value='$submitButtonText' /></td>
        </tr>
    </table>
</form>
";

require("layout/footer.php");
