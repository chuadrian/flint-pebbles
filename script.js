


const addEventOnElements = function (elements, eventType, callBack) {
    for (let i = 0, len = elements.length; i < len; i++){
        elements[i].addEventListener(eventType, callback);
    }
}





const preloader = document.querySelector("[data-preloader]");

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});