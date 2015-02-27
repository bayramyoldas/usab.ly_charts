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
*/

  $id = 1;
  try {
    $conn = new PDO (DSN, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare('SELECT * FROM piechart');
   // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $row_count = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $row_count++;
      $piechart_data = array();
      $element_name = explode(", ", $row['element_name']);
      $element_value = explode(", ", $row['element_value']);
      $piechart_title = $row['chart_title'];

      for ($i=0; $i < count($element_value) ; $i++) 
      { 
          $piechart_data[$row_count][0][0] = $row['element_title'];
          $piechart_data[$row_count][0][1] = $row['value_title'];
          $piechart_data[$row_count][$i][0] = $element_name[$i];
          $piechart_data[$row_count][$i][1] = floatval($element_value[$i]);
       }
     
?>
  <script type="text/javascript">      
    var data_array = <?=json_encode($piechart_data[$row_count])?>;
    var row_count = <?=json_encode($row_count)?>;
    var piechart_title = <?=json_encode($piechart_title)?>;
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(data_array);
      var options = {
                      title: piechart_title,
                      //is3D: true
                      backgroundColor: 'none',
                      chartArea:{left:20,top:20,width:'50%',height:'75%'}
                  };
      var div_id = "piechart" + row_count;
      var chart = new google.visualization.PieChart(document.getElementById(div_id));
      window.alert(div_id);
      chart.draw(data, options);
    }
  </script>
<?php   
    }

  } catch (PDOException $e) 
    {
      echo 'ERROR: ' . $e->getMessage();
    }

?>



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
</head>

<body>
<div class="header">HEADER</div>
<div class="container">
<div class="mainbody">
       
<?php for ($i=1; $i <=$row_count ; $i++) { ?>
  <div id="piechart<?php echo $i; ?>" style=""></div>
<?php }  ?>

<div id="columnchart_values" style=" "></div>

</div>

</div>
</body>
</html>