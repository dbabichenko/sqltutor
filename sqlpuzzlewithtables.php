<?php
require('inc/security.php');
require('layout/header.php');

$puzzlePiecies = array('SELECT','FROM','JOIN','WHERE','GROUP BY','HAVING', 'ORDER BY');

function cleanQueryElementNames($el){
	$tmp = str_replace(",", "", $el);
	$tmp = str_replace("=", "equal", $tmp);
	$tmp = str_replace(">", "greaterthen", $tmp);
	$tmp = str_replace("<", "lessthen", $tmp);
	$tmp = str_replace(">=", "greaterthenorequalto", $tmp);
	$tmp = str_replace("<=", "lessthenorequalto", $tmp);
	$tmp = str_replace(" ", "_", $tmp);
	return $tmp;
}
echo "
        <script language='javascript' src='scripts/jquery-1.10.2.min.js'></script>
        <script language='javascript' src='scripts/tablebuilder.js'></script>
        <script language='javascript'>
            window.onload = function() {
                getPuzzleTables();
                $('#col2Container').css('opacity', '1');
            }
        </script>
            <div id='pageHeader'></div>
            <div id='col1Container' class='colContainer'>
                <div id='questionContainer'>
                    Using data from tables displayed on the right (classicmodels.employees and classicmodels.offices), create a report showing all last names and phone numbers of all employees in the California office.
                </div>
                <div id='puzzleSolution'>";
                
					for($i=0;$i<count($puzzlePiecies);$i++){
						echo "<div class='puzzlePieceEmpty' id='" . cleanQueryElementNames($puzzlePiecies[$i]) . "'></div>";
					}
				echo "</div>
				<div id='puzzleProblem'>";
					for($i=0;$i<count($puzzlePiecies);$i++){
						echo "<div class='puzzlePiece' id='" . cleanQueryElementNames($puzzlePiecies[$i]) . "'>" . $puzzlePiecies[$i] . "</div>";
						}
				echo "</div>
				
                <!--div class='btnControls'>
                    <input type='button' class='controlButton' id='btnRunQuery' name='btnRunQuery' value='Run Query' onclick='runUserQuery();' />
                    <input type='button' class='controlButton' id='btnClearQuery' name='btnClearQuery' value='New Query' onclick='clearUserQuery();' />
                </div>
                <div id='divQueryResults'></div-->
            </div>
            <div id='col2Container' class='colContainer'>
                <div id='divPuzzleTables'>";
                	//runQuery('SELECT employeeNumber, OfficeCode, lastName, firstName, jobTitle FROM classicmodels.employees limit 5;', targetDiv, 'classicmodels.employees');
					//runQuery('SELECT phone, officeCode, territory, state, city  FROM classicmodels.offices limit 5;', targetDiv, 'classicmodels.offices');
					
                echo "</div>
            </div>";
            
require('layout/footer.php');