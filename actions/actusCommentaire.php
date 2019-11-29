<?php
$comSelect = $bdd->prepare("SELECT * FROM vente_commentaires WHERE vente_id = ?");
$comSelect->execute(array($_POST['id']));
$com = $comSelect->fetchAll();
$comCount = $comSelect->rowCount();

for($i=0; $i < $comCount; $i++) {
    echo $com[$i]['text'].'<br>';
}