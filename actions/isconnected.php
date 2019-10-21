<?php
session_start();
if(isset($_SESSION['id'])) {
    echo 'ok';
}
else {
    echo 'no';
}
?>