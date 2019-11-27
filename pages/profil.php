<?php		         
	if(isset($_GET['id'])) {
	    if($get_user_count == 1) {
	        if(isset($_SESSION['id'])) { ?>
                <div class="posts">
                    <?php
                        if($_SESSION['id'] == $_GET['id']){ ?>
                    <div class="picture session">
                        <input name="file" type="file" id="file" accept="image/*">
                        <label for="file" id="inns" class="inputfile">
                            <i class="fas fa-camera"></i>
                            <div class="black"></div>
                        </label>
                        <img id="pp" src="<?php echo $get_user['picture'];?>">
                    </div>
                    <?php
                        }
                        else
                        {?>
                    <div class="picture"><img src="<?php echo $get_user['picture'];?>"></div>
                    <?php
                        }
                        ?>
                    <p class="pseudo"><?php echo $get_user['name'];?></p>
                    <p class="classe"><?php echo $get_user['classe'];?></p>
                    <div id="poi">
                        <?php
                            $itemlist = $bdd->prepare("SELECT COUNT(*) as id FROM vente WHERE user_id = ?"); 
                            $itemlist->execute(array($_GET['id']));
                            $itemlists = $itemlist->fetch();
                            $itemlist->closeCursor();
                            
                            $insertmbr = $bdd->prepare("SELECT * FROM vente WHERE user_id = ?");
                            $insertmbr->execute(array($_GET['id']));
                            $actuinfo = $insertmbr->fetchAll();
                            
                            if($itemlists['id'] > 0) {
                                for($i = 0; $i < $itemlists['id']; $i++) {
                            
                                    
                                    $com = $bdd->prepare("SELECT COUNT(*) as id FROM vente_commentaires WHERE vente_id = ?");
                                    $com->execute(array($actuinfo[$i]['id']));
                                    $commentaire = $com->fetch();
                            
                                    
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
                                                <p class="date">'.date("j F, H:i", $actuinfo[$i]['date']).'</p>
                                            </div>
                                            <div class="price">
                                                <p class="price">'.$actuinfo[$i]['price'].'€</p>
                                            </div>
                                            <div class="fonta">
                                                <i class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="profil.php?id='.$get_user['id'].'">Accéder au profil</a>
                                                    ';
                                                    if(isset($_SESSION['id'])) { 
                                                        $get_userSelect = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                                                        $get_userSelect->execute(array($_SESSION['id']));
                                                        $get_user2 = $get_userSelect->fetch(); 
                                                        if(($_SESSION['id'] == $actuinfo[$i]['user_id']) OR ($get_user2['perm'] == 1)) {
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
                                echo $get_user['name'].' n\'a toujours pas posté de publication...';
                            }
                        ?>
                    </div>
                </div>
            <?php
                }
                else
                {
            ?>
                <div class="posts">
                <div class="picture"><img src="<?php echo $get_user['picture'];?>"></div>
                <p class="pseudo"><?php echo $get_user['name'];?></p>
                <p class="classe"><?php echo $get_user['classe'];?></p>
                    <div id="poi">
                        Vous n'avez pas accès au compte de <?php echo $get_user['name'];?> tant que vous n'êtes pas connecté
                    </div>
                </div>
        <?php
            }
        } else { ?>
            <div class="posts">
                    <div id="poi">
                        Cet utilisateur n'existe pas
                    </div>
                </div>
        <?php }
    } else { ?>
        <div class="posts">
                    <div id="poi">
                        Cet utilisateur n'existe pas
                    </div>
                </div>
<?php }?>

