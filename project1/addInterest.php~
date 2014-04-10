<?php include_once "alf_tom_main.php"?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="GET">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Add interest</strong></td>
</tr>
<tr>
<td>Add an interest</td>
<td><input name="interest" type="text" id="interest"></td>
<td><input type="submit" name="Submit" value="Add more"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<div>
<form action=profile.php method='GET'>
        <font color="white">Back to Profile</font><br />
         <input type='submit' value='Back to Profile!' />  
          </form>
</div>
<?php
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

if (isset($_SESSION["user"]) and isset($_GET["interest"])){
$user=$_SESSION["user"];
$interest=$_GET["interest"];

$sql="select * from Users where Username='$user'";
$stid=oci_parse($conn,$sql);
oci_execute($stid);
if (oci_fetch_all($stid, $res)){
        $sql="select * from interests where i_name='$interest'";
        $stid=oci_parse($conn,$sql);
        oci_execute($stid);
        if (!oci_fetch_all($stid, $res)){
            $sql="insert into interests (i_name) VALUES ('$interest')"; 
            $stid=oci_parse($conn,$sql);
            oci_execute($stid);
        }
        $sql="insert into Have (Username,i_name) VALUES ('$user','$interest')";
        $stid=oci_parse($conn,$sql);
        oci_execute($stid);

}
}

$sql="select i_name from HAVE where username='$user'";
$stid=oci_parse($conn,$sql);
oci_execute($stid);
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
    <th><font color="white">Current Interests</font></th>
  </tr>

_END;

while($row1 = oci_fetch_array($stid, OCI_NUM)){
echo "<tr><td><font color=\"white\">";
echo wordwrap($row1[0], 50, "<br>", true);
echo "</font></td></tr>";
}

echo <<<_END
</table>

</body>
</html>
_END;

oci_close($conn);
?>













