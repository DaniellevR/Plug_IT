/*
*
* Webshop Plug IT
*
* Made by : Nigel Liebers and Danielle van Rooij
*
* Avans 's-Hertogenbosch 2016 (c)
*
*/

/**
 * Get value of parameter in URL
 */
var QueryString = function () {
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

/**
 * Send request for login
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function login(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/SessionHandler.php',
        data: {action: 'login', username: document.getElementsByName('username')[0].value, password: document.getElementsByName('password')[0].value},
        success: function (response) {
            if (response === "error") {
                window.location = "/Plug_IT/index.php?page=" + QueryString.page;
            } else if (response === "User") {
                window.location = "/Plug_IT/index.php?page=Home";
            } else {
                if (QueryString.page === "Admin") {
                    window.location = "/Plug_IT/index.php?page=AdminCategories";
                } else {
                    window.location = "/Plug_IT/index.php?page=" + QueryString.page;
                }
            }
        }
    });
}

/**
 * Send request for logout
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function logout(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/SessionHandler.php',
        data: {action: 'logout'},
        success: function () {
            window.location = "/Plug_IT/index.php?page=Home";
        }
    });
}

/**
 * Send request for removing a category
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function removeCategory(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'removeCategory', categoryId: document.getElementsByName('categoriesRemove')[0].value},
        success: function () {
            window.location = "/Plug_IT/index.php?page=Admin";
        }
    });
}

/**
 * Send a request for removing a product
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function removeProduct(sender, e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'removeProduct', productId: document.getElementsByName('productToRemove')[0].value},
        success: function () {
            window.location = "/Plug_IT/index.php?page=AdminProducts";
        }
    });
}

/**
 * Send a request to add a user
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function addUser(sender, e) {
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
        success: function (response) {
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

/**
 * Send a request to edit a user
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
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
        success: function (response) {
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

/**
 * Check action of button and call function
 * @param {type} $action
 * @returns {undefined}
 */
function checkform($action) {
    if ($action === "addProductToOrder") {
        addProductToOrder();
    } else if ($action === "addOrder") {
        addOrder();
    } else if ($action === "reset") {
        reset();
    }
}

/**
 * Request for the order in the admin page to be forgotten
 * @returns {undefined}
 */
function reset() {
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'reset'},
        success: function() {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

/**
 * Send request to add product to order
 * @returns {undefined}
 */
function addProductToOrder() {
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'addOrder', username: document.getElementsByName('userAddOrder')[0].value, streetnameDelivery: document.getElementsByName('streetnameDelivery')[0].value,
            housenumberDelivery: document.getElementsByName('housenumberDelivery')[0].value, housenumberSuffixDelivery: document.getElementsByName('housenumberSuffixDelivery')[0].value,
            postalCodeDelivery: document.getElementsByName('postalCodeDelivery')[0].value, cityDelivery: document.getElementsByName('cityDelivery')[0].value,
            streetnameBilling: document.getElementsByName('streetnameBilling')[0].value, housenumberBilling: document.getElementsByName('housenumberBilling')[0].value,
            housenumberSuffixBilling: document.getElementsByName('housenumberSuffixBilling')[0].value, postalCodeBilling: document.getElementsByName('postalCodeBilling')[0].value,
            cityBilling: document.getElementsByName('cityBilling')[0].value, productId: document.getElementsByName('productslist')[0].value,
            amount: document.getElementsByName('amount')[0].value, button: 'addProduct'},
        success: function() {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

/**
 * Send request to save the order in the database
 * @returns {undefined}
 */
function addOrder() {
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'addOrder', username: document.getElementsByName('userAddOrder')[0].value, streetnameDelivery: document.getElementsByName('streetnameDelivery')[0].value,
            housenumberDelivery: document.getElementsByName('housenumberDelivery')[0].value, housenumberSuffixDelivery: document.getElementsByName('housenumberSuffixDelivery')[0].value,
            postalCodeDelivery: document.getElementsByName('postalCodeDelivery')[0].value, cityDelivery: document.getElementsByName('cityDelivery')[0].value,
            streetnameBilling: document.getElementsByName('streetnameBilling')[0].value, housenumberBilling: document.getElementsByName('housenumberBilling')[0].value,
            housenumberSuffixBilling: document.getElementsByName('housenumberSuffixBilling')[0].value, postalCodeBilling: document.getElementsByName('postalCodeBilling')[0].value,
            cityBilling: document.getElementsByName('cityBilling')[0].value, productId: document.getElementsByName('productslist')[0].value,
            amount: document.getElementsByName('amount')[0].value, button: 'addOrder'},
        success: function() {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

/**
 * Send request to add edit the state of an order
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function editOrder(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
        data: {action: 'editOrder', orderId: document.getElementsByName('orderlist')[0].value, state: document.getElementsByName('statesEditOrder')[0].value},
        success: function () {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

/**
 * Edit the amount of a product in the cart (admin page)
 * @param {type} sender
 * @param {type} e
 * @returns {undefined}
 */
function editAmountProductInOrder(sender, e) {
    e.preventDefault();

    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/Plug_IT/handlers/AdminHandler.php',
//        data: {action: 'changeAmount', newAmount: document.getElementsByName('newAmount')[0].value, productId: document.getElementsByName('newAmount')[0].id},
//        data: {action: 'changeAmount', newAmount: sender.value, productId: sender.id},
    data: {action: 'changeAmount', newAmount: e.target.value, productId: e.target.id},
        success: function () {
            window.location = "/Plug_IT/index.php?page=AdminOrders";
        }
    });
}

/**
 * Request for some data to display in the views
 * @param {type} select
 * @param {type} action
 * @param {type} contentDiv
 * @returns {undefined}
 */
function grabInfo(select, action, contentDiv)
{
    var id = select[select.selectedIndex].id;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(contentDiv).innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "handlers/getinfo.php?action=" + action + "&id=" + id, true);
    xmlhttp.send();
}