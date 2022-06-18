<?php
    require_once '../config.php';

    //delete from db
    $db->books->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    // delete from xml file
    $articles = simplexml_load_file('../files/books.xml');

	$index = 0; //index of article to be deleted
	$i = 0; //iterator

	foreach($articles->article as $article){
		if($article->_id == $_GET['id']){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($articles->article[$index]);
	file_put_contents('../files/books.xml', $articles->asXML());
  
    header("location: ../.");
?>