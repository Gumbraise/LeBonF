var div = document.getElementById("poi");

window.onload = function actus() {
    const request = new XMLHttpRequest();
    const request2 = new XMLHttpRequest();
    request.open('POST', 'actions/actus.php', true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();

    request2.open('POST', 'actions/howmany.php', true);
    request2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request2.send();

    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            point.innerHTML = request.responseText;
            var res = str.split(":");
        }
    };

    div.innerHTML = '<div class="fil" id="fil"><div class="top"><div class="pp"><img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/72696640_404517410448630_6411701761299447808_n.jpg?_nc_cat=104&_nc_oc=AQkLP2bt5tK2aaPKSOT57vxeQR36Jg8D5CrUUjMmAy9V5zrJeU8DD0l4J7-48z1bzgM&_nc_ht=scontent-cdg2-1.xx&oh=429ebfb0e4457851512b995042ab66b0&oe=5E30065C"></div><div class="tet"><a href="#"><p class="name">Lorem Ipsum</p></a><p class="salle">F202</p><p class="date">22</p></div><div class="price"><p class="price">20€</p></div></div><div class="body"><p class="tett">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vel beatae at et, officia dolorem molestiae hic distinctio iure? Perspiciatis tempore fugit voluptatum consequuntur illo optio blanditiis magni ipsam aliquam.</p><img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/74310979_1160642747467926_7521758023413399552_n.jpg?_nc_cat=110&_nc_oc=AQmuYLgIjDVjKpxotiCEwNDn7P8eakUi7RFzM4izbaO2PSbEdis3GFSqftm_TeyZOzY&_nc_ht=scontent-cdg2-1.xx&oh=b57bb6780cab6e06435a78e715dd71a2&oe=5E183371"></div></div></div>';
}