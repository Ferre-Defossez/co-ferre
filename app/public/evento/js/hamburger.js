'use strict';
(function (){
    let icon = document.querySelector('.icon');
    let items = document.getElementById('mylinks');
    const hamb = function() {
        if (items.style.display === "block") {
            items.style.display = "none";
            items.style.visibility = "hidden";
        }
        else {
            items.style.display = "block";
            items.style.visibility = "visible";
        }
    }
    icon.addEventListener('click',hamb);
})()
