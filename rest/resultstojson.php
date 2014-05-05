<?php
require("../utilities/dbutils.php");
header('Content-type: application/json');

$sql = $_GET["sql"];
//echo $sql;
$db = new DbUtilities;
echo $db->getRecordsetAsJson($sql);

?>