<?php
if(isset($_POST['upload'])) {
    if(!empty($_FILES['file']['name'])) {
        $image = "";
        $image .= $_FILES['file']['name'];

        $dossier = '../users/users/images/';
        $fichier = basename($_FILES['file']['name']);

        $target_dir = "../users/users/images/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

            $temp = explode(".", $_FILES['file']['name']);
            $newfilename = $_SESSION['id'].round(microtime(true)) . '.' . end($temp);
            $newfileforsql = "users/users/images/".$newfilename;
            move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $newfilename);

            $requser = $bdd->prepare("UPDATE users SET picture = ? WHERE id = ?");
            $requser->execute(array($newfileforsql, $_SESSION['id']));
            echo $newfileforsql;
        } else {
            echo "Veuillez bien upload une image s'il vous plaît";
        }
    } else {
        echo "Veuillez choisir un fichier";
    }
} else {
    echo "Erreur";
}