<?php 
     require_once '../config.php';

     $xmlDoc = new DOMDocument();
     $xmlDoc->load("../files/books_extract.xml");
     $bkArray = $xmlDoc->getElementsByTagName("item");

     $fields = [ "book_id", "title", "author_name", "isbn", "book_description", "book_published", "average_rating", "book_small_image_url",
          "book_medium_image_url", "book_large_image_url" ];
          
     foreach($bkArray as $book)
     {
          $bkValues=array();
          foreach ($fields as $field) {
               $val =$book->getElementsByTagName($field)->item(0)->nodeValue;

               if(str_contains($val,"<![CDATA[")){
                    $val=substr($val, 9, -3);
               }
               $bkValues[$field]=$val;
          }

          $content=[ 
               "book_id" => $bkValues["book_id"] , "title" => $bkValues["title"] , "author_name" => $bkValues["author_name"] ,
               "isbn" => $bkValues["isbn"] , "book_description" => $bkValues["book_description"] , "book_published" => $bkValues["book_published"] ,
               "average_rating" => $bkValues["average_rating"] , "book_small_image_url" => $bkValues["book_small_image_url"] ,
               "book_medium_image_url" => $bkValues["book_medium_image_url"] , "book_large_image_url" => $bkValues["book_large_image_url"] ];

          // echo json_encode($content);

          try{
               $result = $db->books->insertOne($content); 
          }  
          catch(Exception $e){
               echo $e->message();
          } 
     }
?>