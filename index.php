<?php
session_start();

include('controleur/bdd.php');
include('controleur/select.php');

if(isset($_GET['page'])) {
    include('include/header.php'); 
    switch($_GET['page']) {
        case 'index':
            include('pages/accueil.php');
            break;
        case 'profil':  
            if(isset($_GET['id'])) {
                $select2 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $select2->execute(array($_GET['id']));
                $get_user = $select2->fetch();
                $get_user_count = $select2->rowCount(); 

                $select4 = $bdd->prepare("SELECT * FROM vente ORDER BY date DESC WHERE id = ?");
                $select4->execute(array($_GET['id']));
                $vente_user = $select4->fetchAll();
                $vente_user_count = $select4->rowCount();
            }
            include('pages/profil.php');
            break;
        default:
            include('pages/accueil.php');
            break;
    }
}
else if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'login':
            include('actions/login.php');
            break;
        case 'register':
            include('actions/register.php');
            break;
        case 'logout':
            include('actions/logout.php');
            break;
        case 'supprPost':
            include('actions/supprPost.php');
            break;
        case 'actus':
            include('actions/actus.php');
            break;
        case 'actusPP':
            include('actions/actusPP.php');
            break;
        case 'actusCommentaire':
            include('actions/actusCommentaire.php');
            break;
        case 'postCommentaire':
            include('actions/postCommentaire.php');
            break;
        case 'post':
            include('actions/post.php');
            break;
        case 'postPP':
            include('actions/postPP.php');
            break;
        default:
            include('pages/accueil.php');
            break;
    }
}
else {
    include('include/header.php'); 
    include('pages/accueil.php');
}
include('include/footer.php');
?>