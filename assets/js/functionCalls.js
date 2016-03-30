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

function removeCategory(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'removeCategory', categoryId: document.getElementsByName('categoriesRemove')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin";
        }
    });
}

function removeProduct(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'removeProduct', productId: document.getElementsByName('productToRemove')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin";
        }
    });
}

function addUser(sender, e) {
//    firstname, prefix, lastname, email, telephonenumber, streetname, housenumber, housenumberSuffix, postalCode, city, username, roles, password, repeat_password
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'addUser', firstname: document.getElementsByName('firstname')[0].value, prefix: document.getElementsByName('prefix')[0].value,
            lastname: document.getElementsByName('lastname')[0].value, email: document.getElementsByName('email')[0].value,
            telephonenumber: document.getElementsByName('telephonenumber')[0].value, streetname: document.getElementsByName('streetnameAddUser')[0].value,
            housenumber: document.getElementsByName('housenumberAddUser')[0].value, housenumberSuffix: document.getElementsByName('housenumberSuffixAddUser')[0].value,
            postalCode: document.getElementsByName('postalCodeAddUser')[0].value, city: document.getElementsByName('cityAddUser')[0].value,
            username: document.getElementsByName('username')[0].value, role: document.getElementsByName('roles')[0].value,
            password: document.getElementsByName('password')[0].value, repeatPassword: document.getElementsByName('repeat_password')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin";
        }
    });
}

function editUser(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'editUser', firstname: document.getElementsByName('firstnameEditUser')[0].value, prefix: document.getElementsByName('prefixEditUser')[0].value,
            lastname: document.getElementsByName('lastnameEditUser')[0].value, email: document.getElementsByName('emailEditUser')[0].value,
            telephonenumber: document.getElementsByName('telephonenumberEditUser')[0].value, streetname: document.getElementsByName('streetnameEditUser')[0].value,
            housenumber: document.getElementsByName('housenumberEditUser')[0].value, housenumberSuffix: document.getElementsByName('housenumberSuffixEditUser')[0].value,
            postalCode: document.getElementsByName('postalCodeEditUser')[0].value, city: document.getElementsByName('cityEditUser')[0].value,
            role: document.getElementsByName('rolesEditUser')[0].value, currentPassword: document.getElementsByName('current_passwordEditUser')[0].value,
            password: document.getElementsByName('passwordEditUser')[0].value, repeatPassword: document.getElementsByName('repeat_passwordEditUser')[0].value,
            username: document.getElementsByName('edit_users')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=Admin";
        }
    });
}

function grabInfo(select, action, contentDiv)
{
    var id = select[select.selectedIndex].id;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
//            $('.test').text(xmlhttp.responseText);
            document.getElementById(contentDiv).innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "handlers/getinfo.php?action=" + action + "&id=" + id, true);
    xmlhttp.send();
}