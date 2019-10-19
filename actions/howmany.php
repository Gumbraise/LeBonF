<?php
$bdd = new PDO('mysql:host=localhost;dbname=lebonf', 'root', '');

$itemlist = $bdd->query("SELECT COUNT(*) as id FROM vente"); 
$itemlists = $itemlist->fetch();
$itemlist->closeCursor();

echo $itemlists["id"];
?>