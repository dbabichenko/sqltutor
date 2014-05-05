<?php

chdir('/Users/jordanstevenfeldman/Documents/Git/pittinfsci_sqltutor/');

require 'utilities/dbutils.php';




/**
 * Table class
 *
 */
class Table
{
	private $name;
	private $description;
	private $fields;
	private $data;
	private $rowLimit = 5;
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
	public function __construct($name = null, $description = null, $fields = null, $data = null)
	{
		
	}


}