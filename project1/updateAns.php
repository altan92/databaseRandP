<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="updateAns.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="user" type="text" id="user"></td>
</tr>
<tr>
<td>QID</td>
<td>:</td>
<td><input name="q_id" type="text" id="q_id"></td>
</tr>

<tr>
<td>answer</td>
<td>:</td>
<td><input name="answer" type="text" id="answer"></td>
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
if (isset($_POST["user"]) and isset($_POST["q_id"])){
$user=$_POST['user'];
$q_id=$_POST['q_id'];
$answer=$_POST['answer'];
print $user;

$sql="select * From Polls Where Username='$user' AND q_id=$q_id";
$sql2 = "insert into Polls (Username,q_id,answer) VALUES ('$user',$q_id,$answer)"; 

$statement=oci_parse($conn,$sql);
oci_execute($statement);
if (!oci_fetch_array($statement, OCI_NUM)){
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
    echo "Success";
    $sql3="select count(*) From Polls Where q_id=$q_id AND answer=1";
    $sql4="select count(*) From Polls Where q_id=$q_id";
    
    $stmt1 = oci_parse($conn, $sql3);
    oci_execute($stmt1);
    $yes1=oci_fetch_array($stmt1, OCI_NUM);
    $yes1=floatval($yes1[0]);

    $stmt = oci_parse($conn, $sql4);
    oci_execute($stmt);
    $count=oci_fetch_array($stmt, OCI_NUM);
    $count=floatval($count[0]);
    
    $percent= $yes1/$count*100;
    $sql2 = "Update Data SET stats=$percent where q_id=$q_id"; 
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);

    include_once "makegraph.php";
}
else{
echo <<<_END
    <html>
        <head> 
        <script type="text/javascript">
    alert("You already answered this question!"); 
</script> 
    </html>
_END;

    }

}
oci_close($conn);

?>
















