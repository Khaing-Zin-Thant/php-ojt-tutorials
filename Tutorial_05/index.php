<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="inner">
    <div class="text">
      <h2>Text File</h2>
    <?php
    $myfile = fopen("files/sample.txt", "r") or die("Unable to open file!");
    echo '<pre>' .fread($myfile,filesize("files/sample.txt")). '</pre>';
    fclose($myfile);
    ?>
    </div>
    <div class="doc">
    <h2>Document File</h2>
  <?php 
    $filename = 'files/sample.doc';
    function readdocx($filename) {
      if(file_exists($filename))
     {
         if(($fh = fopen($filename, 'r')) !== false ) 
         {
            $headers = fread($fh, 0xA00);
    
            // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
            $n1 = ( ord($headers[0x21C]) - 1 );
    
            // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
            $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
    
            // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
            $n3 = ( ( ord($headers[0x21E]) *  256 ) * 256 );
    
            // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
            $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
    
            // Total length of text in the document
            $textLength = ($n1 + $n2 + $n3 + $n4);
    
            $extracted_plaintext = fread($fh, $textLength);
    
            // simple print character stream without new lines
            //echo $extracted_plaintext;
    
            // if you want to see your paragraphs in a new line, do this
            return nl2br($extracted_plaintext);
            // need more spacing after each paragraph use another nl2br
         }
     }   
     }
     echo '<pre>' .readdocx($filename). '</pre>';
  ?>
  </div>
  <div class="excel">
  <h2>Excel File</h2>
  <?php
  require 'libs/vendor/autoload.php';
  $file = 'files/sample.xlsx';
  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
  $spreedsheet = $reader->load($file);
  $worksheet = $spreedsheet->getActiveSheet()->protectCells('A1',false);
  ?>
  <table>
    <?php
    echo "<table>";
    foreach ($worksheet->getRowIterator() as $row) {
        // Get the cell iterator for the row
        echo "<tr>";
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        
        // Loop through each cell in the row
        foreach ($cellIterator as $cell) {
            echo "<td>";
            $value = $cell->getValue();
            echo $value . ' ';
            echo "</td>";
        }
        echo "</tr>";
        echo "\n";
    }
    echo "</table>";
    ?>
</table>
</div>
<div class="csv">
<h2>CSV File</h2>
<table class="table">
<?php
    $start_row = 1;
    if (($csv_file = fopen("files\sample.csv", "r")) !== FALSE) {
      while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
                    $column_count = count($read_data);
                    $start_row++;
                    echo '<tr>';
                    for ($c = 0; $c < $column_count; $c++) {
                        echo "<td>" . $read_data[$c] . "</td>";
                    }
                    echo '</tr>';
                }
                fclose($csv_file);
            }
?>
</table>
</div>
</div>
  </body>
</html>