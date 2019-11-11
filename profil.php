

<?php session_start(); $bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', ''); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
		<link rel="stylesheet" href="assets/css/profil.css">
		<title>LeBonF | Profil</title>
	</head>
	<body>
		<header>
			<p>TROCLAMO .</p>
		</header>
		<?php 
			$insertmbr2 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
			$insertmbr2->execute(array($_GET['id']));
			$userinfo = $insertmbr2->fetch();
			
			if(isset($_GET['id'])) {
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
				<img id="pp" src="<?php echo $userinfo['picture'];?>">
			</div>
			<?php
				}
				else
				{?>
			<div class="picture"><img src="<?php echo $userinfo['picture'];?>"></div>
		<?php
			}
			?>
            <p class="pseudo"><?php echo $userinfo['firstname'];?></p>
            <p class="classe"><?php echo $userinfo['chambre'];?></p>
            <div id="poi">
                <?php
                
                
                $itemlist = $bdd->prepare("SELECT COUNT(*) as id FROM vente WHERE user_id = ?"); 
                $itemlist->execute(array($_GET['id']));
                $itemlists = $itemlist->fetch();
                $itemlist->closeCursor();
                
                $insertmbr = $bdd->prepare("SELECT * FROM vente WHERE user_id = ?");
                $insertmbr->execute(array($_GET['id']));
                $actuinfo = $insertmbr->fetchAll();

                #var_dump($itemlists);

                if($itemlists['id'] > 0) {
                    for($i = 0; $i < $itemlists['id']; $i++) {
                
                        
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
            </div>
		</div>
		<?php
			}
			else
			{
			    echo 'SESSION NOT SET';
			}
			}
			else {
			echo 'Humhum';
			}
			?>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="assets/js/profil.js"></script>
</html>

