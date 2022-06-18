function loadViewFile(filepath) {
  const xmlHttpReq = new XMLHttpRequest();
  xmlHttpReq.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display-section").innerHTML = this.responseText;
    }
  };
  xmlHttpReq.open("POST", filepath, true);
  xmlHttpReq.send();
}

function loadEditView(id) {
  const xmlHttpReq = new XMLHttpRequest();
  // const params = JSON.parse(JSON.stringify({ article: article }));
  const params = "id=" + id; // params = "fname=" + fname + "&lname" + lname;

  xmlHttpReq.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display-section").innerHTML = this.responseText;
      if (id) {
        document.getElementById("id-txt").value = id;
        document.getElementById("del-link").href =
          "./books/delete.php?id=" + id;
      }
    }
  };
  xmlHttpReq.open("GET", "./views/edit_view.php" + "?" + params, true);
  // xmlHttpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xmlHttpReq.send(params);
}

// //Extract data from RSS Feed saved in files and add to database
function ProcessRSS() {
  let xmlHttpReq1 = new XMLHttpRequest();

  xmlHttpReq1.open("GET", "./books/add_multiple.php", true);
  xmlHttpReq1.send();
}

function UpdateXMLFile() {
  // <-----------------------update xml extract file--------------------->
  let xmlHttpReq3 = new XMLHttpRequest();

  xmlHttpReq3.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xmlHttpReq3.open("GET", "./books/create_xml.php", true);
  xmlHttpReq3.send();
}

function confirmDelete() {
  const confirmation = window.confirm(
    "Are you sure you want to delete " +
      document.getElementById("title-txt").value +
      "?"
  );

  if (confirmation === true) {
    document.getElementById("del-link").click();
  }
}

function search(keyword) {
  // const keyword = document.getElementById("search-txt").value;
  console.log("search triggered. Keyword: " + keyword); //
  const params = "keyword=" + keyword;
  if (keyword.length > 0) {
    const xmlHttpReq = new XMLHttpRequest();
    xmlHttpReq.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-results").innerHTML =
          "<h5><i>Search Results: </i></h5>" + this.responseText + "<br/><br/>";
      }
    };
    xmlHttpReq.open("GET", "./books/search.php" + "?" + params, true);
    xmlHttpReq.send();
  } else {
    document.getElementById("search-results").innerHTML = "";
  }
}
