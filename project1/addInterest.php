<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Add an interest</td>
<td>:</td>
<td><input name="interest" type="text" id="interest"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>


<?php
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

if (isset($_POST["username"]) and isset($_POST["interest"])){
$user=$_POST["username"];
$interest=$_POST["interest"];

$sql="select * from Users where Username='$user'";
$stid=oci_parse($conn,$sql);
oci_execute($stid);
print "check1";
if (oci_fetch_all($stid, $res)){
    print "check2";
        $sql="select * from interests where i_name='$interest'";
        $stid=oci_parse($conn,$sql);
        oci_execute($stid);
        if (!oci_fetch_all($stid, $res)){
            print "check3";
            $sql="insert into interests (i_name) VALUES ('$interest')"; 
            $stid=oci_parse($conn,$sql);
            oci_execute($stid);
        }
        $sql="insert into Have (Username,i_name) VALUES ('$user','$interest')";
        $stid=oci_parse($conn,$sql);
        oci_execute($stid);

}
}
oci_close($conn);
?>













