var ableToClick = true;
function buttonClick() {
    if (!ableToClick) return;
    ableToClick = false;

    let splash = document.getElementById("splash");
    splash.style.width = "100%";
    splash.style.height = "100%";

    setTimeout(function () {
        splash.style.opacity = "0";
    }, 400);

    setTimeout(function () {
        splash.style.transitionDuration = "0s";
    }, 1000);

    setTimeout(function () {
        splash.style.width = "0";
        splash.style.height = "0";
        splash.style.opacity = "1";
    }, 1100);

    setTimeout(function () {
        ableToClick = true;
        splash.style.transitionDuration = ".5s";
    }, 1200);
}
