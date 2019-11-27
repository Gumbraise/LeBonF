<?php

if(isset($_SESSION['id'])) {
    $select1 = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $select1->execute(array($_SESSION['id']));
    $session_user = $select1->fetch();
    $session_user_count = $select1->rowCount();
    $select1->closeCursor();
}