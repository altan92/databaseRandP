<?php
$db = "w4111c.cs.columbia.edu:1521/adb";
$conn = oci_connect("ti2181", "yungalf01", $db);

$q_id=$_GET["val"];

$sql1 = "select stats from data where q_id =$q_id";
$statement1 = oci_parse($conn, $sql1);
oci_execute($statement1);
$row1 = oci_fetch_array($statement1, OCI_NUM); 
$yes=$row1[0];
$no=intval(100-$yes);

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
                    text: "Percentages of the question"
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
                        category: "YES",
_END;
echo                        "value:".$yes. ",";
echo <<<_END
                      color: "#9de219"
                    },{
                        category: "NO",
_END;
echo                    "value:".$no. ",";                        
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
include_once('map1.php');
?>
