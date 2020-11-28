let button = document.querySelectorAll("#accept-cookies")[0];
let message = document.querySelectorAll("#message")[0];



button.addEventListener("click", acceptCookiesFunc, false);

    function acceptCookiesFunc(event){
        event.preventDefault();
        console.log("i wanna die");
        message.innerHTML = "Cookies were accepted. Would you Like to Revoke?";
        button.removeEventListener("click", acceptCookiesFunc, false);
        button.innerHTML = "Revoke";
        button.addEventListener("click", revokeFunc, false);
    }

    function revokeFunc(event){
        event.preventDefault();
        console.log("revoke");
        message.innerHTML = "By continuing to browse or by clicking Accept Cookies, you agree to the storing of cookies on your device to enhance you site experience and for analytical purposes."
        button.removeEventListener("click", revokeFunc, false);
        button.innerHTML = "Accept Cookies";
        button.addEventListener("click", acceptCookiesFunc, false);
    }
