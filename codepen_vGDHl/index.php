<?php
ini_set('display_errors', 'On');
$db= "w4111c.cs.columbia.edu:1521/adb";
$conn= oci_connect("ti2181", "yungalf01", $db);
$appname= "Rock and Poll";
$stmt= oci_parse($conn, "select * from questions");
oci_execute($stmt, OCI_DEFAULT);
$res= oci_fetch_row($stmt);
//$question= $res[1];
//echo $question;
echo <<<_END
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Very Simple Slider - CodePen</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>

</head>

<body>

  <h1>Incredibly Basic Slider</h1>

<div id="slider">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><</a>
  <ul>
_END;

while($res= oci_fetch_row($stmt))
    echo "<li>" .
	"$res[1]" .
	"<div class="center">" .
	"<a href="javascript:void(0);" class="myButton1">YES</a>" .
	"<a href="javascript:void(0);" class="myButton2">NO</a>" .
	"</div>" .
	"</li>";

echo <<<_END
  </ul>  
</div>

<div class="slider_option">
  <input type="checkbox" id="checkbox">
  <label for="checkbox">Autoplay Slider</label>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>
_END;
?>


