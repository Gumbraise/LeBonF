<?php
echo '<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
		<link rel="stylesheet" href="assets/css/pute.css">
		<link rel="shortcut icon" href="assets/img/icon.jpg">
		<title>TrocLaMo</title>
	</head>

';
include('modele/login.php');
include('modele/register.php');
echo '
	<body>
		<header>
		<a href="index.php"><p>TROCLAMO .</p></a>
		';
if(isset($_SESSION['id'])) {
			echo' 
			<img src="'.$session_user['picture'].'" id="pp_header" data-toggle="dropdown">';
        } else {
			echo '
            <img src="users\users\images\default.jpg" id="pp_header" data-toggle="dropdown">';
		}
		echo'
		<div class="dropdown-menu">';
			if(isset($_SESSION['id'])) {
				echo'
				<a class="dropdown-item" href="profil.php?id='.$session_user['id'].'">Mon Profil</a>
				<a class="dropdown-item" href="actions/logout.php">Se Déconnecter</a>';
			} else { echo'
				<a class="dropdown-item" data-toggle="modal" data-target="#login">Se Connecter</a>
				<a class="dropdown-item" data-toggle="modal" data-target="#register">S\'Inscrire</a>';
			} 
			echo '
		</div>
        </header>
';
?>