<?php

ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

$user=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$user = stripslashes($user);
$mypassword = stripslashes($mypassword);
$stid=oci_parse($conn, "SELECT * FROM USERS WHERE Username='$user' and Password='$mypassword'");
$result=oci_execute($stid);
$count=oci_fetch_all($stid, $res);;
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    session_register("user");
    $_SESSION['user']=$user;
    session_register("mypassword"); 
    header("location:alf_tom_home.php");
}
else {
    echo "Wrong Username or Password";
}

oci_close($conn);
?>



