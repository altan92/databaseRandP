<?php



ini_set('display_errors', 'On');

$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);


$user=$_POST['username'];
$password=$_POST['password'];
$location=$_POST['location'];
$age=$_POST['age'];
$gender=$_POST['gender'];
echo $user;
echo $password;
echo $location;
echo $age;
echo $gender;
$sql = "select * from Users where Username ='$user'";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
if(!oci_fetch_array($statement, OCI_NUM) and $user){
    $sql2 = "insert into users (Password,gender,age,Username) VALUES ('$password', '$gender', $age, '$user')"; 
    $stmt = oci_parse($conn, $sql2);
    oci_execute($stmt);
    header('Location: alf_tom_home.php');
    
    print "success";
}
else{
    print "user already defined";
}
oci_close($conn);
?>
