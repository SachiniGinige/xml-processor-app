<?php
	$url ='../files/books.xml';	
	// //return the base name of file
	$filename = 'C:/Users/Sachini Ginige/Downloads/Books.xml';//basename($url);
	
	// //file_get_contents() to get the file from url
	// //file_put_contents() to save the file by using base name
	if (file_put_contents($filename, file_get_contents($url))) {
		echo "File downloaded successfully";
	} else {
		echo "File downloading failed.";
	}

    // header("Content-Type: application/octet-stream");
    // header("Content-Transfer-Encoding: Binary");
    // header("Content-disposition: attachment; filename='".$filename."'"); 

    // readfile($url);
?>
