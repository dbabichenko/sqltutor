<?php
$pageTitle = "Manage Users";
require("utilities/dbutils.php");
require("layout/header.php");
?>
<table class="dataList formTable" id="tblQuestionList">
    <tr>
        <td colspan="4" style="text-align: right;"><a class="linkButton" href="createuser.php">Create New User</a></td>
    </tr>
    <tr>
        <td class="problemTableHeader">Edit</td>
        <td class="problemTableHeader">Last Name</td>
        <td class="problemTableHeader">First Name</td>
        <td class="problemTableHeader">Email</td>
    </tr>
    <?php
    $db = new DbUtilities;
    $collectionList = $db->getDataset("SELECT * FROM sqltutor.users;");
	foreach($collectionList as &$row){
		echo "<tr>\n";
        echo("<td><a href='createuser.php?userID=" . $row["userId"]. "'>edit</a></td>\n");
        echo("<td>" . $row["lastName"] . "</td>\n");
        echo("<td>" . $row["firstName"] . "</td>\n");
        echo("<td>" . $row["email"] . "</td>\n");
        echo "</tr>\n";
    }
	?>
</table>
<?php
require("layout/footer.php");
?>
