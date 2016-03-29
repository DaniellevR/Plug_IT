/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function login(sender, e, page) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/SessionHandler.php',
        data: {action: 'login', username: document.getElementsByName('username')[0].value, password: document.getElementsByName('password')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=" + page;
            return true;
        },
        error: function(response) {
            alert("e : " + JSON.stringify(response));
            return false;
        }
    });
}
;

function logout(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/SessionHandler.php',
        data: {action: 'logout'},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Home";
        }
    });
}
;




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('submit', 'form', function(e) {
    e.preventDefault();
    $form = $(this);
    uploadImage($form);
});

function uploadImage($form) {
    var formdata = new FormData($form[0]); //formelement
    var request = new XMLHttpRequest();
    request.open('post', 'server.php');
    request.send(formdata);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//function addCategory(sender, e) {
//    e.stopPropagation(); // Stop stuff happening
//    e.preventDefault();
//
////    event.preventDefault(); // Totally stop stuff happening
//
//    var select = document.getElementById("categoriesAdd");
//    var id = select.options[select.selectedIndex].value;
//
////    alert(document.getElementById('photoCat'));
////
////    var files = document.getElementById('photoCat').files;
////    for (var i = 0; i < files.length; i++){
////        alert(files[i].name);
////        alert(files[i].size);
//////        alert(files[i].tmp_name);
////        alert(files[i].mozFullPath);
////    }
////    $('.testje').text("D");
//
////    var data = new FormData();
////    jQuery.each(jQuery('#file')[0].files, function(i, file) {
////        alert("file : " + file);
////        data.append('imageAddCategory', file);
////    });
//
//    $('.testje').text("A");
//
//var form = $('form')[0]; // You need to use standart javascript object here
//var formData = new FormData(form);
////formData.append('action', 'addCategory');
//
////    var data = new FormData();
////    $('.testje').text("B");
////    data.append('action', 'addCategory');
////    $('.testje').text("C");
////    
////    var files = document.getElementById('photoCat').files;
////    for (var i = 0; i < files.length; i++) {
////        data.append()
////        alert(files[i].name);
////        alert(files[i].size);
//////        alert(files[i].tmp_name);
////        alert(files[i].mozFullPath);
////    }
//    
////    $.each(files, function(key, value)
////    {
////        $('.testje').text("D : " + key + " ; " + value);
////        data.append(key, value);
////    });
//
//    $('.testje').text("E");
//
//    jQuery.ajax({
//        type: "POST",
//        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
//        data: {action: 'addCategory', formData: formdata},
////        data: {action: 'addCategory',
////            categoryname: document.getElementByName('categorynameAdd')[0].value,
////            description: document.getElementByName('category_descriptionAdd')[0].value,
////            parent: id,
////            photo: document.getElementByName('imageAddCategory')[0].value},
//        success: function() {
//            window.location = "/Plug_IT/index.php?page=Admin#part1";
//        }
//    });
//}
//;

function editCategory(sender, e) {
    e.preventDefault();

    var select = document.getElementByName("categoriesEdit");
    var category = select.options[select.selectedIndex].value;

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'editCategory', categoryname: document.getElementsByName('categorynameAdd')[0].value,
            description: document.getElementsByName('category_descriptionAdd')[0].value,
            parent: document.getElementsByName('formParentCategoriesAdd')[0].value,
            photo: document.getElementsByName('imageAddCategory')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin#part1";
        }
    });
}
;

function removeCategory(sender, e) {
    e.preventDefault();

    var select = document.getElementByName("categoriesRemove");
    var category = select.options[select.selectedIndex].value;

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'removeCategory', categoryname: category},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin#part1";
        }
    });
}
;