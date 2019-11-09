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
		<link rel="stylesheet" href="assets/css/main.css">
		<title>LeBonF</title>
	</head>
	<body>
		<header>
			<p>LEBONF .</p>
		</header>
		

		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</div>

			</div>
		</div>


		<div class="posts">
			<div id="ahbon">
				<div class="pub" id="pub">
					<div class="inside">
						
					</div>
				</div>
			</div>
			<div class="post">
				<div class="new">
					<?php if(isset($_SESSION['id'])) { ?>
					<textarea value="" placeholder="Votre texte ici..." id="textarea"></textarea>
					<input value="" type="number" min="0" placeholder="Votre prix ici..." id="price">
					<input name="file" type="file" id="file" accept="image/*">
					<label for="file" id="inns" class="inputfile">Envoyez une photo</label>
					<button id="button">Poster</button>
					<?php } else { ?> Veuillez vous connecter pour pouvoir poster une annonce 
					<?php } ?>
				</div>
			</div>
			<div id="poi"></div>
		</div>
	</body>
	<footer></footer>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/post.js"></script>
	<script src="assets/js/css.js"></script>
	<script src="assets/js/lr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</html>