<?php

include __DIR__.'/vendor/autoload.php';



$data = array(
        array('mushrooms', 'slices'),
        array('New Visitor', 5896),
        array('Returning Visitor', 2356)
);
$chart = new \Hasantayyar\Charts\GoogleCharts('PieChart', $data);

$options = array('title' => 'chart2', 'is3D' => true, 'width' => 500, 'height' => 400);
$chartHtml =  $chart->getScript('chart2', $options);
?>

<html><head></head><body>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">google.load('visualization', '1.0', {'packages':['corechart']});</script>
  <div id="chart1"></div>
  <div id="chart2"></div>
  <script type="text/javascript">
  <?php
  echo $chartHtml;
  ?>
  </script>
</body>
</html>
