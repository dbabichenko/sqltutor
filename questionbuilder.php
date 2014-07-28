<?php
$pageTitle = 'SQL Question Builder';
require('inc/security.php');
require('layout/header.php');
    
echo "
    <script language='javascript'>
        window.onload = function() {
            $('#collectionId').val(getUrlParameter('collectionId'));
            
            $('#divProblemTables').hover(function() {
                $('#divProblemTables').find('td').css('font-size', '12px');
                $('#col2Container').css('opacity', '1');
            }, function() {
                $('#divProblemTables').find('td').css('font-size', '6px');
                $('#col2Container').css('opacity', '0.5');
            });
        }


        function getTableData() {
            var targetDiv = $('#divProblemTables');
            targetDiv.empty();

            for (var i = 0; i < 3; i++) {
                var dbNameObj = $('#txtDbName' + i);
                var tblNameObj = $('#txtTblName' + i);

                if (dbNameObj.val() != '' && tblNameObj.val() != '') {
                    var tableName = dbNameObj.val() + '.' + tblNameObj.val();
                    var sql = 'SELECT * FROM ' + tableName + ' limit 5;'
                    console.log(sql);
                    runQuery(sql, targetDiv, tableName);
                }
            }

        }

        function testQuery() {
            var query = '';
            $('.sqlClause').each(function(index, element) {
                query += ' ' + $(this).val();
            });
            console.log(query);
            var targetDiv = $('#divQueryResults');

            targetDiv.empty();
            //$('#divProblemTables').append(targetDiv);
            runQuery(query, targetDiv, 'Test Query Results');
            return query;
        }

        function createOrUpdateQuestion() {
            query = testQuery();
            alert(query);
        }
    </script>

    <div id='col1Container' class='colContainer'>
    <form name='frmQuestionBuilder' method='POST' action='questionsaver.php'>
        <input type='hidden' id='collectionId' name='collectionId' value='9fcecac7-9184-4147-b0ba-89d2cfe5c942'>
        <div class='questionItemLabel'>
            Create question stem:
        </div>
        <textarea rows='10' cols='80' id='txtQuestionStem' name='txtQuestionStem'>Build a report showing phone numbers of all the offices located in California using data from 'offices' table in 'classicmodels' database</textarea>
        <div class='questionItemLabel'>
            Which tables will this query join:
        </div>
        <table id='tblSelectedTablesList'>
            <tr>
                <td>Database/Schema</td>
                <td>&nbsp;</td>
                <td>Table name</td>
            </tr>
            <tr>
                <td><input type='text' class='txtTableInfo' id='txtDbName0' name='txtDbName0' onblur='getTableData();' value='classicmodels'></td>
                <td>.</td>
                <td><input type='text' class='txtTableInfo' id='txtTblName0' name='txtTblName0' onblur='getTableData();' value='offices'></td>
            </tr>
            <tr>
                <td><input type='text' class='txtTableInfo' id='txtDbName1' name='txtDbName1' onblur='getTableData();'></td>
                <td>.</td>
                <td><input type='text' class='txtTableInfo' id='txtTblName1' name='txtTblName1' onblur='getTableData();'></td>
            </tr>
            <tr>
                <td><input type='text' class='txtTableInfo' id='txtDbName2' name='txtDbName2' onblur='getTableData();'></td>
                <td>.</td>
                <td><input type='text' class='txtTableInfo' id='txtTblName2' name='txtTblName2' onblur='getTableData();'></td>
            </tr>
        </table>
        <div class='questionItemLabel'>
            Test query for this question:
        </div>
        <table id='tblQueryBreakdown'>
            <tr>
                <td>SELECT</td>
                <td><textarea rows='3' cols='60' id='txtSelectClause' name='txtSelectClause' class='sqlClause'>SELECT phone</textarea>
            </tr>
            <tr>
                <td>FROM</td>
                <td><textarea rows='3' cols='60' id='txtFromClause' name='txtFromClause' class='sqlClause'>FROM classicmodels.offices</textarea>
            </tr>
            <tr>
                <td>WHERE</td>
                <td><textarea rows='3' cols='60' id='txtWhereClause' name='txtWhereClause' class='sqlClause'>WHERE state = 'CA'</textarea>
            </tr>
            <tr>
                <td>GROUP BY</td>
                <td><textarea rows='3' cols='60' id='txtGroupClause' name='txtGroupClause' class='sqlClause'></textarea>
            </tr>
            <tr>
                <td>HAVING</td>
                <td><textarea rows='3' cols='60' id='txtHavingClause' name='txtHavingClause' class='sqlClause'></textarea>
            </tr>
            <tr>
                <td>ORDER BY</td>
                <td><textarea rows='3' cols='60' id='txtOrderClause' name='txtOrderClause' class='sqlClause'></textarea>
            </tr>
            <tr>
                <td>LIMIT</td>
                <td><textarea rows='3' cols='60' id='txtLimitClause' name='txtLimitClause' class='sqlClause'>limit 10;</textarea>
            </tr>
        </table>
        <div class='btnControls'>
            <input type='button' class='controlButton' id='btnTestQuery' name='btnTestQuery' value='Test Query' onclick='testQuery();' />
            <input type='submit' class='controlButton' id='btnCreateQuestion' name='btnCreateQuestion' value='Create Question'  />
        </div>
    </form>
</div>
<div id='col2Container' class='colContainer'>
    <div id='divProblemTables'></div>
    <div id='divQueryResults'></div>
</div>
<script language='javascript'>
    getTableData();
    testQuery();
</script>";

require('layout/footer.php');
?>
