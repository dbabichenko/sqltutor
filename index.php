<?php
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

session_start();

$firstName = "Guest";

if
(unserialize($_SESSION["errorMessage"]) != null)
{
	$message = unserialize($_SESSION["errorMessage"]);
	
}
elseif(unserialize($_SESSION["user"]))
{
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu.php\">";
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
    
    <noscript>
		<meta http-equiv="refresh" content="0;URL=ErrorPages/missingJavascript.php">
	</noscript>

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
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container theme-showcase" style="width:500px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Please Login</strong></h3>
            </div>

            <div class="panel-body">
                <?php echo $message ?>

                <div class="page-header">
                    <form class="form-signin" method="post" action="auth.php">
                        <h2 class="form-signin-heading">Login</h2><br>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required="" autofocus=""><br>
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" required=""><br>
                        <button class="btn btn-lg btn-primary" type="submit" style="paddding-bottom: 50px;">Login</button>
                    </form>
                    <!--
<hr style="border:dashed #3581C5; border-width:2px 0 0 0; height:0;line-height:0px;font-size:0;margin:0;padding:0;">

                    <form class="form-signin" method="post" action="register.php">
                        <h2 class="form-signin-heading">Register</h2><br>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required="" autofocus=""><br>
                        <button class="btn btn-lg btn-primary" type="submit" style="paddding-bottom: 50px;">Register</button>
                    </form>
-->
                </div>
            </div><!-- /container -->
        </div>
    </div><script type="text/javascript">
$('form-signin').validate({
            rules : {
                password : {
                    minlength : 5,
                }
            }
        });
    </script>
</body>
</html>
