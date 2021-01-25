var burger = document.querySelector('#burger');
if (burger) {

    burger.onclick = function (ev) {
        var target = ev.currentTarget,
            nav = document.querySelector('nav');
        if (target.classList.contains('burger-closed')) {
            target.classList.remove('burger-closed');
            nav.classList.remove('display-nav');
        } else {
            target.classList.add('burger-closed');
            nav.classList.add('display-nav');
        }
    }
}

window.onscroll = function() {
    if (document.documentElement.scrollTop > 100) {
        document.querySelector("header").style.height = "2vh"
        document.querySelector(".logo-nav img").style.width = "100px"
        document.querySelector("#logo").style.width = "100px";
        document.querySelector("header").classList.add('header-bg');
    } else {
        document.querySelector("header").style.height = "4.5vh"
        document.querySelector(".logo-nav img").style.width = "200px"
        document.querySelector("#logo").style.width = "200px";
        document.querySelector("header").classList.remove('header-bg');
    }
};

var carousselArrowLeft = document.getElementById("caroussel-arrow-left");
var carousselArrowRight = document.getElementById("caroussel-arrow-right");
var carousselTest = document.querySelector(".test");
var nbrOfferCard = document.querySelectorAll(".offercard").length;
var carousselActualCard = 1;

carousselArrowLeft.addEventListener('click', function() { moveCaroussel("left") }, false);

carousselArrowRight.addEventListener('click', function() { moveCaroussel("right") }, false);

function moveCaroussel(direction) {
    if(direction == "left") {
        if(carousselActualCard == 1) {
            carousselActualCard = nbrOfferCard;
            carousselTest.style.transform = "translateX(-" + (100 / nbrOfferCard) * (carousselActualCard - 1) + "%)";
        } else {
            carousselActualCard = carousselActualCard - 1;
            carousselTest.style.transform = "translateX(-" + (100 / nbrOfferCard) * (carousselActualCard - 1) + "%)";
        }
    } else if(direction == "right") {
        if(carousselActualCard == nbrOfferCard) {
            carousselActualCard = 1;
            carousselTest.style.transform = "translateX(-" + (100 / nbrOfferCard) * (carousselActualCard - 1) + "%)";
        } else {
            carousselActualCard = carousselActualCard + 1;
            carousselTest.style.transform = "translateX(-" + (100 / nbrOfferCard) * (carousselActualCard - 1) + "%)";
        }
    }
}

