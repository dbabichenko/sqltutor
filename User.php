<?php
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

require('utilities/dbutils.php');
require('libs/password.php');
require('libs/uuid.php');



/**
 * User class
 *
 */
class User
{
	private $userID;
	private $groupID;
	private $firstName;
	private $lastName;
	private $email;
	private $password;
	private $db;

	/**
	 * __construct function.
	 * Cretaes a new user object with either a valid userID or valid credentials
	 *
	 * @access public
	 * @param $userID UUID used to create an existing user
	 * @param $email email address of a supposed User
	 * @param $password password of a supposed User
	 * @return void
	 */
	public function __construct($userID = null, $userData = null)
	{

		$this->initializeDB();

		if
		($userID !== null)
		{

			$this->createUserByID($userID);

		}
		elseif($userData['email'] !== null && $userData['password'] !== null && $userData['firstName'] == null && $userData['lastName'] == null)
		{

			$this->createUserByCredentrials($userData['email'], $userData['password']);

		}
		elseif($userData['email'] !== null && $userData['password'] !== null && $userData['firstName'] !== null || $userData['lastname'] !== null)
		{

			$this->createNewUserWithData($userData);
		}
		else
		{
			echo 'Invalid call to User';
		}

	}


	public function __wakeup()
	{
		$this->initializeDB();
	}


	public function initializeDB()
	{
		if
		($this->db == null)
		{
			$this->db = new DbUtilities();
		}
	}


	/**
	 * createUserByID function.
	 * Populates a user object with data from DB when provided with a valid userID
	 * @access private
	 * @param $userID UUID used to lookup and create User
	 * @return void
	 */
	private function createUserByID($userID)
	{
		/*
$sql = "SELECT * FROM users WHERE userId=? LIMIT 1";
    $userData = $this->db->getDatasetWithParams($sql,'s',array($userID));
*/
		$sql =  "SELECT * FROM users LEFT JOIN usergroups ON users.userId = usergroups.userId WHERE users.userId='$userID' LIMIT 1";
		$userData = $this->db->getDataset($sql);

		$this->userID = $userData[0]["userID"];
		$this->groupID = $userData[0]["groupId"];
		$this->firstName = $userData[0]["firstName"];
		$this->lastName = $userData[0]["lastName"];
		$this->email = $userData[0]["email"];
		$this->password = $userData[0]["password"];



	}


	/**
	 * createUserByCredentrials function.
	 * Populated a user object once their credentials are verified with the DB
	 * @access private
	 * @param mixed $email email of the user
	 * @param mixed $password plaintext password of the user
	 * @return void
	 */
	private function createUserByCredentrials($email, $password)
	{
		/*
$sql = "SELECT * FROM users WHERE email=?  LIMIT 1";
    $userData = getDatasetWithParams($sql,'ss',array($email));
*/

		$sql = "SELECT * FROM users LEFT JOIN usergroups ON users.userId = usergroups.userId WHERE email='$email' LIMIT 1";
		$userData = $this->db->getDataset($sql);

		/*
	    $options = [
			'cost' => 10,
		];
		*/

		echo "Unencrypted password is:" . $password . "<br>";
		echo "Encrypted password is:" . $userData[0]['password'] . "<br>";

		echo password_hash($password, PASSWORD_BCRYPT);
		/* 		var_dump(password_verify($password, $userData[0]['password'])); */

		if
		(password_verify($password, $userData[0]['password']))
		{

			$this->userID = $userData[0]['userID'];
			$this->groupID = $userData[0]["groupId"];
			$this->firstName = $userData[0]['firstName'];
			$this->lastName = $userData[0]['lastName'];
			$this->email = $userData[0]['email'];
			$this->password = $userData[0]['password'];

		}
		/*
	    * Take this out once md5 is phased out!
	    */
		elseif
		(md5($password) == $userData[0]['password'])
		{
			$this->userID = $userData[0]['userID'];
			$this->groupID = $userData[0]["groupId"];
			$this->firstName = $userData[0]['firstName'];
			$this->lastName = $userData[0]['lastName'];
			$this->email = $userData[0]['email'];
			$this->password = $userData[0]['password'];
		}
	}


	public function createNewUserWithData($userData)
	{
		$email = $userData['email'];

		$testData = $this->db->getDataset("SELECT * FROM users LEFT JOIN usergroups ON users.userId = usergroups.userId WHERE email='$email' LIMIT 1");

		if
		($testData[0]['userID'] == null)
		{
			$userData['userID'] = uuidSecure();
			$userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

			$userID = $userData['userID'];
			$groupID = $userData['groupID'];
			$firstName = $userData['firstName'];
			$lastName = $userData['lastName'];
			$password = $userData['password'];

			$sqlCreateUser = "INSERT INTO users (userID,firstName,lastName,email,password) VALUES ('$userID', '$firstName', '$lastName', '$email', '$password')";
			$this->db->executeQuery($sqlCreateUser);

			$sqlCreateUserGroup = "INSERT INTO usergroups (userId, groupId) VALUES ('$userID','$groupID')";
			$this->db->executeQuery($sqlCreateUserGroup);

			$this->createUserByID($userData['userID']);
		} //Checks if email is already present
		else
		{
			echo "A user with that email address is already present";
		}

	}


	/*    Getter and Setter functions - DO NOT ALLOW SETTING OF userID */

	public function getUserID()
	{
		return $this->userID;
	}


	public function getGroupID()
	{
		return $this->groupID;
	}


	public function getFirstName()
	{
		return $this->firstName;
	}


	public function getLastName()
	{
		return $this->lastName;
	}


	public function getEmail()
	{
		return $this->email;
	}


	public function getPassword()
	{
		return $this->password;
	}


	public function setGroupID($value)
	{
		$this->initializeDB();
		$sql = "UPDATE usergroups SET groupId='$value' WHERE userID='$this->userID'";
		$this->db->executeQuery($sql);
		$this->groupID = $value;
		$this->updateUserSession();
	}


	public function setFirstName($value)
	{
		$sql = "UPDATE users SET firstName='$value' WHERE userID='$this->userID'";
		$this->db->executeQuery($sql);
		$this->firstName = $value;
		$this->updateUserSession();
	}


	public function setLastName($value)
	{
		$sql = "UPDATE users SET lastName='$value' WHERE userID='$this->userID'";
		$this->db->executeQuery($sql);
		$this->lastName = $value;
		$this->updateUserSession();
	}


	public function setEmail($value)
	{
		$sql = "UPDATE users SET email='$value' WHERE userID='$this->userID'";
		$this->db->executeQuery($sql);
		$this->email = $value;
		$this->updateUserSession();
	}


	public function setPassword($value)
	{
		$sql = "UPDATE users SET password='$value' WHERE userID='$this->userID'";
		$this->db->executeQuery($sql);
		$this->password = $value;
		$this->updateUserSession();
	}


	private function updateUserSession()
	{
		if (session_id() === "")
		{
			session_start();
		}
		unset($_SESSION['user']);
		$_SESSION['user'] = serialize($this);
	}


}


?>