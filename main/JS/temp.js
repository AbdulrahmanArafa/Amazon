/*** old style **/
// var checked;
// var c=document.getElementsByClassName("list");

// document.getElementsByClassName("list").addEventListener("click",function(e) {
//     console.log("Product");

//   });

// Get all the desired elements into a node list
let elements = document.querySelectorAll(".listCon");

// Convert the node list into an Array so we can
// safely use Array methods with it
let elementsArray = Array.prototype.slice.call(elements);
let elementsArray2 = document.getElementsByClassName("listCon");
let elementsArray3 = document.getElementsByClassName("icon");
let elementsArray4 = document.getElementsByClassName("page");

elementsArray2[0].style.cssText =
  " color: var(--frontC); background: var(--DarkMode); border-right: 3px solid var(--logoColor);";
elementsArray3[0].style.cssText = " color: var(--logoColor);";
elementsArray4[0].style.cssText = "display: block;";

// Loop over the array of elements
elementsArray.forEach(function (elem) {
  // Assign an event handler
  elem.addEventListener("click", function () {
    elem.firstElementChild.checked = true;

    for (var i = 0; i < elementsArray2.length; i++) {
      x = elementsArray2[i].firstElementChild.checked;
      if (x) {
        elementsArray2[i].style.cssText =
          " color: var(--frontC); background: var(--DarkMode); border-right: 3px solid var(--logoColor);";
        elementsArray3[i].style.cssText = " color: var(--logoColor);";
        elementsArray4[i].style.cssText = "display: block;";
      } else {
        elementsArray2[i].style.cssText = "";
        elementsArray3[i].style.cssText = "";
        elementsArray4[i].style.cssText = "display: none;";
      }
    }

    // elem.firstElementChild().checked=true;
  });
});

//  show Preview image
function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
    var up = document.getElementById("submit");
    up.style.display = "block";
  }
}

var textarea = document.querySelector("textarea");

textarea.addEventListener("keydown", autosize);

function autosize() {
  var el = this;
  setTimeout(function () {
    el.style.cssText = "height:auto; padding:0";
    el.style.cssText = "height:" + el.scrollHeight + "px";
  }, 0);
}

/**coustomes your list */






////////////////////////////// optional

function addoptional() {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText != 1) {
        let array = this.responseText.split("\n");
        // remove  all elements  to accept new requests
        const list = document.getElementById("category");
        while (list.hasChildNodes()) {
          list.removeChild(list.firstChild);
        }
        array.forEach((element) => {
          let div = document.createElement("option");
          div.className = "op";
          div.innerHTML = element;
          div.setAttribute("value", element);
          document.getElementById("category").appendChild(div);
        });
      } else {
        console.log("this.responseText");
      }
    }
  };
  data.open("POST", "./../PHP server/optional.php", true);
  data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var cat = document.getElementById("lis").value;
  data.send("category=" + cat);
}
