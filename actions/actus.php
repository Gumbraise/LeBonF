<?php
if(isset($_POST['categorie'])) {
    if($_POST['categorie'] == "none") {
        $select5 = $bdd->prepare("SELECT * FROM vente ORDER BY date DESC");
        $select5->execute(array());
        $vente_all = $select5->fetchAll();
        $vente_all_count = $select5->rowCount();

        if($vente_all_count > 0) {
            for($i = 0; $i < $vente_all_count; $i++) {

                $select6 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $select6->execute(array($vente_all[$i]['user_id']));
                $user_vente = $select6->fetch();
                $user_vente_count = $select6->rowCount();

                $select7 = $bdd->prepare("SELECT * FROM vente_commentaires WHERE vente_id = ?");
                $select7->execute(array($vente_all[$i]['id']));
                $commentaire = $select7->fetch();
                $commentaire_count = $select7->rowCount();

                echo '
                <div class="fil" id="fil">
                    <div class="top">
                        <div class="pp">
                            <img src="'.$user_vente['picture'].'">
                        </div>
                        <div class="tet">
                            <a href="profil.php?id='.$user_vente['id'].'">
                                <p class="name">'.$user_vente['name'].'</p>
                            </a>
                            <p class="salle">'.$user_vente['classe'].'</p>
                            <p class="date">'.date("j F, H:i", $vente_all[$i]['date']).'</p>
                        </div>
                        <div class="price">
                            <p class="price">'.$vente_all[$i]['price'].'€</p>
                        </div>
                        <div class="fonta">
                            <i class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profil.php?id='.$user_vente['id'].'">Accéder au profil</a>
                                ';
                                if(isset($_SESSION['id'])) { 
                                    if(($_SESSION['id'] == $vente_all[$i]['user_id']) OR ($session_user['perm'] == 1)) {
                                        echo '
                                        <form action="actions/supprPost.php" method="POST" name="supprPost">
                                            <input name="typeHidden" type="hidden" value="'.$vente_all[$i]['id'].'">
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
                        <p class="tett">'.$vente_all[$i]['text'].'</p>
                        <img src="'.$vente_all[$i]['picture'].'">
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
    } else {
        $select8 = $bdd->prepare("SELECT * FROM vente WHERE categorie = ? ORDER BY date DESC");
        $select8->execute(array($_POST['categorie']));
        $vente_cat = $select8->fetchAll();
        $vente_cat_count = $select8->rowCount();

        if($vente_cat_count > 0) {
            for($i = 0; $i < $vente_cat_count; $i++) {

                $select6 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $select6->execute(array($vente_cat[$i]['user_id']));
                $user_vente = $select6->fetch();
                $user_vente_count = $select6->rowCount();

                $select7 = $bdd->prepare("SELECT * FROM vente_commentaires WHERE vente_id = ?");
                $select7->execute(array($vente_cat[$i]['id']));
                $commentaire = $select7->fetch();
                $commentaire_count = $select7->rowCount();

                echo '
                <div class="fil" id="fil">
                    <div class="top">
                        <div class="pp">
                            <img src="'.$user_vente['picture'].'">
                        </div>
                        <div class="tet">
                            <a href="profil.php?id='.$user_vente['id'].'">
                                <p class="name">'.$user_vente['name'].'</p>
                            </a>
                            <p class="salle">'.$user_vente['classe'].'</p>
                            <p class="date">'.date("j F, H:i", $vente_cat[$i]['date']).'</p>
                        </div>
                        <div class="price">
                            <p class="price">'.$vente_cat[$i]['price'].'€</p>
                        </div>
                        <div class="fonta">
                            <i class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profil.php?id='.$user_vente['id'].'">Accéder au profil</a>
                                ';
                                if(isset($_SESSION['id'])) { 
                                    if(($_SESSION['id'] == $vente_all[$i]['user_id']) OR ($session_user['perm'] == 1)) {
                                        echo '
                                        <form action="actions/supprPost.php" method="POST" name="supprPost">
                                            <input name="typeHidden" type="hidden" value="'.$vente_cat[$i]['id'].'">
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
                        <p class="tett">'.$vente_cat[$i]['text'].'</p>
                        <img src="'.$vente_cat[$i]['picture'].'">
                    </div>
                    <div class="commentaires" id="hopw">
                        <p>'.$commentaire.' commentaires</p>
                    </div>
                </div>
                            ';
            }
        } else {
            echo 'Il n\'y a aucun post encore dans cette catégorie. Soyez le premier à poster !';
        }

    }
} else {
    echo 'Error';
}
?>