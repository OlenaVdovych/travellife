"use strict";
let modal = document.getElementById('myModal');
let btn = document.getElementById('myBtn');
let span = document.getElementsByClassName("close")[0];
let send = document.getElementById('submit');
let userName = document.getElementById('name');
let userPhone = document.getElementById('phone');

btn.onclick = function() {
    modal.style.display = "block";
};


span.onclick = function() {
    modal.style.display = "none";
};


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

send.onclick = function() {
    modal.style.display = alert('Thanks for contacting.\n ' + 'You have entered: ' + 'name - ' + userName.value + ', ' + ' phone - ' + userPhone.value + '.\n ' + 'We will call you the nearest hour! ');
};

