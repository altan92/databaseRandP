<?php
        
	ini_set('display_errors', 'On');
	$db = "w4111c.cs.columbia.edu:1521/adb";
	$conn = oci_connect("ti2181", "yungalf01", $db);
        $appname= "Rock and Poll";


        function oci_escape_string($string) {
                return str_replace(array('"',"'", '\\'), array('\\"', '\\\'', '\\\\'), $string);
        }

        function sanitizeString($input)
        {
                $input=strip_tags($input);
                $input=htmlentities($input);
                $input=stripslashes($input);
                return oci_escape_string($input);
        }
?>
