/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fillFields() {
    var myselect = document.getElementById("categories_edit");
    alert(myselect.options[myselect.selectedIndex].value);
}

function fillFieldsAdmin(select) {
    var value = select.value;
    
}