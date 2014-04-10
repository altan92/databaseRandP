<?php

echo <<<_END
<!DOCTYPE html>
<html>
<body>

<table align="right"  style="float: left" class="box" border="1px" width="60%">
<tr>
<TH>Total Answers</TH>
_END;

$sql = "select yes from Questions where q_id =$qid";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
$rowyes = oci_fetch_array($statement, OCI_NUM);

echo "<TH>Total People who answered ".$rowyes[0]."</TH>";


$sql = "select no from Questions where q_id =$qid";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
$rowno = oci_fetch_array($statement, OCI_NUM);
echo "<TH>Total People who answered ".$rowno[0]."</TH>";

echo <<<_END
<TH>Genre</TH>
</tr><tr align="center">
_END;


$sql = "select count(*) from Polls where q_id =$qid";
$statement = oci_parse($conn, $sql);
oci_execute($statement);
$row = oci_fetch_array($statement, OCI_NUM);
echo  "<td>".$row[0]. "</td>";

$sql1 = "select count(*) from Polls where q_id =$qid and answer=1";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM);
echo  "<td>".$row1[0]. "</td>";


$sql1 = "select count(*) from Polls where q_id =$qid and answer=0";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM);
echo  "<td>".$row1[0]. "</td>";
$sql1 = "select Genre_name from Genre G, Can_Be C where G.g_id=C.g_id AND C.q_id =$qid";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
if($row1 = oci_fetch_array($statement1, OCI_NUM))
    echo  "<td>".$row1[0]. "</td>";
else
    echo  "<td>No Genre</td>";

echo "</tr></table></body></html>";





$sql1 = "select stats from data where q_id =$qid";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM);

$yes=$row1[0];
$no=intval(100-$yes);



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
                    text: "Percentage of Data"
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
_END;
echo                "category: \"".$rowno[0]."\",";
echo                        "value:".$no. ",";
echo <<<_END
                      color: "#9de219"
                    },{
_END;
echo                "category: \"".$rowyes[0]."\",";                 

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


echo <<<_END
<form action=commentbox.php method='GET'>
        <font color="white">See comments</font><br />
_END;
echo "<input type=\"hidden\" name=\"qid\"  value=".$qid.">"; 
echo <<<_END
         <input type='submit' value='Submit' />  
          </form>
_END;

echo <<<_END
<form action=index.php method='GET'>
        <font color="white">Back to questions</font><br />
         <input type='submit' value='Back to questions' />  
          </form>
_END;
include_once('map1.php');

?>
