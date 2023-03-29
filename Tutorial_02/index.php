<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <div>
  <h2>Diamond Pattern</h2>
<?php
function makeDiamondShape()
{
    $limit = 6;
    $space = $limit;
    for ($i = 1; $i <= $limit; $i++) 
    {
        for ($j = 1; $j <= $space; $j++) {
            echo "&nbsp; ";
        }
        $space--;
 
        for ($j = 1; $j <= 2 * $i - 1; $j++) {
            echo "*";
        }
 
        echo "<br>";
    }
    $space = 2;
 
    for ($i = 1; $i <= $limit; $i++) {
        for ($j = 1; $j <= $space; $j++) {
            echo "&nbsp; ";
        }
        $space++;
 
        for ($j = 1; $j <= 2 * ($limit - $i) - 1; $j++) {
            echo "*";
        }
 
        echo "<br>";
    }
}
    print(makeDiamondShape());   
?>
</div>
</html>