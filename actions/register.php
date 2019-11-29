<?php
if(isset($_POST['inscription'])) {
    if(!empty($_POST['classe']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) AND !empty($_POST['name'] AND !empty($_POST['email']))) {
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $classe = $_POST['classe'];
        $name = htmlspecialchars($_POST['name']);
        $picture = "users/users/images/default.jpg";
        $email = htmlspecialchars($_POST['email']);
        if($pass == $pass2) {
            $reqroom = $bdd->prepare("SELECT * FROM users WHERE email = ? AND pass = ?");
            $reqroom->execute(array($email, $pass));
            $roomexist = $reqroom->rowCount();
            if($roomexist == 0) {
                $insertmbr = $bdd->prepare("INSERT INTO users(name, pass, classe, date, ip, picture, perm, liquide, rollon, crypto, email) VALUES (?, ?, ?, UNIX_TIMESTAMP(), ?, ?, 0, 1, 0, 0, ?)");
                $insertmbr->execute(array($name, $pass, $classe, $_SERVER['REMOTE_ADDR'], $picture, $email));

                $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND pass = ?");
                $requser->execute(array($email, $pass));
                $userexist = $requser->fetch();
                $_SESSION['id'] = $userexist['id'];
                echo "ok";
                header('Location: index.php');
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
    header ("Location: index.php");
}
?>