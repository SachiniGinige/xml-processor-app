<!-- searchbar -->
<!-- <div class="container"style='margin:-20px 0 40px 0'>
        <div class="row">
                <div class='col-7'></div>
                <div class='col-1' style='padding-top:5px'><strong >Search</strong>&nbsp&nbsp</div>                       
                <div class='col'>
                        <input type='text' class='form-control' id='search-txt' name='search' placeholder='Search by article name...'                        
                        style='width:100%; float:right' value ='' onkeyup='search(this.value)' />
                </div>
        </div>
        <div class="row">
                <div class='col-8'></div>                      
                <div class='col' id='search-results'></div>
        </div>   
</div> -->

<!-- display all books -->
<?php require "./books/view_all.php" ?>

<br /><br />
<!-- < ?php echo "<button type='button' onclick=  'loadViewFile(\"./views/create_view.php\")'  class='btn btn-success'>Add Article</button>"; ?>
&nbsp &nbsp &nbsp -->
<button class='btn btn-info' onclick='UpdateXMLFile()'>Export to XML</button>
<br /><br />

