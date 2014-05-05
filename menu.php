<?php
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

require 'User.php';

    session_start();
    
    $user = unserialize($_SESSION['user']);
    
    if($user == null)
    {
        $errorMessage = '<div class="alert alert-danger">
                <strong>Warning</strong> You are not authorized to view this page. Please login first.
            </div>';
         $_SESSION["errorMessage"] = serialize($errorMessage);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    }
    elseif($user->getUserID() != null)
    {
        $message = "";
        $firstName = $user->getFirstName();
    }


    if
    (unserialize($_SESSION["errorMessage"]) != null)
    {
        $message = unserialize($_SESSION["errorMessage"]);
    }

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>SQL Tutor</title><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"><!-- Bootstrap theme -->
    <link href="css/theme.css" rel="stylesheet" type="text/css">
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
                         <ul class="nav pull-right">
							 <a class="btn btn-default navbar-btn" href="logout.php">Logout</a>
						</ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container theme-showcase" style="width:500px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Menu</strong></h3>
            </div>

            <div class="panel-body">
                <?php echo $message ?>
                <div class="page-header">
                    <a href="questionbuilder.php">Question Builder</a><br>
                    <a href="sqltutor.php">SQL Tutor</a><br>
                    <a href="manageusers.php">Manage Users</a><br>
                    <a href="managequestionbank.php">Manage Question Bank</a><br>
                    <a href="sqlpuzzle.php">SQL Puzzle</a><br>
                    <a href="sqlpuzzlewithtables.php">SQL Puzzle With Database Tables</a>
                </div><!-- /container -->
            </div>
        </div>
    </div>
</body>
</html>
