<?php
    require_once '../config.php';

    $book=new \stdClass();
    // find db entry of specific article corresponding to id passed through url($_GET['id'])
    if (isset($_GET['id'])) {
        $book = $db->books->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    // then textfields can be filled with the data
?>
<h3>Edit Book</h3>
<form method='POST' action='./books/edit.php'>
    <div class='form-group'>
        <!-- hidden textbox to contain uneditable id -->
        <input type='hidden' class='form-control' id='id-txt' name='id' value=<?php $book->_id ?> required  />
    </div>
    <div class='form-group'>
        <strong>Title:</strong>
        <input type='text' class='form-control' id='title-txt' name='title' value='<?php echo "$book->title"; ?>' required placeholder='Title' />
    </div>
    <div class='form-group'>
        <strong>Author:</strong>
        <input type='text' class='form-control' id='author-txt' name='author' value='<?php echo "$book->author_name"; ?>' required placeholder='Author' />
    </div>
    <div class='form-group'>
        <strong>Book Description:</strong>
        <textarea rows='16' class='form-control' id='description-txt' name='description' required placeholder='Add description here...' >'<?php echo "$book->book_description"; ?>'</textarea>
    </div>
    <div class='form-group'>
        <strong>ISBN:</strong>
        <input type='text' class='form-control' id='isbn-txt' name='isbn' value='<?php echo "$book->isbn"; ?>' placeholder='ISBN' />
    </div>
    <div class='form-group'>
        <strong>Year Published:</strong>
        <input type='text' class='form-control' id='published-txt' name='published' value='<?php echo "$book->book_published"; ?>' placeholder='Year Published' />
    </div>
    <div class='form-group'>
        <strong>Average Rating:</strong>
        <input type='text' class='form-control' id='rating-txt' name='rating' value='<?php echo "$book->average_rating"; ?>' placeholder='Average Rating' />
    </div>

    <div class='form-group' id='action-btn-section'>
        <button type='submit' name='submit' class='btn btn-success'>Edit</button>&nbsp&nbsp&nbsp
        <button type ='button' onClick='confirmDelete()' class='btn btn-danger' >Delete</button>&nbsp&nbsp&nbsp
        <a id='del-link' style='display:none'>DEL</a>
        <?php echo "<a type='button' href='./' class='btn btn-primary' > Back </a>"; ?>
    </div>
</form>
<br /><br />







