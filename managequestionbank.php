<?php
require("utilities/dbutils.php");

$pageTitle = "Manage Question Collections";
require("layout/header.php");
?>
<table class="dataList formTable" id="tblCollectionList">
    <tr>
        <td colspan="3" style="text-align: right;"><a href="createquestionbank.php" class="linkButton">Create new question bank</a></td>
    </tr>

    <tr>
        <td class="problemTableHeader">Edit</td>
        <td class="problemTableHeader">Collection</td>
        <td class="problemTableHeader">Description</td>
    </tr><?php
    $db = new DbUtilities;
    $collectionList = $db->getDataset("SELECT bankId, bankName, description FROM sqltutor.testbank;");
	foreach($collectionList as &$row){
		echo "<tr>\n";
        echo("<td><a href='managequestionlist.php?collectionId=" . $row["bankId"]. "'>manage questions</a></td>\n");
        echo("<td>" . $row["bankName"] . "</td>\n");
        echo("<td>" . $row["description"] . "</td>\n");
        echo "</tr>\n";
    }
    
    ?>
    
</table>
    
<?php
require("layout/footer.php");
?>