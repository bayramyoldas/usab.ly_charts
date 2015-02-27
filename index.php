<?php
include ("config/db.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr" />
<head>
    <title>Charts</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="content-style-type" content="text/css" />
  <meta http-equiv="content-language" content="en" />
  <meta http-equiv="imagetoolbar" content="no" />
  <meta name="resource-type" content="media" />
  <meta name="distribution" content="global" />
  <meta name="copyright" content="2014 Bayram Yoldas" />
  <meta name="keywords" content="image, fan art, draw, game, anime, manga" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">

  <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>

<?php
/*
Array ( [1] => Array ( [0] => Array ( [0] => Time [1] => Activity ) 
                       [1] => Array ( [0] => 14:00 [1] => 20 ) 
                       [2] => Array ( [0] => 16:00 [1] => 15 ) 
                       [3] => Array ( [0] => 18:00 [1] => 45 ) 
                       [4] => Array ( [0] => 20:00 [1] => 80 ) ) ) 

Array ( [2] => Array ( [0] => Array ( [0] => title1 [1] => title2 ) 
                       [1] => Array ( [0] => deneme2 [1] => 24 ) 
                       [2] => Array ( [0] => deneme3 [1] => 22 ) 
                       [3] => Array ( [0] => deneme4 [1] => 67 ) ) ) 

Array ( [label] => 12:00 [y] => 50 ) 
Array ( [label] => 14:00 [y] => 20 ) 
Array ( [label] => 16:00 [y] => 15 ) 
Array ( [label] => 18:00 [y] => 45 )
Array ( [label] => 20:00 [y] => 80 )

Array ( [label] => deneme1 [y] => 21 ) Array ( [label] => deneme2 [y] => 24 ) Array ( [label] => deneme3 [y] => 22 ) Array ( [label] => deneme4 [y] => 67 ) Array ( [label] => deneme5 [y] => 85 ) Array ( [label] => Ist [y] => 1700 ) Array ( [label] => Mal [y] => 100 ) Array ( [label] => Tok [y] => 70 ) Array ( [label] => Ank [y] => 400 ) Array ( [label] => [y] => 0 ) Array ( [label] => Ist [y] => 1700 ) Array ( [label] => Mal [y] => 100 ) Array ( [label] => Tok [y] => 200 ) Array ( [label] => Ank [y] => 450 ) Array ( [label] => [y] => 0 ) Array ( [label] => 12:00 [y] => 50 ) Array ( [label] => 14:00 [y] => 20 ) Array ( [label] => 16:00 [y] => 15 ) Array ( [label] => 18:00 [y] => 45 ) Array ( [label] => 20:00 [y] => 80 ) Array ( [label] => deneme1 [y] => 213 ) Array ( [label] => asas [y] => 124 ) Array ( [label] => [y] => 0 )

*/
  try {
    $conn = new PDO (DSN, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare('SELECT * FROM piechart');
   // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $row_count = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      
      $piechart_data                   = array();
      $element_name                    = explode(", ", $row['element_name']);
      $element_value                   = explode(", ", $row['element_value']);
      $piechart_title[$row_count]      = $row['chart_title'];
      $point = array();
      for ($i=0; $i < count($element_value) ; $i++) 
      { 
          $piechart_data[$row_count][$i][0] = $element_name[$i];
          $piechart_data[$row_count][$i][1] = floatval($element_value[$i]);
          $point = array("label" => $piechart_data[$row_count][$i][0] , "y" => $piechart_data[$row_count][$i][1]);    
          echo json_encode($point, JSON_NUMERIC_CHECK);
      }

      $row_count++;
    }
    $row_count = $stmt->rowCount();
    $element_count = count($element_name );
  } catch (PDOException $e) 
    {
      echo 'ERROR: ' . $e->getMessage();
    }
?>


<script type="text/javascript">
  var piechart_title = <?=json_encode($piechart_title)?>; 
  var row_count = <?=json_encode($row_count)?>;
  var data_array = <?=json_encode($point, JSON_NUMERIC_CHECK)?>; 
  var element_count = <?=json_encode($element_count)?>; 
  window.onload = function () {
    for (var i = 1; i <= row_count; i++) {
      for (var k = 0; k < element_count-1 ; k++) { 
        var chartContainer = "chartContainer" + i;
        var chart_canvas = "chart" + i;
        var chart_canvas = new CanvasJS.Chart(chartContainer, {
          title:{
            text: piechart_title[i]             
          },
          data: [//array of dataSeries              
            { //dataSeries object

             /*** Change type "column" to "bar", "area", "line" or "pie"***/
             type: "pie",
             dataPoints: data_array
           }
           ]
        });
         chart_canvas.render();
       };
    };
 }
</script>
  <script type="text/javascript" src="js/canvasjs.js"></script>




<!-- OLD (GOOGLE CHARTS)
  <script type="text/javascript">    
    var row_count = <?=json_encode($row_count)?>;  

    var data_array = new Array(row_count-1);
    var piechart_title = new Array(row_count-1);

    var data = new Array(row_count-1);
    var options = new Array(row_count-1);

    for (var i = 1; i < row_count; i++) 
    {
      data_array[i] = <?=json_encode($piechart_data[$i])?>;   
      piechart_title[i] = <?=json_encode($piechart_title[$i])?>;

    };

      google.setOnLoadCallback(drawChart);
      function drawChart() {
        for (var i = 1; i <= row_count; i++) {
        data[i] = google.visualization.arrayToDataTable(data_array[i]);
        options[i] = {
                        title: piechart_title[i],
                        is3D: true,
                        backgroundColor: 'none',
                        chartArea:{left:20,top:20,width:'50%',height:'75%'}
                    };
        var div_id = "piechart" + i;
        var chart = new google.visualization.PieChart(document.getElementById(div_id));
        window.alert(div_id);
        chart.draw(data[i], options[i]);
      };
     }
   
  </script>

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Visitations', { role: 'style' } ],
      ['2010', 10, 'color: gray'],
      ['2010', 14, 'color: #76A7FA'],
      ['2020', 16, 'opacity: 0.2'],
      ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
      ['2040', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
    ]);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "Density of Precious Metals, in g/cm^3",
      width: 600,
      height: 400,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
      backgroundColor: 'none',
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
  }
</script>

-->

</head>

<body>
<div class="header"></div>
<div class="container">
<div class="navigator">
  <a href="chartcontrol.php">Chart Control</a>

</div>
<div class="mainbody">

<?php for ($j=1; $j <= $row_count; $j++) { ?>
  <div id="chartContainer<?php echo $j; ?>" style="height: 300px;width:480px;float: left"></div>
<?php }  ?>

 

</div>

</div>
</body>
</html>