<?php
session_start();
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

$sql = "select question from Questions";
$statement = oci_parse($conn, $sql);
oci_execute($statement);

while ( $row = oci_fetch_array($statement, OCI_NUM)) {
    echo $row;
}

oci_close($conn);
?>