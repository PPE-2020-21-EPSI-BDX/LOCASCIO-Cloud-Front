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
    if (document.documentElement.scrollTop > 10) {
        document.querySelector("header").style.height = "7vh"
        document.querySelector(".logo-nav img").style.width = "150px"
        document.querySelector("#logo").style.width = "100px";
        document.querySelector("header").classList.add('header-bg');
    } else {
        document.querySelector("header").style.height = "10vh"
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


const readMoreButtons = document.querySelectorAll(".read-more-button");

readMoreButtons.forEach((current, index, array) => {
    const tl = gsap.timeline({ paused: true });

    const button = current;
    const text = button.querySelector(".text");
    const arrow = button.querySelector(".arrow-btns");

    gsap.set(button, {
        width: '70px'
    });
    gsap.set(text, {
        opacity: 0,
        scaleY: .2,
        transformOrigin: '0% 100%'
    });
    gsap.set(arrow, {
        right: '50%'
    });

    tl.to(button, {
        width: '250px',
        duration: 1,
        ease: Elastic.easeOut.config(1, 0.3)
    });
    tl.to(arrow, {
        x: '5em',
        duration: .5,
        ease: Power4.easeIn
    }, 0);
    tl.to(text, {
        opacity: 1,
        scaleY: 1,
        duration: .3,
        ease: Back.easeOut.config(4)
    }, .5);

    button.addEventListener("mouseenter", () => {
        tl.play();
    });
    button.addEventListener("mouseleave", () => {
        tl.reverse();
    });
});
