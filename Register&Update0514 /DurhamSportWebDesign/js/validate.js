//check field whether is empty
function validate_required(field, alerttxt) {
    with (field) {
        if (value == null || value == "") {
            alert(alerttxt);
            return false
        } else {
            return true
        }
    }
}

//check Email field whether is valid
function validate_email(field, alerttxt) {
    with (field) {

        apos = value.indexOf("@")
        dotpos = value.lastIndexOf(".")
        if (apos < 1 || dotpos - apos < 3) {
            alert(alerttxt);
            return false
        } else {
            return true
        }
    }
}

//return msg to user when these situation occur
function validate_form(thisform) {
    with (thisform) {

        if (validate_required(username, "username must be filled out!") == false) {
            username.focus();
            return false
        } else if (validate_required(password, "password must be filled out!") == false) {
            password.focus();
            return false
        } else if (validate_required(firstname, "firstname must be filled out!") == false) {
            firstname.focus();
            return false
        } else if (validate_required(lastname, "lastname must be filled out!") == false) {
            lastname.focus();
            return false
        } else if (validate_required(Email, "Email must be filled out!") == false) {
            Email.focus();
            return false
        }else if (validate_email(Email, "Not a valid e-mail address!") == false) {
            Email.focus();
            return false
        }

    }
}

function validate_userform(thisform) {
    with (thisform) {

        if (validate_required(password, "password must be filled out!") == false) {
            password.focus();
            return false
        } else if (validate_required(firstname, "firstname must be filled out!") == false) {
            firstname.focus();
            return false
        } else if (validate_required(lastname, "lastname must be filled out!") == false) {
            lastname.focus();
            return false
        } else if (validate_required(Email, "Email must be filled out!") == false) {
            Email.focus();
            return false
        } else if (validate_email(Email, "Not a valid e-mail address!") == false) {
            Email.focus();
            return false
        }

    }
}
