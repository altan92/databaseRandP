<?php
include_once 'alf_tom_home.php';
echo <<<_END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
        <head>
                <meta http-equiv="content-type" content="text/html;charset=utf-8" />
                <meta name="generator" content="Adobe GoLive" />
                <!--<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />-->
                 
                <title>New User</title>
        </head>
 
        <body>
                <div id="outline" >
                        <!--<img src="gradient.jpg" alt="" height="300" width="1000" border="0" />-->
 
<form name="form1" method="post" action="checknewuser.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" background-image: "url('bg_tile.jpg')" style='margin-left:500px' >
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="294"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td><input name="password" type="password" id="password"></td>
</tr>

<td>Location</td>
<td><select name="location">
<option value="Alabama">Al</option>
<option value="Alaska">Ak</option>
<option value="Arizona">Az</option>
<option value="Arkansas">Ar</option>
<option value="California">Ca</option>
<option value="Colorado">Co</option>
<option value="Connecticut">Ct</option>
<option value="Delaware">De</option>
<option value="Florida">Fl</option>
<option value="Georgia">Ga</option>
<option value="Hawaii">Hi</option>
<option value="Idaho">ID</option>
<option value="Illinois">Il</option>
<option value="Indiana">In</option>
<option value="Iowa">Io</option>
<option value="Kansas">Ks</option>
<option value="Kentucky">Ky</option>
<option value="Louisiana">La</option>
<option value="Maine">Me</option>
<option value="Maryland">Md</option>
<option value="Massachusetts">Ma</option>
<option value="Michigan">Mi</option>
<option value="Minnesota">Mn</option>
<option value="Mississippi">Ms</option>
<option value="Missouri">Mo</option>
<option value="Montana">Mt</option>
<option value="Nebraska">Ne</option>
<option value="Nevada">Nv</option>
<option value="New Hampshire">Nh</option>
<option value="New Jersey">Nj</option>
<option value="New Mexico">Nm</option>
<option value="New York">Ny</option>
<option value="North Carolina">Nc</option>
<option value="North Dakota">Nd</option>
<option value="Ohio">Oh</option>
<option value="Oklahoma">Ok</option>
<option value="Oregon">Or</option>
<option value="Pennsylvania">Pa</option>
<option value="Rhode Island">Ri</option>
<option value="South Carolina">Sc</option>
<option value="South Dakota">Sd</option>
<option value="Tennessee">Tn</option>
<option value="Texas">Tx</option>
<option value="Utah">Ut</option>
<option value="Vermont">Vt</option>
<option value="Virgina">Va</option>
<option value="Washington">Wa</option>
<option value="West Virgina">WV</option>
<option value="Wisconsin">Wi</option>
<option value="Wyoming">Wy</option>
</select></td>
</tr>

<td>Age</td>
<td><input name="age" type="text" id="age"></td>
</tr>

<td>Gender</td>
<td><input type="checkbox" name="gender" value="Male" id="gender">Male<br>
<input type="checkbox" name="gender" value="Female" id="gender">Female </td>
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

<div id="sidebar">
</div>
 </div>
 
        </body>
 
</html>
_END;
?>
