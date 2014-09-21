<?php
namespace Hasantayyar\Visualization;

class GoogleVisualization {

        private $chartType;
        private $data;

        /**
        * @param $chartType string
        * @param $data array|string
        */
        public function __construct($chartType,$data){
                $this->chartType = $chartType;
                $this->data = (is_array($data)) ? $this->dataToJson($data) : $data;
        }
        public function getScript($div, $options = array()){
                $output = '';
                // set callback function
                $output .= 'google.setOnLoadCallback( ';
                $output .= '    function(){';
                $output .= '    var data = new google.visualization.DataTable(' . $this->data . ');';
                $output .= '    var options = ' . json_encode($options) . ';';
                $output .= '    var chart = new google.visualization.' . $this->chartType . '(document.getElementById(\'' . $div . '\'));';
                $output .= '    chart.draw(data, options);';
                $output .= '});' . "\n";
                return $output;
        }

     private function getColumns($data){
          $cols = array();
          foreach($data[0] as $key => $value){
              $cols[] = array('id' => '', 'label' => $value, 'type' => 'string');
          }
          return $cols;
      }

      private function dataToJson($data){
            $cols = $this->getColumns($data);
            $rows = array();
            foreach($data as $key => $row){
                  if($key != 0){
                      $c = array();
                      foreach($row as $v){
                              $c[] = array('v' => $v);
                      }
                      $rows[] = array('c' => $c);
                  }
            }
            return json_encode(array('cols' => $cols, 'rows' => $rows));
        }

}
