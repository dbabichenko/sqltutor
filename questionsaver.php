<?php
require("utilities/dbutils.php");
require("utilities/stringutils.php");


$db = new DbUtilities;
$str = new StringUtilities;


$questionId = uniqid();
$collectionId = $_POST['collectionId'];
$txtQuestionStem = $_POST['txtQuestionStem'];
$sql = "INSERT INTO sqltutor.questions (questionId, stem, questionBankId) VALUES ('" . $questionId . "','" . $str->cleanMySqlInsert($txtQuestionStem) . "','" . $collectionId . "');";
echo $sql . "<br />";
$db->executeQuery($sql);

$txtDbTables = array();
for ($i = 0; $i < 3; $i++) {
	if ($_POST["txtDbName" . $i] != "" && $_POST["txtTblName" . $i] != "") {
    	$sql = "INSERT INTO sqltutor.questiontables (tableId, databaseName, tableName, questionId) VALUES (";
    	$sql .= "'" . uniqid() . "',";
    	$sql .= "'" . $_POST["txtDbName" . $i] . "',";
    	$sql .= "'" . $_POST["txtTblName" . $i] . "',";
    	$sql .= "'" . $questionId . "');";
		echo $sql . "<br />";
		$db->executeQuery($sql);
	}
}

$txtSelect 	= $_POST["txtSelectClause"];
$txtFrom 	= $_POST["txtFromClause"];
$txtWhere 	= $_POST["txtWhereClause"];
$txtGroup 	= $_POST["txtGroupClause"];
$txtHaving 	= $_POST["txtHavingClause"];
$txtOrder 	= $_POST["txtOrderClause"];
$txtLimit 	= $_POST["txtLimitClause"];


$sql = 	"INSERT INTO sqltutor.queryclauses (queryId,questionId,selectClause,fromClause,whereClause,";
$sql .= "groupByClause,havingClause,orderByClause,limitClause) ";
$sql .= " VALUES (";
$sql .= "'" . uniqid() . "',";
$sql .= "'" . $questionId . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtSelect) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtFrom) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtWhere) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtGroup) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtHaving) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtOrder) . "',";
$sql .= "'" . $str->cleanMySqlInsert($txtLimit) . "');";
echo ($sql);
$db->executeQuery($sql);

header( "Location: questionbuilder.php" );

?>