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
                </div>
                <div class="fonta">
                    <i class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profil.php?id='.$userinfo['id'].'">Accéder au profil</a>
                        ';
                        if(isset($_SESSION['id'])) { 
                            $userinfoSelect = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                            $userinfoSelect->execute(array($_SESSION['id']));
                            $userinfo2 = $userinfoSelect->fetch(); 
                            if(($_SESSION['id'] == $actuinfo[$i]['user_id']) OR ($userinfo2['perm'] == 1)) {
                                echo '
                                <form action="actions/supprPost.php" method="POST" name="supprPost">
                                    <input name="typeHidden" type="hidden" value="'.$actuinfo[$i]['id'].'">
                                    <input name="supprPost" type="submit" class="dropdown-item" value="Supprimer la publication" style="color: #f00;" <!--data-toggle="modal" data-target="#supprPost"-->
                                </form>
                                ';
                            }
                        }
                        echo '
                    </div>
                </div>
            </div>
            <div class="body">
                <p class="tett">'.$actuinfo[$i]['text'].'</p>
                <img src="'.$actuinfo[$i]['picture'].'">
            </div>
            <div class="commentaires" id="hopw">
                <p>'.$commentaire['id'].' commentaires</p>
            </div>
        </div>
                    ';
    }
} else {
    echo 'Il n\'y a aucun post encore. Soyez le premier à poster !';
}
?>