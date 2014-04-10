<?php
include_once 'alf_tom_home.php';
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);
echo "<div class='main'><div class='main' style='color:white;'><h3>Your Account Information</h3>";
$user=$_SESSION['user'];
$stmt=oci_parse($conn, "select * from users where username='$user'");
oci_execute($stmt, OCI_DEFAULT);
$res=oci_fetch_row($stmt);
$stid=oci_parse($conn, "select * from has where username='$user'");
oci_execute($stid, OCI_DEFAULT);
$result=oci_fetch_row($stid);

$interest=oci_parse($conn, "select * from have where username='$user'");
oci_execute($interest, OCI_DEFAULT);

echo <<<_END
<table class="flat-table flat-table-1" border="2">
<tr>
        <td>Username</td>
        <td>$res[3]</td>
</tr>
<tr>
        <td>Gender</td>
        <td>$res[1]</td>
</tr>
<tr>
        <td>Age</td>
        <td>$res[2]</td>
</tr>
<tr>
        <td>Location</td>
        <td>$result[1]</td>
</tr>
</table>
_END;
if ($iname=oci_fetch_row($interest)){
    echo <<<_END
    <h3>Your Interests</h3>
    <table class="flat-table flat-table-1" border="2">    
    <tr>
        <td>$iname[1]</td>
</tr>
_END;

    while($iname=oci_fetch_row($interest)){
echo <<<_END
        <tr>
        <td>
        $iname[1]<br />
        </td>
        </tr>
</div>
_END;
}
echo <<<_END
</table>
_END;
}
echo <<<_END
<form action=addInterest.php method='GET'>
<font color="white">Add an interest</font><br />
<input type='submit' value='Add Interest!' />  
</form>
</div>
_END;


$stid=oci_parse($conn, "select Q.question,P.answer,Q.q_id from Polls P,Questions Q where P.username='$user' AND Q.q_id=P.q_id");
oci_execute($stid, OCI_DEFAULT);


echo <<<_END
<div class="main" style="color:white;">
<h3>Here are the questions that you have answered</h3>
</div>

<table class="flat-table flat-table-1" border="2">
<tr><td>Question</td><td>Answer</td><td>See question data</td></tr>
_END;


while($res=oci_fetch_row($stid)){

if ($res[1]==1){
$stid1=oci_parse($conn, "select yes from Questions where q_id=$res[2]");
oci_execute($stid1, OCI_DEFAULT);
$ans=oci_fetch_row($stid1);
}
else{
$stid1=oci_parse($conn, "select no from Questions where q_id=$res[2]");
oci_execute($stid1, OCI_DEFAULT);
$ans=oci_fetch_row($stid1);

}
print "<tr><td>".$res[0]."</td><td>".$ans[0];

echo <<<_END
<td>
<form action=displayQuestion1.php method='POST'>
_END;
echo "<input type=\"hidden\" name=\"qid\"  value=".$res[2].">";
echo <<<_END
<input type='submit' value='See Question data' />  
</form>
_END;

print "</td></tr>";
}
echo <<<_END
</table>

</div>
</body></html>
_END;

oci_close($conn);
?>

