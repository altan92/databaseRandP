<?php
include_once 'alf_tom_home.php';
ini_set('display_errors', 'On');
$db= "w4111c.cs.columbia.edu:1521/adb";
$conn= oci_connect("ti2181", "yungalf01", $db);
$appname= "Rock and Poll";

$user=$_SESSION['user'];
$stmt= oci_parse($conn, "select * from questions where q_id NOT IN(Select q_id From Polls Where Username='$user')");

oci_execute($stmt, OCI_DEFAULT);


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


<div id="slider">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><</a>
  <ul>
_END;

while($res= oci_fetch_row($stmt))
{
    echo "<li>" .
        "<div class='caption' style='margin-top:10px; font-size:20pt;'>" .
	"$res[1]" .
        "</div>" .
        "<br>" .
        '<div class="center">' .
         '<form action="updateAns.php" method="get">'.
          '<button type="submit" class="myButton1">'."$res[2]".'</button>'.
          '<input type="hidden" name="val" value='.$res[0].'>'.
          '<input type="hidden" name="ans" value=1>'.
          '<input type="hidden" name="user" value='.$user.'>'.
          '</form>'.
          '</div>'.
          '<div class="center">'.
          '<form action="updateAns.php"  method="get">'.
          '<button type="submit" class="myButton2">'."$res[3]".'</button>'.
          '<input type="hidden" name="val" value='.$res[0].'>'.
          '<input type="hidden" name="ans" value=0>'.
          '<input type="hidden" name="user" value='.$user.'>'.
          ' </form>'.
          '</div>' .
	"</li>";

}

echo <<<_END
  </ul>  
</div>

    
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>
_END;
oci_close($conn);
?>


