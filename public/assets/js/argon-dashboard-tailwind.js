/*!

=========================================================
* Argon Dashboard Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
var to_build = aux.includes("pages") || aux.includes("docs") ? "../" : "./";
var root = window.location.pathname.split("/");
if (!aux.includes("pages")) {
    page = "dashboard";
}

loadStylesheet("../assets/css/perfect-scrollbar.css");
loadJS("../assets/js/perfect-scrollbar.js", true);

if (document.querySelector("[slider]")) {
    loadJS("../assets/js/carousel.js", true);
}

if (document.querySelector("nav [navbar-trigger]")) {
    loadJS("../assets/js/navbar-collapse.js", true);
}
if (document.querySelector("[navbar-trigger]")) {
    loadJS("../assets/js/navbar-collapse.js", true);
}

if (document.querySelector("[data-target='tooltip']")) {
    loadJS("../assets/js/tooltips.js", true);
    loadStylesheet("../assets/css/tooltips.css");
}

if (document.querySelector("[nav-pills]")) {
    loadJS("../assets/js/nav-pills.js", true);
}

if (document.querySelector("[dropdown-trigger]")) {
    loadJS("../assets/js/dropdown.js", true);
}

if (document.querySelector("[fixed-plugin]")) {
    loadJS("../assets/js/fixed-plugin.js", true);
}

if (
    document.querySelector("[navbar-main]") ||
    document.querySelector("[navbar-profile]")
) {
    if (document.querySelector("[navbar-main]")) {
        loadJS("../assets/js/navbar-sticky.js", true);
    }
    if (document.querySelector("aside")) {
        loadJS("../assets/js/sidenav-burger.js", true);
    }
}

if (document.querySelector("canvas")) {
    loadJS("../assets/js/charts.js", true);
}

if (document.querySelector(".github-button")) {
    loadJS("https://buttons.github.io/buttons.js", true);
}

function loadJS(FILE_URL, async) {
    let dynamicScript = document.createElement("script");

    dynamicScript.setAttribute("src", FILE_URL);
    dynamicScript.setAttribute("type", "text/javascript");
    dynamicScript.setAttribute("async", async);

    document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
    let dynamicStylesheet = document.createElement("link");

    dynamicStylesheet.setAttribute("href", FILE_URL);
    dynamicStylesheet.setAttribute("type", "text/css");
    dynamicStylesheet.setAttribute("rel", "stylesheet");

    document.head.appendChild(dynamicStylesheet);
}
