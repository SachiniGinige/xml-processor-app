function loadDoc() {
  let xhttp = new XMLHttpRequest();
  let xmlDoc;

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      xmlDoc = this.responseXML; //works the same as parsing (this.responseText) to XML
      // document.getElementById("demo").innerHTML = displayXML(xmlDoc);
      ProcessFeed(xmlDoc);
    }
  };
  xhttp.open("GET", "./files/books_extract.rss", true);
  xhttp.send();
}

function ProcessFeed(xmlDocument) {
  const bookArr = xmlDocument.getElementsByTagName("item");
  console.log("bookCount: ", bookArr.length); //

  const fields = [
    "book_id",
    "title",
    "author_name",
    "isbn",
    "book_description",
    "book_published",
    "average_rating",
    "book_small_image_url",
    "book_medium_image_url",
    "book_large_image_url",
  ];
  const paramsData = [];

  for (let bkIndex = 0; bkIndex < bookArr.length; bkIndex++) {
    const bkData = {};

    for (let fieldIndex = 0; fieldIndex < fields.length; fieldIndex++) {
      let val = JSON.stringify(
        bookArr[bkIndex].getElementsByTagName(fields[fieldIndex])[0].innerHTML
      );
      if (val.includes("<![CDATA[")) {
        val = val.split("<![CDATA[")[1];
        val = val.split("]]>")[0];
        val = JSON.stringify(val);
      }
      bkData[fields[fieldIndex]] = JSON.parse(val);
    }
    paramsData.push(bkData);
  }
  console.log(paramsData); //
}
