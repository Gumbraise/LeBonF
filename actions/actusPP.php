<?php
if($vente_user_count > 0) {
    for($i = 0; $i < $vente_user_count; $i++) {

        $com = $bdd->prepare("SELECT * FROM vente_commentaires WHERE vente_id = ?");
        $com->execute(array($vente_user[$i]['id']));
        $commentaire = $com->rowCount();

        echo '
        <div class="fil" id="fil">
            <div class="top">
                <div class="pp">
                    <img src="'.$get_user['picture'].'">
                </div>
                <div class="tet">
                    <a href="#">
                        <p class="name">'.$get_user['name'].'</p>
                    </a>
                    <p class="salle">'.$get_user['classe'].'</p>
                    <p class="date">'.date("j F, H:i", $vente_user[$i]['date']).'</p>
                </div>
                <div class="price">
                    <p class="price">'.$vente_user[$i]['price'].'€</p>
                </div>
                <div class="fonta">
                    <i class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profil.php?id='.$get_user['id'].'">Accéder au profil</a>
                        ';
                        if(isset($_SESSION['id'])) { 
                            if(($_SESSION['id'] == $vente_user[$i]['user_id']) OR ($session_user['perm'] == 1)) {
                                echo '
                                <form action="actions/supprPost.php" method="POST" name="supprPost">
                                    <input name="typeHidden" type="hidden" value="'.$vente_user[$i]['id'].'">
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
                <p class="tett">'.$vente_user[$i]['text'].'</p>
                <img src="'.$vente_user[$i]['picture'].'">
            </div>
            <div class="commentaires" id="hopw">
                <p>'.$commentaire.' commentaires</p>
            </div>
        </div>
                    ';
    }
} else {
    echo 'Il n\'y a aucun post encore. Soyez le premier à poster !';
}
?>