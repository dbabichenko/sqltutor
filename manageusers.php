<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$pageTitle = 'Manage Users';
require('inc/security.php');
require('layout/header.php');

echo "
<table class='dataList formTable' id='tblQuestionList'>
    <tr>
        <td colspan='4' style='text-align: right;'><a class='linkButton' href='createuser.php'>Create New User</a></td>
    </tr>
    <tr>
        <td class='problemTableHeader'>Edit</td>
        <td class='problemTableHeader'>Last Name</td>
        <td class='problemTableHeader'>First Name</td>
        <td class='problemTableHeader'>Email</td>
    </tr>";
    $db = new DbUtilities;
    $collectionList = $db->getDataset("SELECT * FROM sqltutor.users;");
	foreach($collectionList as $row){
		echo "<tr>\n";
        echo("<td><a href='createuser.php?userID=" . $row["userID"]. "'>edit</a></td>\n");
        echo("<td>" . $row["lastName"] . "</td>\n");
        echo("<td>" . $row["firstName"] . "</td>\n");
        echo("<td>" . $row["email"] . "</td>\n");
        echo "</tr>\n";
    }
    echo "</table>";
require("layout/footer.php");

