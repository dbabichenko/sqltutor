<?php
require("utilities/dbutils.php");

$params = array(uniqid(), 'Dmitriy', 'Babichenko', 'dmb72@pitt.edu', 'test');
//$types = array('s','s','s','s','s');

$db = new DbUtilities;
//$db->executeQuery("INSERT INTO sqltutor.users(userId,firstName,lastName,email,password) VALUES (?,?,?,?,?)", "sssss", $params);
//$db->executeQuery("INSERT INTO sqltutor.users(userId,firstName,lastName,email,password) VALUES ('" . uniqid() . "','Test','User','test@test.edu','test123')");

$params = array('528637bd48497');

echo($db->getRecordsetAsJson("SELECT * FROM sqltutor.users WHERE userId = '528637bd48497'"));

echo("<hr />");

$params = array('Babichenko');

//echo($db->getRecordsetAsJson("SELECT * FROM sqltutor.users WHERE lastName = ?", 's', $params));
echo($db->getRecordsetAsJson("SELECT * FROM sqltutor.users WHERE lastName = 'Babichenko'"));
//$db->getDatasetWithParams("SELECT * FROM sqltutor.users WHERE lastName = ?", 's', $params);

?>
