<?php
if(isset($_SESSION['id'])) {
    $_SESSION = array();
    session_destroy();
    echo "Vous allez être déconnecté";
    header ("Location: index.php");
}
else
{
    echo "Erreur";
    header ("Location: index.php");
}