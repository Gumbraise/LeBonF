<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');

$insertmbr = $bdd->prepare("SELECT * FROM vente ORDER BY date DESC");
$insertmbr->execute(array());
$actuinfo = $insertmbr->fetchAll();

$itemlist = $bdd->prepare("SELECT COUNT(*) as id FROM vente"); 
$itemlist->execute(array());
$itemlists = $itemlist->fetch();
$itemlist->closeCursor();

if($itemlists['id'] > 0) {
    for($i = 0; $i < $itemlists['id']; $i++) {

        $insertmbr2 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $insertmbr2->execute(array($actuinfo[$i]['user_id']));
        $userinfo = $insertmbr2->fetch();

        $com = $bdd->prepare("SELECT COUNT(*) as id FROM vente_commentaires WHERE vente_id = ?");
        $com->execute(array($actuinfo[$i]['id']));
        $commentaire = $com->fetch();

        echo '
        <div class="fil" id="fil">
            <div class="top">
                <div class="pp">
                    <img src="'.$userinfo['picture'].'">
                </div>
                <div class="tet">
                    <a href="#">
                        <p class="name">'.$userinfo['firstname'].'</p>
                    </a>
                    <p class="salle">'.$userinfo['chambre'].'</p>
                    <p class="date">'.date("j F, H:i", $actuinfo[$i]['date']).'</p>
                </div>
                <div class="price">
                    <p class="price">'.$actuinfo[$i]['price'].'€</p>
                    <i class="fas fa-ellipsis-h"></i>
                </div>
            </div>
            <div class="body">
                <p class="tett">'.$actuinfo[$i]['text'].'</p>
                <img src="'.$actuinfo[$i]['picture'].'">
            </div>
            <div class="commentaires">
                <p>'.$commentaire['id'].' commentaires</p>
            </div>
        </div>
                    ';
    }
} else {
    echo 'Il n\'y a aucun post encore. Soyez le premier à poster !';
}
?>