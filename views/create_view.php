<h3>Add Books</h3><br/>
<h6>Upload RSS/ XML file</h6><br/>

<form method="POST" action="./books/upload_rss_file.php" enctype="multipart/form-data">
    <input type="file" id="my_upload" name="my_upload" accept=".xml, .rss"></input>
    <button type="submit" name="submit" class='btn btn-success'>Upload</button>
</form>

    

<!-- <form method='POST' action='./books/create.php'>
    <div class='form-group'>
        <strong>Title:</strong>
        <input type='text' class='form-control' id='title-txt' name='title' required placeholder='Title' />
    </div>
    <div class='form-group'>
        <strong>Author:</strong>
        <input type='text' class='form-control' id='author-txt' name='author' required placeholder='Author' />
    </div>
    <div class='form-group'>
        <strong>Article Body:</strong>
        <textarea rows='16' class='form-control' id='content-txt' name='content' required placeholder='Add text here...' ></textarea>
    </div>
    <div class='form-group' id='action-btn-section'>
        <button type='submit' name='submit' class='btn btn-success'> Add Article </button>
        &nbsp&nbsp&nbsp
        < ?php echo "<button type='button' onclick='loadViewFile(\"./homepage_view.php\")' class='btn btn-primary' > Back </button>" ?>
    </div>
</form> -->
<br/><br/>