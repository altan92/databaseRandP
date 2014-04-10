<?php
include_once "alf_tom_home.php";
$qid=$_GET["qid"];
$state=$_GET["state"];
ini_set('display_errors', 'On');
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);
echo <<<_END
<!DOCTYPE html>
<html>
<body>

<table align="right"  style="float: left" class="box" border="1px" width="60%">
<tr>
<TH>Total Answers</TH>
<TH>Total Yes's</TH>
<TH>Total No's</TH>
<TH>Genre</TH>
</tr><tr align="center">
_END;


$sql = "select count(*) from Polls P,Has H where q_id =$qid AND P.username=H.username AND H.state_name='$state'";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
$row = oci_fetch_array($statement, OCI_NUM);
echo  "<td>".$row[0]. "</td>";

$sql1 = "select count(*) from Polls P, Has H where P.q_id =$qid and P.answer=1 and P.username=H.username AND H.state_name='$state'";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM);
echo  "<td>".$row1[0]. "</td>";
$yes=$row1[0];

$sql1 =  "select count(*) from Polls P, Has H where P.q_id =$qid and P.answer=0 and P.username=H.username AND H.state_name='$state'";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM);
echo  "<td>".$row1[0]. "</td>";
$no=$row1[0];

if ($yes==0 and $no==0){
    $yes=50;
    $no=50;
}
else{
    $total=floatval($yes)+floatval($no);
    $yes=floatval($yes)/floatval($total)*100;
    $no=100-floatval($yes);
    print $total;

}


$sql1 = "select Genre_name from Genre G, Can_Be C where G.g_id=C.g_id AND C.q_id =$qid";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
if($row1 = oci_fetch_array($statement1, OCI_NUM))
    echo  "<td>".$row1[0]. "</td>";
else
    echo  "<td>No Genre</td>";

echo "</tr></table></body></html>";



echo <<<_END
<!DOCTYPE html>
<html>
<body>

<table style="float: left" class="box" border="1px" style="width:300px">
<tr>
<TH>Interests of those who answered this question</TH>
</tr>
_END;

$sql1 = "select distinct i_name from Have H, Polls P where P.q_id=$qid AND P.Username =H.username";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);

while($row1 = oci_fetch_array($statement1, OCI_NUM))
    echo  "<tr><TH><span style=\"font-weight: normal;\">".$row1[0]."</span> </TH></tr>";
echo "</tr></table></body></html>";
oci_close($conn);


echo <<<_END
    <!DOCTYPE html>
<html>
<head>
    <style>html { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link href="http://cdn.kendostatic.com/2014.1.318/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2014.1.318/styles/kendo.default.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.default.min.css" rel="stylesheet" />
    <script src="http://cdn.kendostatic.com/2014.1.318/js/jquery.min.js"></script>
    <script src="http://cdn.kendostatic.com/2014.1.318/js/kendo.all.min.js"></script>
</head>
<body>
    <div id="example" class="k-content">
    <div class="chart-wrapper">
        <div id="chart" style="background: center no-repeat url('../../content/shared/styles/world-map.png');"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    position: "bottom",
                    text: "Percentage by state"
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: #= value#%"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: [{
                        category: "No", 
_END;
echo                        "value:".$no. ",";
echo <<<_END
                      color: "#9de219"
                    },{
                        category: "Yes",                 
_END;
echo                    "value:".$yes. ",";                        
echo <<<_END
                        color: "#87CEEB"
                    
                    }]
                }],
                tooltip: {
                    visible: true,
                    format: "{0}%"
                }
            });
        }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
                    </script>
                        </div>


</body>
</html>
_END;



?>
