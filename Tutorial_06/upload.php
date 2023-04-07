<?php
session_start();
$folderError = "";
$errorFile = "";
$errorFolder = "";
$successMessage = "";
if (isset($_POST['submit-btn'])) {

  $folderName = $_POST['folder_name'];
  $uploadDir = __DIR__.'/images/';
  $fileName = $_FILES['file_name']['name'];
  $fileTempName = $_FILES['file_name']['tmp_name'];
  $fileDest = $uploadDir . $fileName;
  $file_size = $_FILES['file_name']['size'];
  $max_file_size = 2000;

  $_SESSION['old_folder_name'] = $folderName;

  if ($fileName == "" && $folderName == "") {
    $errorFile = '<p class="cmn-error"> File Name Field is Required</p>';
    $errorFolder = '<p class="cmn-error"> Folder Name Field is Required</p>';
  }
  elseif ($fileName == "") {
    $oldFolderName = $_SESSION['old_folder_name'];
    $errorFile = '<p class="cmn-error"> File Name Field is Required</p>';
  }
  elseif ($ext !== "jpg" || $ext !== "png" || $ext !== "jpeg") {
    $oldFolderName = $_SESSION['old_folder_name'];
    $errorFile = '<p class="cmn-error"> Only jpg,png,jpeg types are allowed</p>';
  } 
  elseif ($folderName == "") {
    $errorFolder = '<p class="cmn-error"> Folder Name Field is Required</p>';
  } 
  elseif($file_size > $max_file_size) {
      echo "Error: File size is too large.";
      exit;
    }
  else {
    if (!file_exists('images/' . $folderName)) {
      
        mkdir("images/" . $folderName);
        $source_dir = __DIR__.'/images/' . $folderName;
        $file_path = $source_dir .'/'. $fileName;
        move_uploaded_file($fileTempName, $file_path);
        echo "Image uploaded successfully. <br>";
        //echo $fileName . "<br>";
        //echo "http://localhost/Tutorial_06/images ". $folderName . "/" . $fileName;
    } else {
      $folderError = '<p class="error"> Folder name ' . $folderName . ' is already exist. </p>';
    }
  
  }
  header('Location: index.php');
}
?>