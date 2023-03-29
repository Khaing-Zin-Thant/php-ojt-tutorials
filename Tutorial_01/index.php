<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <h2>Chessboard</h2>
  <table class="table">
  <?php
    function drawChessBorad($rows, $cols)
    {
       for($rows=1;$rows<=8;$rows++)
        {
          echo '<tr>';
          for($cols=1;$cols<=8;$cols++)
          {
            $total=$rows+$cols;
            if($total%2==0)
            {
              echo '<td class="td-even"></td>';
            }
            else
            {
              echo '<td class="td-odd"></td>';
            }
          }
          echo '</tr>';
        }
    } 
    print(drawChessBorad($rows,$cols));

  echo '</table>';
  ?>
</html>