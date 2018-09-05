<?php

function transposeData($data)
{
  $tranposedData = [];
    foreach ($data as $row => $columns) {
      foreach ($columns as $row2 => $column2) {
          $transposedData[$row2][$row] = $column2;
      }
    }
  print_r($transposedData);
}
$data = [
  ['1', '2','3','4','5'], 
  ['A', 'B', 'C', 'D', 'E'], 
];
$data = transposeData($data);

?>