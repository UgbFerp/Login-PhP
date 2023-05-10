<?php
    if(!isset($_SESSION)){
        session_start();
    }
    session_destroy();
    header("Location:../Public_html/index.php");
?>