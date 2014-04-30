<?php
include_once 'alf_tom_home.php';
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

$user=$_SESSION['user'];
$q_id=$_GET['qid'];
echo <<<_END
<form method='post'>
        <font color="white">Comment</font><br />
        <textarea name='comment' id='comment' /></textarea><br />
         <input type='submit' value='Submit' />  
          </form>
_END;

if (isset($_POST['comment'])){
    $sql="select count(*) from Comments";
    $statement = oci_parse($conn, $sql);
    oci_execute($statement);
    $count=oci_fetch_array($statement, OCI_NUM);
    $count1=intval($count[0])+1;
    $comment=$_POST['comment'];
    $sql="Insert into Comments (Usercom,username,q_id,C_id) VALUES ('$comment','$user',$q_id,$count1)";    
    $statement = oci_parse($conn, $sql);
    oci_execute($statement);
}

$sql1 = "select * from comments where q_id =$q_id ORDER By C_id DESC" ;
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);

echo <<<_END
<!DOCTYPE html>
<html>
<head>
<style>
table,th,td
{
border:1px solid black;
}
</style>
</head>
<body>

<table>
  <tr>   
<th><font color="white"> Username</font></th>
    <th><font color="white">Comment</font></th>
  </tr>

_END;

while($row1 = oci_fetch_array($statement1, OCI_NUM)){
echo "<tr><td><font color=\"white\">";
echo wordwrap($row1[0], 50, "<br>", true);
echo "</font></td><td><font color=\"white\">";
echo wordwrap($row1[3], 50, "<br>", true);
echo "</font></td></tr>";
}

echo <<<_END
</table>

</body>
</html>
_END;

oci_close($conn);
?>

