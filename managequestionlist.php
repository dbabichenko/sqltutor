<?php
$pageTitle = "Manage Questions";
require("utilities/dbutils.php");
require("layout/header.php");
?>
<table class="dataList formTable" id="tblQuestionList">
    <tr>
        <td colspan="2" style="text-align: right;"><input type="button" id="btnNewQuestion" name="btnNewQuestion" value="New Question" onclick="createNewQuestion();"></td>
    </tr>
    <tr>
        <td class="problemTableHeader">Edit</td>
        <td class="problemTableHeader">Question</td>
    </tr>
    <?php
    $db = new DbUtilities;
    $collectionList = $db->getDataset("SELECT questionId, stem FROM sqltutor.questions;");
	foreach($collectionList as &$row){
		echo "<tr>\n";
        echo("<td><a href='questionbuilder.php?questionId=" . $row["questionId"]. "'>edit</a></td>\n");
        echo("<td>" . $row["stem"] . "</td>\n");
        echo "</tr>\n";
    }

	?>
</table>
<?php
require("layout/footer.php");
?>