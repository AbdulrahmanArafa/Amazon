const passInput = document.querySelector(".inputbox input[type=password]");
const toggleIcon = document.querySelector(".input-group .toggle");
const ripple = document.querySelector(".input-group .ripple");
const percentBar = document.querySelector(".strength-percent span");
const passLabel = document.querySelector(".strength-label");

const element = document.getElementById("ripple");

passInput.addEventListener("input", handlePassInput);
toggleIcon.addEventListener("click", togglePassInput);
element.addEventListener("click", RipplePassInput);

function handlePassInput(e) {
  if (passInput.value.length === 0) {
    passLabel.innerHTML = "Strength";
    addClass();
  } else if (passInput.value.length <= 8) {
    passLabel.innerHTML = "Weak";
    addClass("weak");
  } else if (passInput.value.length <= 16) {
    passLabel.innerHTML = "Not Bad";
    addClass("average");
  } else {
    passLabel.innerHTML = "Strong";
    addClass("strong");
  }
}

function addClass(className) {
  percentBar.classList.remove("weak");
  percentBar.classList.remove("average");
  percentBar.classList.remove("strong");
  if (className) {
    percentBar.classList.add(className);
  }
}

function togglePassInput(e) {
  const type = passInput.getAttribute("type");
  if (type === "password") {
    passInput.setAttribute("type", "text");

    ripple.style.visibility = "visible";
    toggleIcon.style.visibility = "hidden";
  }
}
function RipplePassInput(e) {
  const type = passInput.getAttribute("type");
  if (type === "text") {
    passInput.setAttribute("type", "password");
    toggleIcon.style.visibility = "visible";
    ripple.style.visibility = "hidden";
  }
}


/***  validPassword  */

function validPassword() {
  let pass1 = document.getElementById("pwd1").value;
  let pass2 = document.getElementById("pwd2").value;
  var valid = true;
  if (pass1 != pass2) {
    //alert("Passwords Do not match");
    document.getElementById("pwd2").style.borderColor = "rgb(255,0,0)";
    document.getElementById("pwd2").focus();
    valid = false;
    return false;
  } else {
    return valid;
  }
}
document.getElementById("regFrom").onsubmit = validPassword;


/***   */




// make label  more confirmation

function lableSet() {
  var pass = document.getElementById("pass").value;
  if ("" != pass || pass.length() < 0) {
    document.getElementById("styleL").style.translate = "-40px -40px";
    document.getElementById("styleL").style.scale = "0.7";
  } else {
    document.getElementById("styleL").style.translate = "40px 40px";
    document.getElementById("styleL").style.scale = "1";
  }
}
function lableSetE() {
  var email = document.getElementById("email").value;

  if ("" != email || email.length() < 0) {
    document.getElementById("styleE").style.translate = "-40px -40px";
    document.getElementById("styleE").style.scale = "0.7";
  } else {
    document.getElementById("styleE").style.translate = "0 -50%";
    document.getElementById("styleE").style.scale = "1";
  }
}
