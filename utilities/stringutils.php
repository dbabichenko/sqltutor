<?php
class StringUtilities{

	/**************************************************************************************************
	* Description: 	Replaces characters that present potentials danger for SQL injections or 
					can break SQL syntax
	* Arguments: 	$sqlString 	-	String parameter to be concattenated with an SQL query string
	
	Why are we using this and not mysqli::real_escape_string?
	**************************************************************************************************/
	public function cleanMySqlInsert($sqlString){
		$cleanData = str_replace("  ", " ", $sqlString);
		$cleanData = str_replace("'", "\\'", $cleanData);
		return $cleanData;
	}
}
?>