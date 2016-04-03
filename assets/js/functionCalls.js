/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var QueryString = function() {
    // This function is anonymous, is executed immediately and 
    // the return value is assigned to QueryString!
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
            // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
            // If third or later entry with this name
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }
    return query_string;
}();

function login(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/SessionHandler.php',
        data: {action: 'login', username: document.getElementsByName('username')[0].value, password: document.getElementsByName('password')[0].value},
        success: function(response) {
            if (response === "User") {
                window.location = "/Plug_IT/index.php?page=Home";
            } else {
                if (QueryString.page === "Admin") {
                    window.location = "/Plug_IT/index.php?page=AdminCategories";
                } else {
                    window.location = "/Plug_IT/index.php?page=" + QueryString.page;
                }
            }


//            if (response === "error") {
//                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
//            } else if (response === "Administrator") {
//                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
//            } else if (response === "User") {
//                window.location = "/Plug_IT/index.php?page=Home";
//            } else {
//                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
//            }
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
            window.location = "/Plug_IT/index.php?page=AdminProducts";
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
            password: document.getElementsByName('password')[0].value, repeatPassword: document.getElementsByName('repeat_password')[0].value,
            page: document.getElementsByName('page')[0].value},
        success: function(response) {
            if (response === "error") {
                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
            } else if (QueryString.page === "AdminUsers") {
                window.location = "/Plug_IT/index.php?page=AdminUsers";
            } else {
                window.location = "/Plug_IT/index.php?page=Home";
            }
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
            role: document.getElementsByName('rolesEditUser')[0].value, currentPassword: document.getElementsByName('passwordEditUser')[0].value,
            password: document.getElementsByName('newPasswordEditUser')[0].value, repeatPassword: document.getElementsByName('repeat_passwordEditUser')[0].value,
            username: document.getElementsByName('usernameEditUser')[0].value},
        success: function(response) {
            if (response === "error") {
                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
            } else if (QueryString.page === "AdminUsers") {
                window.location = "/Plug_IT/index.php?page=AdminUsers";
            } else {
                window.location = "/Plug_IT/index.php?page=Home";
            }
        }
    });
}

function addOrder(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'addOrder'},
        success: function() {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

function editOrder(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'editOrder', orderId: document.getElementsByName('orderlist')[0].value, state: document.getElementsByName('statesEditOrder')[0].value},
        success: function() {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

function grabInfo(select, action, contentDiv)
{
    
    $('.testfunction').text("ACTION : " + action + " ; DIV : " + contentDiv);
    
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