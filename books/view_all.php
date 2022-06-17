<?php
    require_once './config.php';

    // $books = $db->articles;
    $books=$db->books->find([]);
            
    // ------- get count ---------------------
    // since  count($books) does not work
    $count=0;
    foreach($books as $book) {
        $count++;
    };   

    $books=$db->books->find([]);
    $rowItemCount=4;
    $index=0;
    foreach($books as $book) {
        $bookInJSON=json_encode($book->getArrayCopy()); //convert BSON document to JSON
        if($index%$rowItemCount===0){
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<h5>", $book->title, "</h3>";
        echo "<h6>By ", $book->author_name, "</h6>";
        echo "<img src='", $book->book_medium_image_url, "'></img>";
        echo "<p style='text-align:justify'> ", substr(strip_tags(strip_tags($book->book_description)),0,260),"... &nbsp&nbsp";
        echo "<button class='button-link' onclick=''>More</button>";
        // echo "<button class='button-link' onclick='loadEditView(\"./views/edit_view.php\",$bookInJSON)'>More</button>";
        echo "</p>";
        echo "</div>";

        if($index%$rowItemCount===($rowItemCount-1)){
            echo "</div>";
        } elseif($index===$count-1){
            for($x=($count%$rowItemCount); $x<$rowItemCount; $x++ ){
                echo "<div class='col'>";
                echo "</div>";
            }
            echo "</div>";
        }
        $index++;
    };
?>