var textarea = document.getElementById("textarea");
var fileSelect = document.getElementById("file");
var button = document.getElementById("button");
var label = document.getElementById("inns");
var price = document.getElementById("price");

button.onclick = function () {
    var formData = new FormData();
    var file = fileSelect.files[0];
    formData.set("upload", "TRUE");
    formData.set("file", file, file.name);
    formData.set("text", textarea.value);
    formData.set("price", price.value);

    var request = new XMLHttpRequest();
    request.open('POST', 'actions/post.php', true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            if(request.responseText != "ok") {
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
            } else {
                toastr["success"]("Votre post a bien été publié. Il arrive d'ici une dizaine de secondes dans nos serveurs")
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
                textarea.value = "";
                price.value = "";
            }
        }
    };
}