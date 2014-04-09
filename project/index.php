<?php
ini_set('display_errors', 'On');
$db= "w4111c.cs.columbia.edu:1521/adb";
$conn= oci_connect("ti2181", "yungalf01", $db);
$appname= "Rock and Poll";
$stmt= oci_parse($conn, "select * from questions");
oci_execute($stmt, OCI_DEFAULT);
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
{
    echo "<li>" .
	"$res[1]" .
        "<br>" .
        '<div class="center">' .
         '<form action="updateAns.php"  method="get">'.
          '<button type="submit" class="myButton1">'."$res[2]".'</button>'.
          '<input type="hidden" name="val" value='.$res[0].'>'.
          '<input type="hidden" name="ans" value=1>'.
          '</form>'.
          '</div>'.
          '<div class="center">'.
          '<form action="updateAns.php"  method="get">'.
          '<button type="submit" class="myButton2">'."$res[3]".'</button>'.
          '<input type="hidden" name="val" value='.$res[0].'>'.
          '<input type="hidden" name="ans" value=0>'.
          ' </form>'.
          '</div>' .
	"</li>";


if (isset($_GET['val'])){
    print "Success";    
    $q_id=$_GET['val'];
    
    print $q_id;
}


else
    print "failure";


unset($_POST['val']);

}

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


