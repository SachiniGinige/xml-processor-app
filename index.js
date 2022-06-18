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
          "<h5>Search Results: </h5>" + this.responseText + "<br/><br/>";
      }
    };
    xmlHttpReq.open("GET", "./books/search.php" + "?" + params, true);
    xmlHttpReq.send();
  }
}

// function LoadRSSFeed() {
//   // <---------------------------load rss file---------------------------------------->
//   let xmlHttpReq1 = new XMLHttpRequest();

//   xmlHttpReq1.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       ProcessRSSFeed(this.responseXML);
//     }
//   };
//   xmlHttpReq1.open("GET", "./files/books_extract.rss", true);
//   xmlHttpReq1.send();
// }

// async function ProcessRSSFeed(xmlDocument) {
//   // <-------------------extract data and add to json format----------------------------->
//   const bookArr = xmlDocument.getElementsByTagName("item");
//   console.log("bookCount: ", bookArr.length); //

//   const fields = [
//     "book_id",
//     "title",
//     "author_name",
//     "isbn",
//     "book_description",
//     "book_published",
//     "average_rating",
//     "book_small_image_url",
//     "book_medium_image_url",
//     "book_large_image_url",
//   ];
//   const params = []; //

//   for (let bkIndex = 0; bkIndex < bookArr.length; bkIndex++) {
//     const bkData = {};

//     for (let fieldIndex = 0; fieldIndex < fields.length; fieldIndex++) {
//       let val = JSON.stringify(
//         bookArr[bkIndex].getElementsByTagName(fields[fieldIndex])[0].innerHTML
//       );
//       if (val.includes("<![CDATA[")) {
//         val = val.split("<![CDATA[")[1];
//         val = val.split("]]>")[0];
//         val = JSON.stringify(val);
//       }
//       bkData[fields[fieldIndex]] = JSON.parse(val);
//     }
//     params.push(bkData); //

//     // <---------------------------add to db---------------------------------->
//     let xmlHttpReq2 = new XMLHttpRequest();

//     // xmlHttpReq2.onreadystatechange = function () {
//     //   if (this.readyState == 4 && this.status == 200) {
//     //     // await let res=(this.responseText);
//     //   }
//     // };

//     xmlHttpReq2.open(
//       "GET",
//       "./books/add_multiple1.php" + "?params=" + JSON.stringify(bkData),
//       true
//     );
//     xmlHttpReq2.setRequestHeader(
//       "Content-type",
//       "application/json; charset=UTF-8"
//     );
//     xmlHttpReq2.send();
//   }
//   // console.log(params, "params=" + JSON.stringify(params)); //

//   // // add to db
//   // let xmlHttpReq2 = new XMLHttpRequest();

//   // xmlHttpReq2.open(
//   //   "GET",
//   //   "./books/z_add_multiple1.php" + "?params=" + JSON.stringify(params),
//   //   true
//   // );
//   // xmlHttpReq2.setRequestHeader(
//   //   "Content-type",
//   //   "application/json; charset=UTF-8"
//   // );
//   // xmlHttpReq2.send();
// }
