<?php
/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/
session_start();

$firstName = "Guest";

if(unserialize($_SESSION["errorMessage"]) != null){
    $message = unserialize($_SESSION["errorMessage"]);
    
}
elseif(unserialize($_SESSION["user"])){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu.php\">";
}

require('layout/header.php');
?>
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
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required="" autofocus="">
                        <br>
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" required="">
                        <br>
                        <button class="btn btn-lg btn-primary" type="submit" style="paddding-bottom: 50px;">Login</button>
                    </form>
				</div>
            </div><!-- /container -->
        </div>
    </div>
<?
require('layout/footer.php');