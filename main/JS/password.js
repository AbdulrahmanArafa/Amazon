const passInput = document.querySelector(".inputbox input[type=password]");
const toggleIcon = document.querySelector(".input-group .toggle");
const ripple = document.querySelector(".input-group .ripple");
const percentBar = document.querySelector(".strength-percent span");
const passLabel = document.querySelector(".strength-label");

const element = document.getElementById("ripple")

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