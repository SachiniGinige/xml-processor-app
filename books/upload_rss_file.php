<?php
  $target_dir = "../files/";
  $target_file = $target_dir . basename($_FILES["my_upload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
  if($imageFileType != "rss" && $imageFileType != "xml" ){
    echo "Sorry, only RSS & XML files are allowed.";
    $uploadOk = 0;
  }
  echo $_FILES["my_upload"]["tmp_name"];

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["my_upload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["my_upload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  rename($target_file,$target_dir."/books_extract.xml");

  require './add_multiple.php';

  header('Location: ../.');
?>

