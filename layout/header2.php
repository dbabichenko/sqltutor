<?php
	$firstName = "Guest";
	session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SQLTutor">
    <meta name="author" content="Dmitriy Babichenko and Jordan Feldman">
    
    <?php
    	if(basename($_SERVER['PHP_SELF']) != "missingJavascript.php"){
	    	echo'<noscript>
					<meta http-equiv="refresh" content="0;URL=ErrorPages/missingJavascript.php">
				</noscript>';
    	}
	?>
	
    <title>SQL Tutor</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"><!-- Bootstrap core CSS -->
    <link href="../css/theme.css" rel="stylesheet" type="text/css"><!-- Bootstrap and SQLTutor theme-->
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#">SQL Tutor</a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>

                    <li><a href="#about">Help</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text"><?php echo "Hello, $firstName" ?></p>

                        <div style="margin-left: 2em" class="nav pull-right">
                            <?php 
                            	if($_SESSION['user'] != null){
	                            	echo '<a class="btn btn-default navbar-btn" href="logout.php">Logout</a>';
                            	}
                            ?>
                        </div>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

