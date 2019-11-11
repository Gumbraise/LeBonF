var picture = document.getElementsByClassName("black");
var fileSelect = document.getElementById("file");
var pp = document.getElementById("pp");


fileSelect.onchange = function() {
    var formData = new FormData();
    var file = fileSelect.files[0];
    formData.set("upload", "TRUE");
    formData.set("file", file, file.name);

    var request = new XMLHttpRequest();
    request.open('POST', 'actions/postPP.php', true);
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
            }
        }
    };

}