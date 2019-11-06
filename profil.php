<?php session_start(); $bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', ''); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="assets/css/profil.css">
    <title>LeBonF | Profil</title>
</head>
<body>
<header>
		<p>LEBONF .</p>
	</header>

    <?php if(isset($_GET['id'])) {
        if(isset($_SESSION['id'])) {
            if($_SESSION['id'] == $_GET['id']){
                echo 'Yey';
            }
            else
            {
                echo 'Nope';
            }
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
</html>