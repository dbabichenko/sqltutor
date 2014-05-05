<?php
class DbUtilities
{
	/* Global variables */
	private $hostName = "localhost";
	private $dbName = "sqltutor";
	private $dbUserName = "root"; //"sqltutor";
	private $dbPassword = "bitnami"; //"59g#=@89+>5=up.()56Vb8)yBak4k>Mi";
	private $mysqli;


	/**************************************************************************************************
    * Description:  Class constructor - creates a new database connection object
    * Arguments:    None
    **************************************************************************************************/
	function __construct()
	{
		$this->initializeDB();

	}
	
	public function __wakeup()
    {
        $this->initializeDB();
    }
    
	public function initializeDB()
	{
		/* Create a new database connection */
		$this->mysqli = new mysqli($this->hostName, $this->dbUserName, $this->dbPassword, $this->dbName);

		/* check connection */
		if (mysqli_connect_errno())
		{
			printf("Connect failed in dbutils: %s\n", mysqli_connect_error());
			exit();
		}
	}

	/**************************************************************************************************
    * Description:  Creates a dataset based on an SQL SELECT query and a set of parameters
                    for the WHERE clause.  Note: this method only works with SELECT queries
    * Arguments:    $sql        -   SQL SELECT query
                    $types      -   a string that lists data types of all parameters.  For examlpe, if you
                                    have three parameters of types string, number, string, the $types would
                                    be set to "sns"
                    $parameters -   an array containing parameters for the SELECT query WHERE clause
    **************************************************************************************************/
	public function getDatasetWithParams($sql, $types = null, $params = null)
	{
		$this->initializeDB();
		/* create a prepared statement */
		$stmt = $this->mysqli->prepare($sql);

		/* bind parameters for markers */
		if
		($types&&$params)
		{
			$bind_names[] = $types;
			for ($i=0; $i<count($params);$i++)
			{
				$bind_name = 'bind' . $i;
				$$bind_name = $params[$i];
				$bind_names[] = &$$bind_name;
			}
			$return = call_user_func_array(array($stmt, 'bind_param'), $bind_names);
		}


		$dataArray = array();
		/* execute query */
		if
		($stmt->execute())
		{
			$result = $stmt->get_result();
			/* store results in an associative array */
			$a  = $result->fetch_array(MYSQLI_ASSOC);
			while
			($row = $result->fetch_assoc())
			{
				array_push($dataArray, $row);
			}
		}
		$stmt->close();
		return $dataArray;
	}


	/**************************************************************************************************
    * Description:  Creates a dataset based on an SQL SELECT query where the WHERE clause is
                    concattenated (no parameters)
    * Arguments:    $sql        -   SQL SELECT query
    **************************************************************************************************/
	public function getDataset($sql)
	{
		$this->initializeDB();
		$dataArray = array();
		if ($result = $this->mysqli->query($sql))
		{
			/* fetch associative array */
			while ($row = $result->fetch_assoc())
			{
				array_push($dataArray, $row);
			}
			/* free result set */
			$result->free();
		}
		return $dataArray;

	}



	/**************************************************************************************************
    * Description:  Executes an INSERT, UPDATE, DELETE query with a set of parameters
                    for the WHERE clause.
    * Arguments:    $sql        -   SQL SELECT query
                    $types      -   a string that lists data types of all parameters.  For examlpe, if you
                                    have three parameters of types string, number, string, the $types would
                                    be set to "sns"
                    $parameters -   an array containing parameters for the SELECT query WHERE clause
    **************************************************************************************************/
	public function executeQuery($sql, $types=null, $params=null)
	{
		# create a prepared statement
		$stmt = $this->mysqli->prepare($sql);
		
		#if sql is bad display it
		if(!$stmt)
		{
			echo $sql;
		}
		
		# bind parameters for markers
		if
		($types&&$params)
		{
			$bind_names[] = $types;
			for ($i=0; $i<count($params);$i++)
			{
				$bind_name = 'bind' . $i;
				$$bind_name = $params[$i];
				$bind_names[] = &$$bind_name;
			}
			$return = call_user_func_array(array($stmt, 'bind_param'), $bind_names);
		}

		# execute query		
		$stmt->execute();

		$stmt->close();
	}



	/**************************************************************************************************
    * Description:  Creates a JSON object from data returned by an SQL SELECT query
                    and a set of parameters for the WHERE clause.  Note: this method only works
                    with SELECT queries
    * Arguments:    $sql        -   SQL SELECT query
                    $types      -   a string that lists data types of all parameters.  For examlpe, if you
                                    have three parameters of types string, number, string, the $types would
                                    be set to "sns"
                    $parameters -   an array containing parameters for the SELECT query WHERE clause
    **************************************************************************************************/
	public function getRecordsetAsJson($sql, $types=null, $params=null)
	{
		
		$this->initializeDB();
		
		if
		($types && $params)
		{
			$jsonArray = $this->getDatasetWithParams($sql, $types, $params);
		}
		else
		{
			$jsonArray = $this->getDataset($sql);
		}



		return json_encode($jsonArray);
	}




}


?>