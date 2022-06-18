<?php
    require_once '../config.php';

    $searchResults=array();
    $searchResultsObj=array();
    $finalResult='';

    if(isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];
        
        $books=$db->books->find([]);
        foreach($books as $book) {
            if(str_contains(strtolower($book->title),strtolower($keyword))){
                array_push($searchResults,$book->title);
                array_push($searchResultsObj,$book);
            }
        }

        foreach($searchResults as $res){
            if($finalResult==''){
                $finalResult = $res;
            } else{
                $finalResult = $finalResult.', '.$res;
            }
        }
        if($finalResult===''){
            $finalResult="<i>None found</i>";
        }
    }

    echo $finalResult;
    // echo "console.log(JSON.stringify($searchResultsObj))";
    // return $searchResultsObj;
?>