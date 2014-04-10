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
        <td>Password</td>
        <td>$res[0]</td>
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

<tr>
        <td>Interests</td>
        <td>
_END;
while($iname=oci_fetch_row($interest)){
echo <<<_END
        $iname[1]<br />
_END;
}
echo <<<_END
</td>
</tr>
</table></div>
<div class="main" style="color:white;">
<h3>Here are the questions that you have answered:</h3>
</div>
</div>
</body></html>
_END;
oci_close($conn);
?>

