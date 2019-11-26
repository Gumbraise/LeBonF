<?php session_start(); $bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', ''); 

?>
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
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="shortcut icon" href="assets/img/icon.jpg">
		<title>LeBonF</title>
	</head>

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
					<input type="password" placeholder="Mot de passe"" name="pass" required>
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
					<input type="password" placeholder="Mot de passe"" name="pass" required>
					<input type="password" placeholder="Répétez le mot de passe" name="pass2" required>
			</div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-default" name="inscription">S'Inscrire</button>
				</form>
			</div>
			</div>
		</div>
	</div>
		
	<body>
		<header>
		<a href="index.php"><p>TROCLAMO .</p></a>
        <?php if(isset($_SESSION['id'])) { $insertmbr2223 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
$insertmbr2223->execute(array($_SESSION['id']));
$userinfo223 = $insertmbr2223->fetch();?>
            <img src="<?php echo $userinfo223['picture'];?>" id="pp_header" data-toggle="dropdown">
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
		<div class="posts">
			<div class="post">
				<div class="new">
					<?php if(isset($_SESSION['id'])) { ?>
					<textarea value="" placeholder="Votre texte ici..." id="textarea"></textarea>
					<input value="" type="number" min="0" placeholder="Votre prix ici..." id="price">
					<input name="file" type="file" id="file" accept="image/*">
					<label for="file" id="inns" class="inputfile">Envoyez une photo</label>
					<select id="postselect" value="" class="postselect">
						<option value="none" disabled selected>---Selectionner une catégorie---</option>
						<option value="informatique">Informatique</option>
						<option value="nourriture">Nourriture</option>
						<option value="services">Services</option>
						<option value="livres">Livres</option>
						<option value="musique">Musique</option>
					</select>
					<button id="button">Poster</button>
					<?php } else { ?> Veuillez vous connecter pour pouvoir poster une annonce 
					<?php } ?>
					
				</div>
			</div>
			<div class="categorie">
				<select id="select" value="" class="categorie">
					<option value="none" disabled selected>---Selectionner une catégorie---</option>
					<option value="informatique">Informatique</option>
					<option value="nourriture">Nourriture</option>
					<option value="services">Services</option>
					<option value="livres">Livres</option>
					<option value="musique">Musique</option>
				</select>
			</div>
			<div id="poi"></div>
		</div>
	</body>
	<footer></footer>

	<!--<div id="supprPost" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Supprimer cette publication ?</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Êtes-vous sûr de vouloir supprimer cette publication ?<br>Cette action sera irréversible !</p>
					</div>
					<div class="modal-footer">
						<form action="actions/supprPost.php" method="post">
							<input type="hidden" id="hideSuppr" value="<#?php echo $actuinfo[$i]['id']; ?>">
							<input type="submit" class="btn btn-default" data-dismiss="modal" value="Supprimer" style="color: #f00;">
						</form>
					</div>
				</div>
			</div>
		</div>-->

	<script src="assets/js/post.js"></script>
	<script src="assets/js/lr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</html>