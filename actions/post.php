<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');

if(isset($_SESSION['id'])) {
    if(isset($_POST['upload'])) {
        $image = "";
        $image .= $_FILES['file']['name'];

        $dossier = '../users/vente/images/';
        $fichier = basename($_FILES['file']['name']);

        $target_dir = "../users/vente/images/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

            $temp = explode(".", $_FILES['file']['name']);
            $newfilename = $_SESSION['id'].round(microtime(true)) . '.' . end($temp);
            $newfileforsql = "users/vente/images/".$newfilename;
            move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $newfilename);

            if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $newfilename))
            {
                echo 'Echec de l\'upload !';
            }
            else
            {
                $requser = $bdd->prepare("INSERT INTO vente(user_id, text, picture, price, available, date) VALUES(?, ?, ?, ?, 1, UNIX_TIMESTAMP())");
                $requser->execute(array($_SESSION['id'], $_POST['text'], $newfileforsql, $_POST['price']));
            }
        } else {
            echo "Veuillez bien upload une image s'il vous plaît";
        }
    } else {
        echo "Erreur";
        header ("Location: /");
    }
} else {
    echo "Erreur";
    header ("Location: /");
}
?>