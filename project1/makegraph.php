<?php
$yes=$_POST['yes'];
$no=$_POST['no'];
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo    "<base href=\"http://demos.telerik.com/kendo-ui/dataviz/pie-charts/index.html\">";
echo    "<style>html { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }</style>";
echo    "<title></title>";
echo    "<link href=\"http://cdn.kendostatic.com/2014.1.318/styles/kendo.common.min.css\" rel=\"stylesheet\" />";
echo    "<link href=\"http://cdn.kendostatic.com/2014.1.318/styles/kendo.default.min.css\" rel=\"stylesheet\" />";
echo    "<link href=\"http://cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.min.css\" rel=\"stylesheet\" />";
echo    "<link href=\"http://cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.default.min.css\" rel=\"stylesheet\" />";
echo    "<script src=\"http://cdn.kendostatic.com/2014.1.318/js/jquery.min.js\"></script>";
echo    "<script src=\"http://cdn.kendostatic.com/2014.1.318/js/kendo.all.min.js\"></script>";
echo "</head>";
echo "<body>";
echo    "<div id=\"example\" class=\"k-content\">";
echo    "<div class=\"chart-wrapper\">";
echo        "<div id=\"chart\" style=\"background: center no-repeat url('../../content/shared/styles/world-map.png');\"></div>";
echo   "</div>";
echo   "<script>";
echo        "function createChart() {";
echo            "$(\"#chart\").kendoChart({";
echo            "title: {";
echo                    "position: \"bottom\",";
echo                    "text: \"Praise the power of Yilma\"";
echo                "},";
echo                "legend: {";
echo                    "visible: false";
echo                "},";
echo                "chartArea: {";
echo                    "background: \"\"";
echo                "},";
echo                "seriesDefaults: {";
echo                    "labels: {";
echo                        "visible: true,";
echo                        "background: \"transparent\",";
echo                        "template: \"#= category #: #= value#%\"";
echo                    "}";
echo                "},";
echo                "series: [{";
echo                    "type: \"pie\",";
echo                    "startAngle: 150,";
echo                    "data: [{";
echo                        "category: \"No\",";
echo                        "value:".$no. ",";
echo                        "color: \"#000000\"";
echo                    "},{";
echo                        "category: \"Yes\",";
echo                        "value:".$yes.",";
echo                        "color: \"#00FF00\"";
echo                    "}]";
echo                "}],";
echo                "tooltip: {";
echo                    "visible: true,";
echo                    "format: \"{0}%\"";
echo                "}";

echo            "});";
echo        "}";
echo        "$(document).ready(createChart);";
echo        "$(document).bind(\"kendo:skinChange\", createChart);";
echo    "</script>";
echo "</div>";


echo "</body>";
echo "</html>";

?>