<?php
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

require('inc/security.php');
require('layout/header.php');

echo "
    <div class='container theme-showcase' style='width:500px;'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <h3 class='panel-title'><strong>Menu</strong></h3>
            </div>

            <div class='panel-body'>
                $message
                <div class='page-header'>
                    <a href='questionbuilder.php'>Question Builder</a><br>
                    <a href='sqltutor.php'>SQL Tutor</a><br>
                    <a href='manageusers.php'>Manage Users</a><br>
                    <a href='managequestionbank.php'>Manage Question Bank</a><br>
                    <a href='sqlpuzzle.php'>SQL Puzzle</a><br>
                    <a href='sqlpuzzlewithtables.php'>SQL Puzzle With Database Tables</a>
                </div><!-- /container -->
            </div>
        </div>
    </div>";

require('layout/footer.php');
