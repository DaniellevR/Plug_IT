/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$(function() {
//    $("#parts li a").click(function() {
//        $('html, body').animate({scrollTop: 0});
//        $(".adminpart").hide();
//        var myDiv = $(this).attr("href");
//        $(myDiv).show();
//        
//        
//        
//        
////        $('html, body').animate({scrollTop: 0}, 'fast');
////        window.scrollTo(0, 0);
////        document.body.scrollTop = document.documentElement.scrollTop = 0;
//    });
//});  

var hash = "";
var i = "0";

$(document).ready(function() {
    hash = window.location.hash;
    var hashes = ["#part1", "#part2", "#part3", "#part4"];

    if (!isInArray(hash, hashes)) {
        hash = "#part1";
        window.location.hash = "#part1";
        $(window.location.hash).show();
    }
    
//    window.onhashchange(window.location.hash);
});

// Als de de hash van de URL veranderd (wat achter de # staat)
window.onhashchange = function() {
    if (hash != window.location.hash) {
//        $(".test").text("change2 : " + i + " : " + hash + ";" + window.location.hash);

//        i++;

        // Hide alle pagina's
        $(".adminpart").hide();

        $('html, body').animate({scrollTop: 0}, 'fast');

        // En laat de pagina met het juiste id juist weer zien
        // window.location.hash heeft bijvoorbeeld de waarde '#frankrijk', wat ook meteen een jQuery selector is
        $(window.location.hash).show();

        hash = window.location.hash;
    } else {
//        $(".test").text("Hetzelfde : " + hash + ";" + window.location.hash);
    }
}

function isInArray(value, array) {
    return array.indexOf(value) > -1;
}