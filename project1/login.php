<?php
include_once 'alf_tom_home.php';
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);
echo "<div class='main'><h3>Please enter your details to log in</h3>";
$error=$user=$pass="";

if(isset($_POST['user']))
{
        $user=sanitizeString($_POST['user']);
        $pass=sanitizeString($_POST['pass']);
        if($user == "" || $pass == "")
        {
                $error= '<span class="error">Not all fields were entered</span><br /><br />';
        }
        else
        {
                $stmt=oci_parse($conn, "select * from users where Username='$user' and Password='$pass'");
                oci_execute($stmt, OCI_DEFAULT);
                $res=oci_fetch_row($stmt);
                
                
                if(oci_num_rows($stmt) == 0)
                {
                        $error= '<span class="error">Username/Password
                                invalid</span><br /><br />';
                        
                }
                else
                {
                        $_SESSION['user']=$user;
                        $_SESSION['pass']=$pass;
                        header("location:alf_tom_home.php");
                        
                        
                }
        }
                
}

echo <<<_END
<form method='post' action='login.php'>$error
<span class='fieldname'>Username</span><input type='text'
        maxlength='16' name='user' value='$user' /><br />
<span class='fieldname'>Password</span><input type='password'
        maxlength='16' name='pass' value='$pass' />
_END;
oci_close($conn);
?>

</br />
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login' />
</form><br /></div></body></html>

