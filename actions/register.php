<?php
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');
session_start();
if(isset($_POST['inscription'])) {
    if(!empty($_POST['room']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) AND !empty($_POST['user'])) {
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $room = $_POST['room'];
        $user = $_POST['user'];
        $picture = "users/users/images/default.jpg";
        if($pass == $pass2) {
            $reqroom = $bdd->prepare("SELECT * FROM users WHERE chambre = ? AND pass = ?");
            $reqroom->execute(array($room, $pass));
            $roomexist = $reqroom->rowCount();
            if($roomexist == 0) {
                $insertmbr = $bdd->prepare("INSERT INTO users(firstname, pass, chambre, date, ip, picture) VALUES (?, ?, ?, UNIX_TIMESTAMP(), ?, ?)");
                $insertmbr->execute(array($user, $pass, $room, $_SERVER['REMOTE_ADDR'], $picture));

                $requser = $bdd->prepare("SELECT * FROM users WHERE chambre = ? AND pass = ?");
                $requser->execute(array($room, $pass));
                $userexist = $requser->fetch();
                $_SESSION['id'] = $userexist['id'];
                echo "ok";
            } else {
                echo "Vous avez déjà un compte. Veuillez vous connectez s'il vous plaît.";
            }
        } else {
            echo "Vos 2 mots de passe ne correspondent pas.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
} else {
    echo "Erreur";
    header ("Location: /");
}
?>