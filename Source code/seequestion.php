<?php include_once "alf_tom_home.php";?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body >
<table style="width:1000px" align="center">
<table class="flat-table flat-table-1" border="2">
<TH>Search for</TH>
<tr>
<td>
<form method="post">
<input type="submit" class="myButton3"  value="All Questions" >
<input type="hidden" name="genre" value="All">
</form>
</td>
</tr>

<tr>
<td>
<form method="post">
<input type="submit" class="myButton3" value="Business Questions" >
<input type="hidden" name="genre"  value="Business">
</form>
</td>
</tr>
<tr>
<td>
<form method="post" >
<input type="submit" class="myButton3" value="Pop Culture Questions">
<input type="hidden" name="genre"  value="Pop Culture">
</form>
</td>
</tr>
<tr>
<td>
<form method="post">
<input type="submit" class="myButton3" value="Movies Questions">
<input type="hidden" name="genre" value="Movies">
</form></td>
</tr>
<tr>
<td>
<form method="post">
<input type="submit" class="myButton3" value="Education Questions" >
<input type="hidden" name="genre" value="Education">
</form></td>
</tr>
<tr>
<td>
<form method="post">
<input type="submit" class="myButton3" value="World News Questions">
<input type="hidden" name="genre"  value="World News">
</form></td>
</tr>
</table>
</body>
</html>


<?php
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);
if (isset($_POST["genre"])){
$genre=$_POST["genre"];
if ($genre=="All"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q, Genre G,Can_Be C Where Q.q_id=C.q_id AND G.g_id=C.g_id";
}


if ($genre=="Business"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q,Business G,Can_Be C Where Q.q_id=C.q_id And G.g_id=C.g_id";
}


if ($genre=="Pop Culture"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q,Pop_culture G,Can_Be C Where Q.q_id=C.q_id And G.g_id=C.g_id";
}


if ($genre=="Movies"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q,Movies G,Can_Be C Where Q.q_id=C.q_id And G.g_id=C.g_id";
}


if ($genre=="Education"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q,Education G,Can_Be C Where Q.q_id=C.q_id And G.g_id=C.g_id";
}


if ($genre=="World News"){
        $sql = "select Q.question,G.genre_name,Q.q_id from Questions Q,World_News G,Can_Be C Where Q.q_id=C.q_id And G.g_id=C.g_id";
}
$statement = oci_parse($conn, $sql);
oci_execute($statement);
echo <<<_END
    <!DOCTYPE html>
    <html>
<body>



<table style="width:1000px">
<table class="flat-table flat-table-1" border="2">
<tr>
  <td>Question</td>
<td>See question data</td>
<td>Genre name</td>
</tr>
_END;


while ( $row = oci_fetch_array($statement, OCI_NUM)) {
        echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td style='text-align:center;vertical-align:middle'>";
                echo "<form method=\"post\" action=\"displayQuestion1.php\">";
                echo "<input type=\"submit\" class=\"myButton3\"value=\"Question data\" >";
                    echo "<input type=\"hidden\" name=\"qid\"  value=".$row[2].">";
                    echo "</form></td>";
                        echo "<td>".$row[1]."</td></tr>";
}


echo <<<_END
    </table>
</body>
</html>    
_END;
}
oci_close($conn);


?>




