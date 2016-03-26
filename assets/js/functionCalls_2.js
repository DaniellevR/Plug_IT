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
//    $form = $(this);
//    uploadImage($form);

    var formId = $(this).attr("id");

    if (formId === "addCategoryForm") {
        var select = document.getElementById("categoriesAdd");
        var categoryname = document.getElementById('categorynameAdd').value;
        var description = document.getElementById('categoryDescriptionAdd').value;
        var parentId = select.options[select.selectedIndex].value;
        
        var generatedId = -1;

        jQuery.ajax({
            type: "POST",
            url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
            data: {action: "addCategory", category: categoryname, description: description, parent: parentId},
            success: function(response) {
                generatedId = response;
                location.reload();
            }
        });

        $form = $(this);
        uploadImage($form, generatedId);

    }




});

function uploadImage($form, id) {
    var formdata = new FormData($form[0]); //formelement
    var request = new XMLHttpRequest();
    request.open('post', 'handlers/upload.php?filename' + id);
    request.send(formdata);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
