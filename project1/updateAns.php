<?php
include_once "alf_tom_home.php";
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);
$user=$_GET['user'];
$q_id=$_GET['val'];
$answer=$_GET['ans'];
$sql="select * From Polls Where Username='$user' AND q_id=$q_id";
$sql2 = "insert into Polls (Username,q_id,answer) VALUES ('$user',$q_id,$answer)"; 

$statement=oci_parse($conn,$sql);
oci_execute($statement);
if (!oci_fetch_array($statement, OCI_NUM)){
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
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
    
    $qid=$q_id;
    include_once "displayQuestion.php";
    
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

$qid=$q_id;
include_once "displayQuestion.php";
}


?>
















