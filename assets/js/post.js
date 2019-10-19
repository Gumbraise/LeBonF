var textarea = document.getElementById("textarea");
var fileSelect = document.getElementById("file");
var button = document.getElementById("button");
var label = document.getElementById("inns");

button.onclick = function () {
    var formData = new FormData();
    var file = fileSelect.files[0];
    formData.set("upload", "TRUE");
    formData.set("file", file, file.name);
    formData.set("text", textarea.value);

    var request = new XMLHttpRequest();
    request.open('POST', 'actions/post.php', true);
    request.send(formData);

    textarea.value = "";
}