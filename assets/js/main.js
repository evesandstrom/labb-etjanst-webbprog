function validateLogForm(){

    var email = document.logForm.logEmail.value;
    var password = document.logForm.logPassword.value;
    var loginError = document.getElementById("loginError");

    if((email.trim() == "") || (email.indexOf("@") == -1) || (email.indexOf(".") == -1) || (password.trim() == "") || (password.length < 6 )){
        loginError.textContent = "Alla fält måste vara ifyllda!";
        return false;
    }
}

function validateRegForm(){

    var name = document.regForm.regName.value;
    var email = document.regForm.regEmail.value;
    var password = document.regForm.regPassword.value;
    var regError = document.getElementById("regError");

    if((name.trim() == "") || (email.trim() == "") || (email.indexOf("@") == -1) || (email.indexOf(".") == -1) || (password.trim() == "") || (password.length < 6 )){
        regError.textContent = "Alla fält måste vara ifyllda!";
        return false;
    }
}

function validateComment(){

    var comment = document.postComment.newComment.value;
    var commentError = document.getElementById("commentError");

    if(comment.trim() == ""){
        commentError.textContent = "Skriv en kommentar innan du klickar på skicka!";
        return false;
    }
}
