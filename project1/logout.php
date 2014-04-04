<?php
session_start();
        
if(session_destroy())
{
header("Location:alf_tom_home.php");
        echo "tommy is beautiful";
}        
?>
