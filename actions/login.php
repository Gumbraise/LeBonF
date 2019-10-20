<?php
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');
session_start();
if(isset($_POST['connexion'])){
    $room = htmlspecialchars($_POST['room']);
    $pass = md5($_POST['pass']);
    if(!empty($room) AND !empty($pass)) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE chambre = ? AND pass = ?");
        $requser->execute(array($room, $pass));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $requser = $bdd->prepare("UPDATE users SET ip = ?, date = UNIX_TIMESTAMP() WHERE id = ?");
            $requser->execute(array($_SERVER['REMOTE_ADDR'], $userinfo['id']));
            header("Location: ?");
        } else {
            header("Location: ?page=connexion");
        }
    } else {
        header("Location: ?page=connexion");
    }
} else { 
    header("Location: ?page=connexion"); 
}
?>
