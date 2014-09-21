<?php

include __DIR__.'/vendor/autoload.php';

$data = array(
        'cols' => array(
                array('id' => '', 'label' => 'Year', 'type' => 'string'),
                array('id' => '', 'label' => 'New User', 'type' => 'number'),
                array('id' => '', 'label' => 'Active User', 'type' => 'number')
        ),
        'rows' => array(
                array('c' => array(array('v' => '2011'), array('v' => 200), array('v' => 100))),
                array('c' => array(array('v' => '2012'), array('v' => 300), array('v' => 50))),
                array('c' => array(array('v' => '2013'), array('v' => 500), array('v' => 200))),
                array('c' => array(array('v' => '2014'), array('v' => 800), array('v' => 600)))
        )
);
$chart = new \Hasantayyar\Charts\GoogleCharts('LineChart', json_encode($data));
$options = array('title' => 'chart1', 'theme' => 'maximized', 'width' => 500, 'height' => 200);
$chartHtml = $chart->getSCript('chart1', $options);


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
