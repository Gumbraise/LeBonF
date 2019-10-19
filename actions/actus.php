<?php
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');

$insertmbr = $bdd->prepare("SELECT * FROM vente");
$insertmbr->execute(array());
$userinfo = $insertmbr->fetchAll();

$itemlist = $bdd->prepare("SELECT COUNT(*) as id FROM vente"); 
$itemlist->execute(array());
$itemlists = $itemlist->fetch();
$itemlist->closeCursor();

for($i = 0; $i < $itemlists['id']; $i++) {
    echo $userinfo[$i]['text'].":".$userinfo[$i]['picture'].":".$userinfo[$i]['available'].":".$userinfo[$i]['date'].";"."<br>";
}
?>