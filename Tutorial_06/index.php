<!DOCTYPE html>
<html>
  <head>
    <title>tutorial_06</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
 <?php 
 include 'upload.php';
 ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <h2>Upload Image</h2>
      <label>Folder Name</label><br>
      <input type="text" name="folder_name" placeholder="Enter Folder Name" require><br>
      <label>Choose Image</label><br>
      <input type="file" name="file_name" class="choosefile-box" require><br>
      <input type="submit" name="submit-btn" value="Upload" class="upload">
    </form>  
    <section class="img-display">
      <?php
        $dir_name = "images/";
        $images = glob($dir_name . "*");
      ?>
      <table>
        <?php
          foreach($images as $image){
            $folder_name = $image . '/';
            $photos = glob($folder_name . "*");
            foreach ($photos as $photo) {
              echo "<tr>";
              echo "<td>";
              echo '<img class="images" src="' . $photo . '" alt="">';
              echo "</td>";                 
              echo "</tr>";
            }
          }
          ?>
          
      </table>
      <?php

      echo "<p>localhost/Tutorial06/".$photo."</p>";
      ?>
      <input type="submit" name="delete" value="Delete" class="delete">
      <?php
      if(isset($_POST['delete'])) {
        $filePath=$_POST['$photos'];
        unlink($filePath);
      }
      ?>
    </section>
    <?php

    ?>
  </body>
</html>