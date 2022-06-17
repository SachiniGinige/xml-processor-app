<?php
    require_once './config.php';

    $books=$db->books->find([]);
            
    $count=0;
    foreach($books as $book) {
        $count++;
    };   

    $books=$db->books->find([]);
    $rowItemCount=4;
    $index=0;
    foreach($books as $book) {
        // $bookInJSON=json_encode($book->getArrayCopy()); //convert BSON document to JSON
        if($index%$rowItemCount===0){
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<h5>", explode('(',$book->title)[0], "</h3>";
        echo "<h6>By ", $book->author_name, "</h6>";
        echo "<div class='row'><div class='col-3'></div><div class='col-6'>";
        echo "<img class='img-center' src='", $book->book_medium_image_url, "'></img>";
        echo "</div><div class='col'><img class='img-center' src='./images/star.png' height='25px'></img>",$book->average_rating,"</div></div>";
        echo "<p style='text-align:justify'> ", substr(strip_tags($book->book_description),0,260),"... &nbsp&nbsp";
        // echo "<button class='button-link' onclick=''>More</button>";
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