<?php
ini_set('display_errors', 'On');
$db= "w4111c.cs.columbia.edu:1521/adb";
$conn= oci_connect("ti2181", "yungalf01", $db);
$appname= "Rock and Poll";
$stmt= oci_parse($conn, "select * from questions");
oci_execute($stmt, OCI_DEFAULT);
$res= oci_fetch_row($stmt);
$question= $res[1];
echo $question;
echo <<<_END
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Very Simple Slider - CodePen</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <h1>Incredibly Basic Slider</h1>

<div id="slider">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><</a>
  <ul>
    <li>$question</li>
    <li style="background: #aaa;">SLIDE 2</li>
    <li>SLIDE 3</li>
    <li style="background: #aaa;">SLIDE 4</li>
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


