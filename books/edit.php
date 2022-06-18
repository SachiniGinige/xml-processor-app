<?php
   require_once '../config.php';

   // Edit button clicked
   if(isset($_POST['submit'])){
      // update db
      $db->books->updateOne(
         ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])],
         ['$set' => ['title' => $_POST['title'], 'author_name' => $_POST['author'],'isbn' => $_POST['isbn'],
            'book_description' => $_POST['description'], 'book_published' => $_POST['published'], 'average_rating' => $_POST['rating'],
            // 'book_small_image_url' => $_POST['small_image_url'], 'book_medium_image_url' => $_POST['medium_image_url'], 
            // 'book_large_image_url' => $_POST['large_image_url'] 
         ]]
      );

      // update xml file
      $books = simplexml_load_file('../files/books.xml');
      foreach($books->book as $book){
         if($book->_id == $_POST['id']){
            $book->title = $_POST['title'];
            $book->author_name = $_POST['author'];
            $book->isbn = $_POST['isbn'];
            $book->book_description = $_POST['description'];
            $book->book_published = $_POST['published'];
            $book->average_rating = $_POST['rating'];
            // $book->book_small_image_url = $_POST['small_image_url'];
            // $book->book_medium_image_url = $_POST['medium_image_url'];
            // $book->book_large_image_url = $_POST['large_image_url'];
            break;
         }
      }
      file_put_contents('../files/books.xml', $books->asXML());

      header("Location: ../.");
   }
?>


