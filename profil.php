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
                    
                    <img src="<?php echo $userinfo['picture'];?>">
                </div>
            </div>
            <?php
            }
            else
            {?>
                <div class="picture"><img src="<?php echo $userinfo['picture'];?>"></div>
            </div>
            <?php
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