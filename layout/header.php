<?php
echo 
"<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='shortcut icon' href='../../docs-assets/ico/favicon.png'>
    
    <script language='javascript' src='scripts/jquery-1.10.2.min.js'></script>
    <script  language='javascript' src='jquery-ui/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script language='javascript' src='scripts/tablebuilder.js'></script>
    <script language='javascript' src='scripts/utils.js'></script>
    
    <noscript>
		<meta http-equiv='refresh' content='0;URL=ErrorPages/missingJavascript.php'>
	</noscript>

    <title>SQL Tutor</title>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
    <link href='css/theme.css' rel='stylesheet' type='text/css'>
    <link type='text/css' rel='stylesheet' href='css/mainstyle.css'/>
</head>

<body>
    <div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'><span class='sr-only'>Toggle navigation</span></button> <a class='navbar-brand' href='#'>SQL Tutor</a>
            </div>

            <div class='navbar-collapse collapse'>
                <ul class='nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>

                    <li><a href='#about'>Help</a></li>
                </ul>

                <ul class='nav navbar-nav navbar-right'>
                    <li>
                        <p class='navbar-text'>Hello, $firstName $lastName 
                        <a href='logout.php'><button id='logoutBtn' type='button' class='btn btn-default'>Logout</button></a>
                        </p>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>";