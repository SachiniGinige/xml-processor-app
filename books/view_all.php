<?php
    require_once './config.php';
    $books=$db->books->find([]);

    // if(isset($_GET['keyword'])){
    //     $keyword=$_GET['keyword'];
    //     $searchResultsObj=array();
               
    //     foreach($books as $book) {
    //         if(str_contains(strtolower($book->title),strtolower($keyword))){
    //             array_push($searchResultsObj,$book);
    //         }
    //     }
    //     $books=$searchResultsObj;
    // }
            
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
        echo "<h5>", explode('(',$book->title)[0], "</h5>\n";
        echo "<h6>By ", $book->author_name, "</h6>\n";
        echo "<div class='row'><div class='col-3'></div>\n";
        echo "<div class='col-6'><img src='", $book->book_medium_image_url, "'></div>";
        echo "<div class='col'><img src='./images/star.png' height='25px'>",$book->average_rating,"</div></div>\n";
        echo "<p style='text-align:justify'>", substr(strip_tags("$book->book_description"),0,260),"... &nbsp&nbsp";
        // echo "<button class='button-link' onclick=''>More</button>";
        echo "<button class='button-link' onclick=\"loadEditView('".$book->_id."')\">More</button>"; //$book->_id
        echo "</p>\n";
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