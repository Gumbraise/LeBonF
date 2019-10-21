var div = document.getElementById("poi");

window.onload = function actus() {
    const request = new XMLHttpRequest();
    request.open('POST', 'actions/actus.php', true);
    request.send();
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            div.innerHTML = request.responseText;
        }
    };
    setTimeout(actus, 15000);
}
