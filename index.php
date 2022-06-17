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
    <!------------------------------------ Navbar ---------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./">
        <img src="./images/book-shelf.png" width="80" height="80"  alt="" style="margin:-2vh 0;">
        <span style="font-weight:bold">Book Nook</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./">View All <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick='loadViewFile("./views/create_view.php")'>Add Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick='UpdateXMLFile()'>Export to XML</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              See More
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" onclick='loadViewFile("./views/create_view.php")'>Add Books</a>
              <a class="dropdown-item" onclick='UpdateXMLFile()'>Export to XML</a>
              <div class="dropdown-divider"></div>
            </div>
          </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
    <!------------------------------------------------------------------------------------------------->

    <div class='container'>
      <br/><br/>
      <div id='display-section' class='container'>       
        <?php require './views/homepage_view.php' ?>       
      </div>
    </div>
    
    <script src='./index.js'></script>
  </body>
</html>
