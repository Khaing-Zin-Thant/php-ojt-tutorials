<?php

function arrayDiff($arr1, $arr2)
{
    $output=array();
    $a=0;
    $b=0;
    foreach ($arr1 as $value) {
        if (!in_array($value, $arr2)) {
            $output[$a] = $value;
            $a++;
        }
    }
    foreach ($arr2 as $value1) {
        if (!in_array($value1, $arr1)) {
            $output[$a] = $value1;
            $b++;
        }
    }
    var_dump($output);
}
?>

<!DOCTYPE html>
<html>
  <head>
      <title></title>
  </head>
  <body>
  <?php
  echo arrayDiff([1, 2, 3], [1, 2]);
  ?>
  </body>
</html>