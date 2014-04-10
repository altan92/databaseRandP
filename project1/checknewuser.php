<?php
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

if(isset($_POST['password']) and isset($_POST['username']) and isset($_POST['gender']) ){
    
$user=$_POST['username'];
$password=$_POST['password'];
$location=$_POST['location'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$user = stripslashes($user);
session_start();

$sql = "select * from Users where Username ='$user'";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
if(!oci_fetch_array($statement, OCI_NUM)){
    $sql2 = "insert into users (Password,gender,age,Username) VALUES ('$password', '$gender', $age, '$user')"; 
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
    $sql2 = "Insert into Has (Username,state_name) VALUES ('$user','$location')"; 
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
    
    $_SESSION['user']=$user;
    header('Location: alf_tom_home.php');
    
    print "success";
}

else{
include_once 'signup.php';
   echo <<<_END
            <html>
                    <head> 
                            <script type="text/javascript">
    alert("Username already taken!"); 
</script> 
    </html>
_END;


}
}

else{

include_once 'signup.php';
   echo <<<_END
            <html>
                    <head> 
                            <script type="text/javascript">
    alert("Not everything was input properly!"); 
</script> 
    </html>
_END;

}


oci_close($conn);
?>
