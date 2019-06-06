/*jslint devel: true */

function check_password(form) {
    'use strict';
    var password1 = form.r_password.value,
        password2 = form.r_password2.value;

    // If password not entered 
    // if (password1 == '') 
    //     alert ("Please enter Password"); 

    // If confirm password not entered 
    // else if (password2 == '') 
    //    alert ("Please enter confirm password"); 

    // If Not same return False.     
    if (password1 !== password2) {
        alert("\nPasswords did not match: Please try again...");
        return false;
    }

    // If same return True. 
    //  else{ 
    //     alert("Password Match: Welcome to GeeksforGeeks!") 
    //      return true; 
    //  } 
}
