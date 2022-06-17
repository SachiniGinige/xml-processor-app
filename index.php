<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="./images/book-shelf.ico" type="image/icon type">
    <title>Book Nook</title>
    <link
      rel='stylesheet'
      href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css'
      integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'
      crossorigin='anonymous'
    />
    <link rel='stylesheet' href='./index.css'/>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="./images/book-shelf.png" width="80" height="80"  alt="" style="margin:-2vh 0;">
        <span style="font-weight:bold">Book Nook</span>
      </a>
    </nav>

    <div class='container'>
      <br />
      <br /><br />

      <div id='display-section' class='container'>       
        <?php require './views/homepage_view.php' ?>       
      </div>

      <div id="test"></div>

      <form method="POST" action="./books/upload_rss_file.php" enctype="multipart/form-data">
        <input type="file" id="my_upload" name="my_upload" accept=".xml, .rss"></input>
        <button type="submit" name="submit">Submit</button>
      </form>

      <button onclick='LoadRSSFeed()'>Process RSS</button>
      <button onclick='UpdateXMLFile()'>Update XML Export</button>

    </div>
    
    <script src='./index.js'></script>
  </body>
</html>
