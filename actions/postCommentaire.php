<?php
$insertDelPost = $bdd->prepare("INSERT INTO vente_commentaires(user_id, text, picture, price, date, deleter_user_id, deleter_date) VALUES (?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())");
$insertDelPost->execute(array($post['user_id'], $post['text'], $post['picture'], $post['price'], $post['date'], $_SESSION['id']));
