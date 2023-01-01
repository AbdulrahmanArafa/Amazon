//this use cookies and change the page depending on it
getsession();

function getsession() {
  var rmx = document.getElementById("remove");

  cname = "coustomer";
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      var cost = document.getElementsByClassName("cost");
      co = cost.length;

      for (var j = 0; j < co; j++) {
        cost[j].style.display = "none";
      }
      for (var j = 0; j <= 10; j++) {
        rmx.removeChild(rmx.lastChild);
      }
    }
  }
  return "";
}

/*product name*/
//Go Back

/*** add prodect   load more */

function loadData(dataset) {
  let template = document.getElementById("template");
  dataset.forEach(function (item) {
    // create a new element with the contents of the template
    var url = item.img_url;
    let div = document.createElement("div");
    div.className = "item";
    div.innerHTML = template.innerHTML.replace("{{title}}", item.name);

    document.getElementById("items").appendChild(div);

    let im = document.createElement("img");
    im.className = "im";
    im.setAttribute("src", "./../imges/uploads/" + url);
    im.setAttribute("height", "150px");
    im.setAttribute("width", "200px");

    let dis = document.createElement("div");
    im.className = "dis";
    dis.innerHTML = "loarear text";

    let pr = document.createElement("div");
    pr.className = "pr";
    p = "price:" + item.price;
    pr.innerHTML = p;

    let qu = document.createElement("input");
    qu.type = "number";
    qu.value = 1;
    qu.className = "qu";

    let buy = document.createElement("button");
    buy.className = "btrBuy";
    buy.innerHTML = "buy";
    buy.onclick = function () {
      sendResponseToAdd(item.product_id, qu.value);
    };

    div.appendChild(im);
    div.appendChild(pr);
    div.appendChild(dis);
    div.appendChild(buy);
    div.appendChild(qu);
  });
}

var count = 0;
function addprodect() {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var dataset = JSON.parse(this.responseText);
      if (this.responseText) {
        // console.log(dataset);
        loadData(dataset);
      } else {
        console.log("this.responseText");
      }
    }
  };
  data.open("POST", "./../PHP server/product.php", true);
  data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  data.send("count=" + count);
  count += 3;
}
//buy
function sendResponseToAdd(P_id, qu) {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText) {
        console.log(this.responseText);
      } else {
        console.log("this.responseText");
      }
    }
  };
  data.open("GET", "../PHP server/cart.php?idProduct=" + P_id, true);
  data.send();
}

function addListMyCart() {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var dataset1 = JSON.parse(this.responseText);

      if (this.responseText) {
        dataset1.forEach(function (item) {
          var li= document.createElement('li');
          li.innerHTML=item.product_name+" ( price: "+item.total_price+") ";
          li.className="list_My_Cart";
          document.getElementById('mycard_list').appendChild(li);
          
        });
      } else {
        console.log("this.responseText");
      }
    }
  };
  data.open("GET", "../PHP server/user_cart.php", true);
  data.send();
}
addListMyCart();
