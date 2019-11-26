

<?php session_start(); $bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', ''); 
$insertmbr2 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
$insertmbr2->execute(array($_GET['id']));
$userinfo = $insertmbr2->fetch();
$usercount = $insertmbr2->rowCount(); ?>
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
        <link rel="shortcut icon" href="assets/img/icon.jpg">
		<title>LeBonF | Profil</title>
	</head>
	<body>
		<header>
        <div id="login" class="modal fade index" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Se Connecter</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
			<form action="actions/login.php" method="POST" name="connexion">
					<input type="email" placeholder="Mail" name="email" required>
					<input type="password" placeholder="Mot de passe" name="pass" required>
			</div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="connexion">Se Connecter</button>
				</form>
			</div>
			</div>
		</div>
	</div>

	<div id="register" class="modal fade index" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">S'Inscrire</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<form action="actions/register.php" method="POST" name="inscription">
					<input type="text" placeholder="Prénom + Nom" name="name" required>
					<input type="text" placeholder="Classe (1STI2D2)" name="classe" required>
					<input type="email" placeholder="Mail" name="email" required>
					<input type="password" placeholder="Mot de passe" name="pass" required>
					<input type="password" placeholder="Répétez le mot de passe" name="pass2" required>
			</div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="inscription">S'Inscrire</button>
				</form>
			</div>
			</div>
		</div>
	</div>
        <a href="index.php"><p>TROCLAMO .</p></a>
        <?php if(isset($_SESSION['id'])) { ?>
            <img src="<?php echo $userinfo['picture'];?>" id="pp_header" data-toggle="dropdown">
        <?php } else { ?>
            <img src="users\users\images\default.jpg" id="pp_header" data-toggle="dropdown">
        <?php } ?>
		<div class="dropdown-menu">
			<?php if(isset($_SESSION['id'])) { $insertmbr23 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $insertmbr23->execute(array($_SESSION['id']));
                $userinfo12 = $insertmbr23->fetch();?>
				<a class="dropdown-item" href="profil.php?id=<?php echo $userinfo12['id']; ?>">Mon Profil</a>
				<a class="dropdown-item" href="actions/logout.php">Se Déconnecter</a>
			<?php } else { ?>
				<a class="dropdown-item" data-toggle="modal" data-target="#login">Se Connecter</a>
				<a class="dropdown-item" data-toggle="modal" data-target="#register">S'Inscrire</a>
			<?php } ?>
		</div>
		</header>
		<?php 
			         
			if(isset($_GET['id'])) {
			    if($usercount == 1) {
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
                            <p class="pseudo"><?php echo $userinfo['name'];?></p>
                            <p class="classe"><?php echo $userinfo['classe'];?></p>
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
                                                        <img src="'.$userinfo['picture'].'">
                                                    </div>
                                                    <div class="tet">
                                                        <a href="#">
                                                            <p class="name">'.$userinfo['name'].'</p>
                                                        </a>
                                                        <p class="salle">'.$userinfo['classe'].'</p>
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
                                        echo $userinfo['name'].' n\'a toujours pas posté de publication...';
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
                        <div class="picture"><img src="<?php echo $userinfo['picture'];?>"></div>
                        <p class="pseudo"><?php echo $userinfo['name'];?></p>
                        <p class="classe"><?php echo $userinfo['classe'];?></p>
                            <div id="poi">
                                Vous n'avez pas accès au compte de <?php echo $userinfo['name'];?> tant que vous n'êtes pas connecté
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
            <?php }
            ?>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="assets/js/profil.js"></script>
</html>

