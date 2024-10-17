var wraper = document.querySelector("body .wraper");
var a = document.querySelectorAll(".menu a");
var section = document.querySelectorAll(".section");
var header = document.getElementById("header");
var menu = document.querySelector("header .menu");
var openBar = document.querySelector(".show-bar");
var menuShadow = document.querySelector(".menu-shadow");
section[0].classList.add("active-sec");
wraper.onscroll = function() {
    if (wraper.scrollTop > 100) {
        header.classList.add("active1");
    } else {
        header.classList.remove("active1");
    }
    section.forEach(function(sec) {
        id = sec.getAttribute("id");
        if (wraper.scrollTop >= sec.offsetTop - sec.clientHeight / 3) {
            a.forEach(function(a1) {
                a1.classList.remove("active");
                document
                    .querySelector(`#header .menu a[href*=${id}]`)
                    .classList.add("active");
            });
            sec.classList.add("active-sec");
        } else {
            sec.classList.remove("active-sec");
        }
    });
};

function openMenu() {
    menu.classList.add("menu-active");
    openBar.classList.add("hide-bar");
    menuShadow.classList.add("shadow-active");
}

function closeMenu() {
    menu.classList.remove("menu-active");
    openBar.classList.remove("hide-bar");
    menuShadow.classList.remove("shadow-active");
}
window.addEventListener("contextmenu", function(e) {
    e.preventDefault();
});
