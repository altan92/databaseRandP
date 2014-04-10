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
		'<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />' .
		'<!-- Enabling HTML5 support for Internet Explorer -->' .
        '<!--[if lt IE 9]>' .
          '<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>' .
        '<![endif]-->' .
        "</head><body><div class='appname'>$appname$userstr</div>";

if($loggedin)
{
 
echo <<<_END
	<nav>
            <ul class="fancyNav">
                <li id="home"><a href='alf_tom_main.php' class="homeIcon">Home</a></li>
                <li id="news"><a href=profile.php>Profile</a></li>
                <li id="services"><a href='logout.php'>Log out</a></li>
                <li id="about"><a href='index.php'>Browse questions</a></li>
                <li id="seequestions"><a href='seequestion.php'>See all questions</a></li>
                <li id="contact"><a href="#contact">Contact us</a></li>
            </ul><br />    
            
        </nav>
_END;
        /*echo("<br /><ul class= 'menu'>" .
                "<li><a href='generatedata.php'>Graph</a></li>" .
                "<li><a href='logout.php'>Log out</a></li>".
                "<li><a href='seeQuestions.php'>See all questions</a></li></ul><br />".
                "<span class='info'>&#8658; You are now logged in to " .
                "view this page.</span><br /><br />");*/
}
else
{
echo <<<_END
	<nav>
            <ul class="fancyNav">
                <li id="home"><a href='alf_tom_main.php' class="homeIcon">Home</a></li>
                <li id="news"><a href=about.php>About us</a></li>
                <li id="about"><a href='signup.php'>Sign up</a></li>
                <li id="services"><a href='login.php'>Log in</a></li>
                <li id="contact"><a href="#contact">Contact us</a></li>
            </ul><br />    
            
        </nav>
        <div class='welcome'> DATA EVOLVED </div><br />
        <div class='caption'> A Visual Polling Platform</div><br />
_END;
		
		/*echo("<br /><ul class= 'menu'>" .
                "<li><a href='alf_tom_main.php'>Home</a></li>" .
                "<li><a href='signup.php'>Sign up</a></li>" .
                "<li><a href='main_login.php'>Log in</a></li></ul><br />".
                "<span class='info'>&#8658; You must be logged in to " .
                "view this page.</span><br /><br />");*/
}
oci_close($conn);
?> 



