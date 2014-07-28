<?php
$pageTitle = "Create new question collection";
require('inc/security.php');
require('layout/header.php');
echo "
<form name='fromCreateQuestionBank' method='POST' action='CreateUpdateQuestionCollection'>
    <table class='formTable'>
        <tr>
            <td colspan='2' align='center'>Question Collection</td>
        </tr>
        <tr>
            <td>Collection Name:</td>
            <td><input type='text' id='txtBankName' name='txtBankName' value='' class='textField' />
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea id='txtBankDesc' name='txtBankDesc' class='textField'></textarea>
        </tr>
        <tr>
            <td colspan='2' align='right'><input type='submit' id='btnSubmit' name='btnSubmit' value='Create/Update Collection' /></td>
        </tr>
    </table>
</form>";

require("layout/footer.php");