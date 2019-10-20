var room_connect = document.getElementById("room_connect");
var pass_connect = document.getElementById("pass_connect");
var login = document.getElementById("login");

var user_register = document.getElementById("user_register");
var room_register = document.getElementById("room_register");
var pass_register = document.getElementById("pass_register");
var pass2_register = document.getElementById("pass2_register");
var register = document.getElementById("register");

login.onclick = function() {
    var formData = new FormData();
    formData.set("connexion", "TRUE");
    formData.set("room", room_connect.value);
    formData.set("pass", pass_connect.value);

    var request = new XMLHttpRequest();
    request.open('POST', 'actions/login.php', true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            div.innerHTML = request.responseText;
        }
    };
}

register.onclick = function() {
    var formData = new FormData();
    formData.set("inscription", "TRUE");
    formData.set("room", room_register.value);
    formData.set("pass", pass_register.value);
    formData.set("user", user_register.value);
    formData.set("pass2", pass2_register.value);

    var request = new XMLHttpRequest();
    request.open('POST', 'actions/register.php', true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            div.innerHTML = request.responseText;
        }
    };
}