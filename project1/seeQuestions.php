<?php
session_start();
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

$sql = "select * from Questions";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
echo <<<_END
<!DOCTYPE html>
<html>
<body>



<table style="width:1000px">
<table border="2">
<tr>
  <td>Question</td>
  <td>Qid</td>
<td>See question data</td>
</tr>
_END;


while ( $row = oci_fetch_array($statement, OCI_NUM)) {
    echo "<tr>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[0]."</td>";
    echo "<td style='text-align:center;vertical-align:middle'>";
    echo "<form method=\"post\" action=\"displayQuestion.php\">";
    echo "<input type=\"submit\" value=\"Question data\" >";
    echo "<input type=\"hidden\" name=\"qid\"  value=".$row[0].">";
    echo "</form></td></tr>";
}


echo <<<_END
</table>
</body>
</html>    
_END;

oci_close($conn);
?>
