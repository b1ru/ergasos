var sign_in_btn = document.getElementById("sign-in-btn")
sign_in_btn.parentElement.removeChild(sign_in_btn)

var register_btn = document.getElementById("register-btn")

var btn = document.createElement("BUTTON");
btn.innerHTML = "NEW UGLY BUTTON";     


register_btn.parentElement.replaceChild(btn, register_btn)
