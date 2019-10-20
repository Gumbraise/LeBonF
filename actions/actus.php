<?php
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');

$insertmbr = $bdd->prepare("SELECT * FROM vente");
$insertmbr->execute(array());
$userinfo = $insertmbr->fetchAll();

$itemlist = $bdd->prepare("SELECT COUNT(*) as id FROM vente"); 
$itemlist->execute(array());
$itemlists = $itemlist->fetch();
$itemlist->closeCursor();

if($itemlists['id'] > 0) {
    for($i = 0; $i < $itemlists['id']; $i++) {
        echo '
        <div class="fil" id="fil">
            <div class="top">
                <div class="pp">
                    <img src="'.$userinfo[$i]['picture'].'">
                </div>
                <div class="tet">
                    <a href="#">
                        <p class="name">Lorem Ipsum</p>
                    </a>
                    <p class="salle">F202</p>
                    <p class="date">'.date("j F, H:i", $userinfo[$i]['date']).'</p>
                </div>
                <div class="price">
                    <p class="price">'.$userinfo[$i]['price'].'€</p>
                </div>
            </div>
            <div class="body">
                <p class="tett">'.$userinfo[$i]['text'].'</p>
                <img src="'.$userinfo[$i]['picture'].'">
            </div>
        </div>
                    ';
    }
} else {
    echo 'Il n\'y a aucun post encore. Soyez le premier à poster !';
}
?>