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