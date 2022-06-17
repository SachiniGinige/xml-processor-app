<?php
    // <------ Creates XML document according to data in database ------->

	session_start();
	require_once '../config.php';

    $data = array(); //create array to hold db data
    $data=$db->books->find([]);

    try{
        //converting our array into xml file
        //create the xml document
        $xml = new DOMDocument();
        $root = $xml->createElement('books');

        foreach($data as $element){
                $elementRow = $root->appendChild($xml->createElement('book'));

                // <------populate collection childnodes (attributes) ----->
                foreach($element as $key => $val){
                    $elementRow->appendChild($xml->createElement($key, $val));
                }    
        }

        $xml->appendChild($root);
        header("Content-Type: text/plain");
        //make the output pretty
        $xml->formatOutput = true;
        //save xml file
        $xml->save('../files/books.xml');
        
    }catch(Exception $e){
        echo "\r\n","Exception:", $e->getMessage(), "\n";
    }

    require './download_xml.php';

    header('location: ../index.php');
?>