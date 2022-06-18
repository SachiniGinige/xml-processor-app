<!-- searchbar -->
<!-- <div class="container"style='margin:-20px 0 40px 0'> -->
        <!-- <div class="row">
                <div class='col-7'></div>
                <div class='col-1' style='padding-top:5px'><strong >Search</strong>&nbsp&nbsp</div>                       
                <div class='col'>
                        <input type='text' class='form-control' id='search-txt' name='search' placeholder='Search by article name...'                        
                        style='width:100%; float:right' value ='' onkeyup='search(this.value)' />
                </div>
        </div> -->
        <div class="row">
                <div class='col-4'></div>                      
                <div class='col' id='search-results' style='color:gray'></div>
        </div>   
<!-- </div> -->

<!-- display all books -->

<?php 
        require_once './config.php';
        require "./books/view_all.php" 
?>

