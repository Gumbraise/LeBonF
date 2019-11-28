var picture = document.getElementsByClassName("black");
var fileSelect = document.getElementById("file");
var pp = document.getElementById("pp");
var pp_header = document.getElementById("pp_header");

fileSelect.onchange = function() {
    var formData = new FormData();
    var file = fileSelect.files[0];
    formData.set("upload", "TRUE");
    formData.set("file", file, file.name);

    var request = new XMLHttpRequest();
    request.open('POST', '?action=postPP', true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            var stringArray = request.responseText.split("/");
            if(stringArray[0] == "users") {
                pp.src = request.responseText;
                pp_header.src = request.responseText;
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