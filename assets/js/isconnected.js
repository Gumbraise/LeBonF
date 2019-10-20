var pub = document.getElementById("pub");

window.onload = function hh() {
    const request2 = new XMLHttpRequest();
    request2.open('POST', 'actions/isconnected.php', true);
    request2.send();
    request2.onreadystatechange = function()
    {
        if (request2.readyState === 4) {
            pub.innerHTML = request2.responseText;
        }
    };
}