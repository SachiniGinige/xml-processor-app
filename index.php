
<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Nook</title>
    <link
      rel='stylesheet'
      href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css'
      integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'
      crossorigin='anonymous'
    />
    <!-- <link rel='stylesheet' href='./index.css'/> -->
  </head>
  <body>
    <div class='container'>
      <br />
      <!-- <h1 style='text-align: center'>A Booklover's Dream</h1> -->
      <br /><br />

      <div id='display-section' class='container'>

        <?php require './config.php'; ?>

        <button onclick='loadDoc()'>Process RSS</button>
        
      </div>
    </div>
    
    <script src='./index.js'></script>
  </body>
</html>
