<?php
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

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
    $yes=oci_fetch_array($stmt1, OCI_NUM);
    $yes=floatval($yes[0]);

    $stmt = oci_parse($conn, $sql4);
    oci_execute($stmt);
    $count=oci_fetch_array($stmt, OCI_NUM);
    $count=floatval($count[0]);
    
    $percent= $yes/$count*100;
    $sql2 = "Update Data SET stats=$percent where q_id=$q_id"; 
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
}
else{
    echo "You already answered this question";
    

}    
oci_close($conn);

?>
















