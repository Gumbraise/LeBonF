<?php
session_start();
if(isset($_SESSION['id'])) {
    echo 'you so credule';
}
else {
    echo 'nothing nothing...';
}
?>