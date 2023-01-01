function checkData() {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    var x=document.getElementById("Fname");
    if (this.readyState == 4 && this.status == 200) {
        if(this.responseText !=1){
          x.innerHTML='This name is already taken';
          return false;
        }else{
          x.innerHTML='';
          return true;
        }
    }
  };
  data.open("POST", "./../PHP server/Isvalid.php", true);
  data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var f = document.getElementById("NA-f").value;
  data.send("first_name=" + f);
}
document.getElementById("regFrom").onsubmit = checkData;

/*****  ***    */
function checkDataMAil() {
  var data = new XMLHttpRequest();
  data.onreadystatechange = function () {
    var x=document.getElementById("Email");
    if (this.readyState == 4 && this.status == 200) {
        if(this.responseText !=1){
          x.innerHTML='This Email is already taken';
          return false;
        }else{
          x.innerHTML='';
          return true;
        }
    }
  };
  data.open("POST", "./../PHP server/email.php" ,true);
  data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var f = document.getElementById("email").value;
  data.send("email=" + f);
}
document.getElementById("regFrom").onsubmit = checkDataMAil;


