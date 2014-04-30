<?php
        require_once "common_file.php";
	/*ini_set('display_errors', 'On');
	$db = "w4111c.cs.columbia.edu:1521/adb";
	$conn = oci_connect("ti2181", "yungalf01", $db);*/
        $stmt= oci_parse($conn, "select * from questions");
        oci_execute($stmt, OCI_DEFAULT);
        $i=1;
        while($res= oci_fetch_row($stmt))
        {
                //echo "User Name: ". $res[1] . "<br>" ;
                if ($i==2){
                        break;
                }
                echo $res[1];
                $i=$i+1;
                //$question= $res[1];
                //echo $res[1];
        }
        /*echo <<<_END 
        <html>
                <head>
                        <title>Rock and Poll</title>
                </head>
                <body>
                
	/*$stmt = oci_parse($conn, "select user from dual");
	//oci_execute($stmt, OCI_DEFAULT);
	//while ($res = oci_fetch_row($stmt))
	{
		echo "User Name: ". $res[0] ;
	}*/
        //</html>
        //_END;
        oci_commit($conn);
	oci_close($conn);
?>
