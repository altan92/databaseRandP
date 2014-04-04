<?php
session_start();
echo "<!DOCTYPE html>\n<html><head><script src='OSC.js'></script>";
include 'common_file.php';

$userstr= ' (Guest)';

if (isset($_SESSION['user']))
{
        $user= $_SESSION['user'];
        $loggedin= TRUE;
        $userstr= " ($user)";
}
else $loggedin=FALSE;

echo "<title>$appname$userstr</title><link rel='stylesheet'" .
        "href='styles.css' type='text/css' />" .
        "</head><body><div class='appname'>$appname$userstr</div>";

if($loggedin)
{ 
        echo("<br /><ul class= 'menu'>" .
                "<li><a href='generatedata.php'>Graph</a></li>" .
                "<li><a href='logout.php'>Log out</a></li></ul><br />".
                "<span class='info'>&#8658; You are now logged in to " .
                "view this page.</span><br /><br />");
}
else
{
        echo("<br /><ul class= 'menu'>" .
                "<li><a href='alf_tom_main.php'>Home</a></li>" .
                "<li><a href='signup.php'>Sign up</a></li>" .
                "<li><a href='main_login.php'>Log in</a></li></ul><br />".
                "<span class='info'>&#8658; You must be logged in to " .
                "view this page.</span><br /><br />");
}
oci_close($conn);
?> 


