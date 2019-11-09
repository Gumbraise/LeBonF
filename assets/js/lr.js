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
            if (request.responseText == "ok") {
                toastr["success"]("Vous allez être connecté")

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            } else if (request.responseText == "Erreur") {
                toastr["error"]("Une erreur inconnue est survenue. Merci de réessayer plus tard")

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            } else {
                toastr["warning"](request.responseText)

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            }
        }
        window.location.reload(false); 
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
            if (request.responseText == "ok") {
                toastr["success"]("Vous allez être connecté")

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
                window.location.reload(false); 
            } else if (request.responseText == "Erreur") {
                toastr["error"]("Une erreur inconnue est survenue. Merci de réessayer plus tard")

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            } else {
                toastr["warning"](request.responseText)

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            }
        }
    };
}