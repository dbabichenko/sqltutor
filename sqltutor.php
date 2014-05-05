<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/mainstyle.css" />
        <script language="javascript" src="scripts/jquery-1.10.2.min.js"></script>
        <script language="javascript" src="scripts/tablebuilder.js"></script>
        <script language="javascript">
            window.onload = function() {
                getProblemTables();
                $('#divProblemTables').hover(function() {
                    $('#divProblemTables').find('td').css('font-size', '12px');
                    $('#col2Container').css('opacity', '1');
                }, function() {
                    $('#divProblemTables').find('td').css('font-size', '6px');
                    $('#col2Container').css('opacity', '0.5');
                });
            }
        </script>
    </head>
    <body>
        <div id="mainContainer">
            <div id="pageHeader"></div>
            <div id="col1Container" class="colContainer">
                <div id="questionContainer">
                    Using data from tables displayed on the right (classicmodels.employees and classicmodels.offices), create a report showing all last names and phone numbers of all employees in the California office.
                </div>
                <textarea rows="10" cols="80" id="txtSql" name="txtSql">SELECT lastName, phone FROM classicmodels.employees a JOIN classicmodels.offices b ON a.officeCode = b.officeCode WHERE state = 'CA';</textarea>
                <div class="btnControls">
                    <input type="button" class="controlButton" id="btnRunQuery" name="btnRunQuery" value="Run Query" onclick="runUserQuery();" />
                    <input type="button" class="controlButton" id="btnClearQuery" name="btnClearQuery" value="New Query" onclick="clearUserQuery();" />
                </div>
                <div id="divQueryResults"></div>
            </div>
            <div id="col2Container" class="colContainer">
                <div id="divProblemTables"></div>
            </div>
        </div>
    </body>
</html>
