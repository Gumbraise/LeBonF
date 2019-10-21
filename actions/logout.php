<?php
session_start();
if(isset($_SESSION['id'])) {
    $_SESSION = array();
    session_destroy();
    echo "Vous allez être déconnecté";
    header ("Location: /");
}
else
{
    echo "Erreur";
    header ("Location: /");
}