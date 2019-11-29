<?php
if(!empty($_POST['supprPost']) AND !empty($_POST['typeHidden'])) {
    if(isset($_SESSION['id'])) {
        $postSelect = $bdd->prepare("SELECT * FROM vente WHERE id = ?");
        $postSelect->execute(array($_POST['typeHidden']));
        $post = $postSelect->fetch();

        $userinfoSelect = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $userinfoSelect->execute(array($_SESSION['id']));
        $userinfo = $userinfoSelect->fetch();
        
        if(($_SESSION['id'] == $post['user_id']) OR ($userinfo['perm'] == 1)) {
            $insertDelPost = $bdd->prepare("INSERT INTO deletedvente(user_id, text, picture, price, date, deleter_user_id, deleter_date) VALUES (?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())");
            $insertDelPost->execute(array($post['user_id'], $post['text'], $post['picture'], $post['price'], $post['date'], $_SESSION['id']));
            
            $deletePost = $bdd->prepare("DELETE FROM vente WHERE id = ?");
            $deletePost->execute(array($_POST['typeHidden']));


            $comSelect = $bdd->prepare("SELECT * FROM vente_commentaires WHERE vente_id = ?");
            $comSelect->execute(array($post['id']));
            $com = $comSelect->fetchAll();
            $comCount = $comSelect->rowCount();

            for ($i=0; $i < $comCount; $i++) {
                $insertDelCom = $bdd->prepare("INSERT INTO deletedcommentaires(vente_id, text, date, deleter_user_id, deleter_date) VALUES (?, ?, ?, ?, UNIX_TIMESTAMP())");
                $insertDelCom->execute(array($post['id'], $com[$i]['text'], $com[$i]['date'], $_SESSION['id']));

                $deleteCom = $bdd->prepare("DELETE FROM vente_commentaires WHERE id = ?");
                $deleteCom->execute(array($com[$i]['id']));
            }

            header("Location: index.php");
        }
        else {
            echo "Vous n'êtes pas autorisé à effectuer cette action !";
        }
    }
    else {
        echo "Vous n'êtes pas connecté";
    }
} else
{
    echo "Le formulaire n'est pas valide";
}
?>