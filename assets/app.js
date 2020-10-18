/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
require('bootstrap');
import './styles/app.scss';
import CookieManager from './CookieManager.js';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


function insertAnalytics(){
    var head = document.querySelector("head");
    head.innerHTML = "<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-180568389-1\"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-180568389-1');</script>" + head.innerHTML;
}

var cookieManager = new CookieManager();

if(!cookieManager.getCookies().acceptCookies){
    var modal = document.getElementById("cookieModal");
    var modalBtn = document.getElementById("btn-modal");
    modalBtn.addEventListener('click', () => {
        cookieManager.setCookie("acceptCookies", 1);
        modal.style.display = "none";
        insertAnalytics();
    });
    modal.style.display = "block";
}
else{
    insertAnalytics();
}